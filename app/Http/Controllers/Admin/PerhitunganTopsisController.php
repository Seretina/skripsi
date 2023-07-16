<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Kriteria;
use App\MatrixNormalisasi;
use App\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganTopsisController extends Controller
{
    /**
     * Index
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perhitungan()
    {
        $karyawans =
            DB::select('SELECT DISTINCT karyawans.id, karyawans.nisn, karyawans.name FROM penilaians JOIN karyawans ON penilaians.karyawan_id = karyawans.id');
        $kriterias = Kriteria::get();

        // $asc = DB::select('SELECT * FROM `matrix_4_preferensi` ORDER BY `matrix_4_preferensi`.`nilai_max` DESC');



        return view('admin.perhitungan-topsis.index', [
            'karyawans' => $karyawans,
            'kriterias' => $kriterias,
            // 'asc' => $asc
        ]);
    }

    // Matrix Normalisasi
    public function matrixNormalisasi(Request $request)
    {
        $karyawans = Karyawan::all();

        $isexist = MatrixNormalisasi::where('karyawan_id', $request->karyawan_id)
            ->where('kriteria_id', $request->kriteria_id)
            ->where('penilaian_id', $request->penilaian_id)
            ->first();
        // dd($isexist);

        if (empty($isexist)) {
            foreach ($karyawans as $karyawan) {
                $matrixBobot = DB::table('matrix_2_normalisasi_bobot')
                    ->where('karyawan_id', '=', $karyawan->id)
                    ->get();
                foreach ($matrixBobot as $bobot) {
                    $penilaian = DB::table('matrix_2_normalisasi_bobot')
                        ->where('kriteria_id', '=', $bobot->kriteria_id)
                        ->orderBy('nilai', 'desc')
                        ->first();
                }
            }

            $kriterias = Kriteria::all();
            foreach ($kriterias as $kriteria) {
                $nilaiAwal = 0;
                $penilaians = Penilaian::where('kriteria_id', '=', $kriteria->id)->get();
                foreach ($penilaians as $penilaian) {
                    $bagi = pow($penilaian->nilai_inisial, 2);
                    $nilaiAwal = $nilaiAwal + $bagi;
                }
                $akar = sqrt($nilaiAwal);
                foreach ($penilaians as $penilaian) {
                    $hasil = $penilaian->nilai_inisial / $akar;

                    $request->request->add(['nilai' => $hasil]);
                    $request->request->add(['penilaian_id' => $penilaian->id]);
                    $request->request->add(['kriteria_id' => $penilaian->kriteria_id]);
                    $request->request->add(['karyawan_id' => $penilaian->karyawan_id]);
                    DB::table('matrix_1_normalisasi')->insert($request->except('_token'));
                }
            }
            return redirect()
                ->route('admin.topsis.index')
                ->with('success_message', 'Successfully proses matrix normaliasasi ! ');
        } else {
            return redirect()
                ->route('admin.topsis.index')
                ->with('error_message', 'Data already exist ! ');
        }
    }

    // Normalisasi Bobot
    public function matrixNormalisasiBobot(Request $request)
    {
        $karyawans = Karyawan::all();
        foreach ($karyawans as $karyawan) {
            $matrixNormalisasi = DB::table('matrix_1_normalisasi')
                ->join('kriterias', 'matrix_1_normalisasi.kriteria_id', '=', 'kriterias.id')
                ->where('karyawan_id', '=', $karyawan->id)
                ->get();
            foreach ($matrixNormalisasi as $normalisasi) {
                $bobot = $normalisasi->weight / 100;
                $hasil = $normalisasi->nilai * $bobot;

                $request->request->add(['nilai' => $hasil]);
                $request->request->add(['normalisasi_id' => $normalisasi->id]);
                $request->request->add(['kriteria_id' => $normalisasi->kriteria_id]);
                $request->request->add(['karyawan_id' => $normalisasi->karyawan_id]);
                DB::table('matrix_2_normalisasi_bobot')->insert($request->except('_token'));
            }
        }
        return redirect()
            ->route('admin.topsis.index')
            ->with('success_message', 'Successfully proses matrix normalisasi bobot ! ');
    }

    public function matrixJarakIdeal(Request $request)
    {
        $karyawans = Karyawan::all();
        foreach ($karyawans as $karyawan) {
            $idealMax = 0;
            $idealMin = 0;
            $matrixBobot = DB::table('matrix_2_normalisasi_bobot')
                ->where('karyawan_id', '=', $karyawan->id)
                ->get();

            foreach ($matrixBobot as $bobot) {
                $nilmax = DB::table('matrix_2_normalisasi_bobot')
                    ->where('kriteria_id', '=', $bobot->kriteria_id)
                    ->orderBy('nilai', 'desc')
                    ->first();
                $hasilmax = $nilmax->nilai - $bobot->nilai;
                $powhasilmax = pow($hasilmax, 2);
                $idealMax = $idealMax + $powhasilmax;
            }
            $akarhasilmax = sqrt($idealMax);

            foreach ($matrixBobot as $bobot) {
                $nilmin = DB::table('matrix_2_normalisasi_bobot')
                    ->where('kriteria_id', '=', $bobot->kriteria_id)
                    ->orderBy('nilai', 'asc')
                    ->first();
                $hasilmin = $nilmin->nilai - $bobot->nilai;
                $powhasilmin = pow($hasilmin, 2);
                $idealMin = $idealMin + $powhasilmin;
            }
            $akarhasilmin = sqrt($idealMin);
            //jarak
            $request->request->add(['nilai_min' => $akarhasilmin]);
            $request->request->add(['nilai_max' => $akarhasilmax]);
            $request->request->add(['bobot_id' => $bobot->id]);
            $request->request->add(['kriteria_id' => $bobot->kriteria_id]);
            $request->request->add(['karyawan_id' => $bobot->karyawan_id]);
            DB::table('matrix_3_jarak_ideal')->insert($request->except('_token'));
        }
        return redirect()
            ->route('admin.topsis.index')
            ->with('success_message', 'Successfully proses matrix jarak ideal ! ');
    }

    // Matrix Preferensi
    public function matrixPrefrensi(Request $request)
    {
        $karyawans = DB::table('karyawans')->get();
        foreach ($karyawans as $karyawan) {
            $matrixJarak = DB::table('matrix_3_jarak_ideal')
                ->where('karyawan_id', '=', $karyawan->id)
                ->get();
            foreach ($matrixJarak as $jarak) {
                $hasilPref = $jarak->nilai_min / ($jarak->nilai_max + $jarak->nilai_min);
            }

            $request->request->add(['nilai_max' => $hasilPref]);
            $request->request->add(['jarak_id' => $jarak->id]);
            $request->request->add(['kriteria_id' => $jarak->kriteria_id]);
            $request->request->add(['karyawan_id' => $jarak->karyawan_id]);
            DB::table('matrix_4_preferensi')->insert($request->except('_token'));
        }
        return redirect()
            ->route('admin.topsis.index')
            ->with('success_message', 'Successfully proses preferensi ! ');
    }


    // --------------------------------------------------------------------- Get Data Matrix  --------------------------------------------------------------------->

    // Matrix  Normalisasi
    public function getMatrix1($karyawanId)
    {
        $penilaian = DB::table('matrix_1_normalisasi')
            ->where('karyawan_id', '=', $karyawanId)
            // ->where('kriteria_id', '=', $kriteriaId)
            ->get();
        return $penilaian;
    }

    // Matrix Bobot
    public function getMatrix2($karyawanId)
    {
        $penilaian = DB::table('matrix_2_normalisasi_bobot')
            ->where('karyawan_id', '=', $karyawanId)
            ->get();
        return $penilaian;
    }

    // Matrix Jarak Ideal
    public function getMatrix4($karyawanId)
    {
        $penilaian = DB::table('matrix_3_jarak_ideal')
            ->where('karyawan_id', '=', $karyawanId)
            ->get();
        return $penilaian;
    }


    // Matrix Preferensi
    public function getMatrix5($karyawanId)
    {
        $penilaian = DB::table('matrix_4_preferensi')
            ->where('karyawan_id', '=', $karyawanId)
            ->get();
        return $penilaian;
    }


    // Matrix Rank
    public function getRank($karyawanId)
    {
        $penilaian = DB::table('matrix_4_preferensi')
            ->orderBy('nilai_max', 'DESC')
            ->where('karyawan_id', '=', $karyawanId)
            ->get();
        // $asc = DB::select('SELECT * FROM `matrix_4_preferensi` ORDER BY `matrix_4_preferensi`.`nilai_max` DESC');
        // dd($asc);
        return $penilaian;
    }

    public function getMatrixIdeal()
    {
        $karyawans = Karyawan::all();
        foreach ($karyawans as $karyawan) {
            $idealMax = 0;
            $idealMin = 0;
            $matrixBobot = DB::table('matrix_2_normalisasi_bobot')
                ->where('karyawan_id', '=', $karyawan->id)
                ->get();

            foreach ($matrixBobot as $bobot) {
                $nilmax = DB::table('matrix_2_normalisasi_bobot')
                    ->where('kriteria_id', '=', $bobot->kriteria_id)
                    ->first();
                $hasilmax = max([$nilmax->nilai]);
                $hasilmin = min([$nilmax->nilai]);
                $idealMax = $hasilmax;
                $idealMin = $hasilmin;
            }
        }
        // dd($idealMax);
        return [$idealMax, $idealMin];
    }
}
