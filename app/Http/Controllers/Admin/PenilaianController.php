<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Kriteria;
use App\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans =
            DB::select('SELECT DISTINCT karyawans.id, karyawans.nisn, karyawans.name FROM penilaians JOIN karyawans ON penilaians.karyawan_id = karyawans.id');
        $kriterias = Kriteria::get();
        // dd($karyawans);

        return view('admin.penilaian.index', [
            'kriterias' => $kriterias,
            'karyawans' => $karyawans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $penilaians = Penilaian::findOrFail($id);
        // $karyawans = Karyawan::where('id', $penilaians->karyawan_id)->paginate(10);

        $penilaians = Penilaian::orderBy('id', 'asc')->paginate(10);
        $karyawans =
            DB::select('SELECT DISTINCT karyawans.id, karyawans.nisn, karyawans.name FROM penilaians JOIN karyawans ON penilaians.karyawan_id = karyawans.id');
        $kriterias = Kriteria::all();
        $karyawan1 = Karyawan::all();

        return view('admin.penilaian.create', [
            'penilaians' => $penilaians,
            'karyawans' => $karyawans,
            'karyawan1' => $karyawan1,
            'kriterias' => $kriterias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $karyawan = Karyawan::findOrFail($id);
        // $penilaians = Penilaian::where('karyawan_id', $karyawan->id);
        $this->validate($request, [
            'nilai' => 'required',
            'karyawan_id' => 'required',
            'kriteria_id' => 'required',
        ]);

        $isexist = Penilaian::where('karyawan_id', $request->karyawan_id)
            ->where('kriteria_id', $request->kriteria_id)->first();
        // dd($isexist);
        if (empty($isexist)) {

            DB::transaction(function () use ($request) {
                $penilaians = new Penilaian;

                $penilaians->nilai = $request->nilai;
                $penilaians->karyawan_id = $request->karyawan_id;
                $penilaians->kriteria_id = $request->kriteria_id;


                // kriteria 1 = Penghasilan
                if ($request->kriteria_id == 1) {
                    if ($request->nilai < 799999) {
                        $inisialisasi = 5;
                    } elseif ($request->nilai >= 800000 && $request->nilai <= 1499999) {
                        $inisialisasi = 4;
                    } elseif ($request->nilai >= 1500000 && $request->nilai <= 2999999) {
                        $inisialisasi = 3;
                    } elseif ($request->nilai >= 3000000 && $request->nilai <= 4999999) {
                        $inisialisasi = 2;
                    } elseif ($request->nilai > 5000000 ) {
                        $inisialisasi = 1;
                    }
                    // kriteria 2 = Tanggungan
                } else if ($request->kriteria_id == 2) {
                    if ($request->nilai > 5) {
                        $inisialisasi = 5;
                    } elseif ($request->nilai >= 4 && $request->nilai <= 5) {
                        $inisialisasi = 4;
                    } elseif ($request->nilai >= 3 && $request->nilai <= 4) {
                        $inisialisasi = 3;
                    } elseif ($request->nilai >= 2 && $request->nilai <= 3) {
                        $inisialisasi = 2;
                    } elseif ($request->nilai <= 1) {
                        $inisialisasi = 1;
                    }
                    // kriteria 3 = Kepemilikan Kendaraan
                } else if ($request->kriteria_id == 3) {
                    if ($request->nilai == "tidak ada") {
                        $inisialisasi = 5;
                    } elseif ($request->nilai == "sepeda") {
                        $inisialisasi = 4;
                    } elseif ($request->nilai == "motor") {
                        $inisialisasi = 3;
                    } elseif ($request->nilai == "mobil") {
                        $inisialisasi = 2;
                    } elseif ($request->nilai == "mobil-motor") {
                        $inisialisasi = 1;
                    }
                    // kriteria 5 = Kehadiran
                } else if ($request->kriteria_id == 4) {
                    if ($request->nilai >= 81 && $request->nilai <= 100) {
                        $inisialisasi = 5;
                    } elseif ($request->nilai >= 61 && $request->nilai <= 80) {
                        $inisialisasi = 4;
                    } elseif ($request->nilai >= 41 && $request->nilai <= 60) {
                        $inisialisasi = 3;
                    } elseif ($request->nilai >= 21 && $request->nilai <= 40) {
                        $inisialisasi = 2;
                    } elseif ($request->nilai >= 1 && $request->nilai <= 20) {
                        $inisialisasi = 1;
                    }
                }else{
                    return 'data salah';
                }
                $penilaians->nilai_inisial = $inisialisasi;

                $penilaians->save();
                // dd($penilaians);
            }, 5);

            return redirect()
                ->route('admin.penilaian.create')
                ->with('success_message', 'Successfully Created Nilai Siswa ! ');
        } else {

            return redirect()
                ->route('admin.penilaian.create')
                ->with('error_message', 'Data already exist ! ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $penilaians = Penilaian::find($request->id);
        DB::transaction(function () use ($penilaians) {
            $penilaians->delete();
        }, 5);
        return redirect()
            ->route('admin.penilaian.create')
            ->with('success_message_nilai', 'Successfully Deleted Nilai Karyawan ! ');
    }

    public function penilaianKaryawan($karyawanId)
    {
        $penilaian = DB::table('penilaians')
            ->where('karyawan_id', '=', $karyawanId)
            // ->where('kriteria_id', '=', $kriteriaId)
            ->get();
        return $penilaian;
    }
}
