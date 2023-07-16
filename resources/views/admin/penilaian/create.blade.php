@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Penilaian</li>
        <li class="breadcrumb-item active">Input Nilai Siswa</li>
    </ol>
    <div class="container-fluid">
        <div class="row align-content-center">
            <div class="col-sm-12">
                <div class="card card-block">
            <div class="">
                <p style='margin: 0; padding: 0'>
                    sebelum dilakukan penilaian, nilai yang didapat diinisial terlebih dahulu.
                    <p>setiap nilai kriteria diinisialkan dapat diliahat sebagai berikut : </p>
                    <p>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th style="width: 3px">
                                            Kriteria
                                        </th>
                                        <th style="width: 3px">
                                            Nilai
                                        </th>
                                        <th style="width: 3px">
                                            Nilai Inisialisasi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <br>
                                            <br>
                                            <br>
                                            PENGHASILAN ORANG TUA
                                        </td>
                                        <td>
                                            <p>
                                                Lebih dari Rp 5.000.000
                                            </p>
                                            <p>
                                                Rp. 3.000.000 - Rp 4.999.999
                                            </p>
                                            <p>
                                                Rp 1.500.000- Rp 2.999.999
                                            </p>
                                            <p>
                                                Rp 800.000 - Rp 1.499.999
                                            </p>
                                            Kurang Dari Rp 800.000
                                        </td>
                                        <td>
                                            <p>
                                                5
                                            </p>
                                            <p>
                                                4
                                            </p>
                                            <p>
                                                3
                                            </p>
                                            <p>
                                                2
                                            </p>
                                                1
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                            <br>
                                            <br>
                                            TANGGUNGAN ORANG TUA
                                        </td>
                                        <td>
                                            <p>
                                                Lebih dari 5 Anak
                                            </p>
                                            <p>
                                                4 Anak
                                            </p>
                                            <p>
                                                3 Anak
                                            </p>
                                            <p>
                                                2 Anak
                                            </p>
                                                1 Anak
                                        </td>
                                        <td>
                                            <p>
                                                5
                                            </p>
                                            <p>
                                                4
                                            </p>
                                            <p>
                                                3
                                            </p>
                                            <p>
                                                2
                                            </p>
                                            1
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </p>
                </p>
            </div>

            <div class="">
                  <p>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th style="width: 3px">
                                            Kriteria
                                        </th>
                                        <th style="width: 40px">
                                            Nilai
                                        </th>
                                        <th style="width: 3px">
                                            Nilai Inisialisasi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <br>
                                            <br>
                                            <br>
                                            KEPEMILIKAN KENDARAAN
                                        </td>
                                        <td>
                                            <p>
                                                Tidak Ada
                                            </p>
                                            <p>
                                                Sepeda
                                            </p>
                                            <p>
                                                Sepeda Motor
                                            </p>
                                            <p>
                                                Mobil
                                            </p>
                                                Mobil & Sepeda Motor
                                        </td>
                                        <td>
                                            <p>
                                                5
                                            </p>
                                            <p>
                                                4
                                            </p>
                                            <p>
                                                3
                                            </p>
                                            <p>
                                                2
                                            </p>
                                                1
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                            <br>
                                            <br>
                                            KEHADIRAN
                                        </td>
                                        <td>
                                            <p>
                                               80  - 100
                                            </p>
                                            <p>
                                                60 - 79
                                            </p>
                                            <p>
                                                40 - 59
                                            </p>
                                            <p>
                                                20 - 39
                                            </p>
                                                1 - 19
                                        </td>
                                        <td>
                                            <p>
                                                5
                                            </p>
                                            <p>
                                                4
                                            </p>
                                            <p>
                                                3
                                            </p>
                                            <p>
                                                2
                                            </p>
                                                1
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </p>
                </p>
            </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-block">

                    <!-- Message Status -->
                    @if(Session::has('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success_message') }}
                    </div>
                    @endif

                    @if(Session::has('error_message'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error_message') }}
                    </div>
                    @endif
                    <!--End Message Status -->

                    <form action="{{ route('admin.penilaian.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="karyawan_id">Nama Siswa</sup></label>
                                <select name="karyawan_id" id="karyawan_id"
                                    class="form-control @if ($errors->has('karyawan_id')) is-invalid @endif">
                                    <option value="">Select a Siswa</option>
                                    @foreach($karyawan1 as $karyawan)
                                    <option value="{{ $karyawan->id }}"><b>{{$karyawan->nisn." : ".$karyawan->name}}</b>
                                    </option>
                                    @endforeach
                                </select>
                                @error('karyawan_id')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kriteria_id">Kriteria </sup></label>
                                <select name="kriteria_id" id="kriteria_id"
                                    class="form-control @if ($errors->has('kriteria_id')) is-invalid @endif">
                                    <option value="">Select a kriteria</option>
                                    @php
                                    $No = 1;
                                    @endphp
                                    @foreach($kriterias as $kriteria)
                                    <option value="{{ $kriteria->id }}">{{$No++." : ".$kriteria->name }}</option>
                                    @endforeach
                                </select>
                                @error('kriteria_id')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nilai">Nilai Siswa </label>
                                <input type="text" placeholder="Enter Nilai Siswa" name="nilai" id="inputName"
                                    class="form-control @if ($errors->has('nilai')) is-invalid @endif"
                                    value="{{ old('nilai') }}">
                                @error('nilai')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <a class="btn btn-danger" href="{{ route('admin.penilaian.index') }}">Cancel</a>
                            <input type="submit" value="Create Kriteria" class="btn btn-success float-right">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-block">

                            <!-- Message Status -->
                            @if(Session::has('success_message_nilai'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success_message_nilai') }}
                            </div>
                            @endif

                            @if(Session::has('error_message_nilai'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error_message_nilai') }}
                            </div>
                            @endif
                            <!--End Message Status -->

                            <div class="card-title-block">
                                <h3 class="title">Showing Nilai Siswa</h3>
                            </div>
                            <section>
                                <div class="table-responsive">
                                    <table id="createDataSiswa" class="table table-striped table-bordered" style="width:100%; text-align: center">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%">No</th>
                                                <th style="width: 10%">Nomor Induk Siswa Nasional   </th>
                                                <th style="width: 10%">Nama Siswa</th>

                                                @foreach ($kriterias as $kriteria)
                                                <th style="width: 10%">{{$kriteria->name}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($karyawans as $karyawan)
                                            <tr>
                                                <td>
                                                    {{$no++}}
                                                </td>
                                                <td>
                                                    {{$karyawan->nisn}}
                                                </td>
                                                <td>
                                                    {{$karyawan->name}}
                                                </td>
                                                @inject('penilaian', 'App\Http\Controllers\Admin\PenilaianController')
                                                @foreach ($penilaian->penilaianKaryawan($karyawan->id) as $penilaian)
                                                <td>
                                                    {{$penilaian->nilai_inisial}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <a class="btn btn-primary float-right btn-lg"
                                        href="{{ route('admin.penilaian.index') }}">DONE</a>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>new DataTable('#createDataSiswa');</script>
@endsection
