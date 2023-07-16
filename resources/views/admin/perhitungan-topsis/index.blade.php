@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Perhitungan Topsis</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">

                    <div class="card-title-block">
                        <h3 class="title">TOPSIS ( Penjelasan )</h3>
                    </div>
                    <div class="alert alert-primary">
                        <p style='margin: 0; padding: 0'>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla optio dicta veritatis minus
                            quae repudiandae asperiores aperiam quaerat pariatur omnis, distinctio impedit doloribus qui
                            enim? Saepe dolore illo nisi vel.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla optio dicta veritatis minus
                            quae repudiandae asperiores aperiam quaerat pariatur omnis, distinctio impedit doloribus qui
                            enim? Saepe dolore illo nisi vel.
                        </p>
                        <p style='margin: 0; padding: 0'>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla optio dicta veritatis minus
                            quae repudiandae asperiores aperiam quaerat pariatur omnis, distinctio impedit doloribus qui
                            enim? Saepe dolore illo nisi vel.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla optio dicta veritatis minus
                            quae repudiandae asperiores aperiam quaerat pariatur omnis, distinctio impedit doloribus qui
                            enim? Saepe dolore illo nisi vel.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab">
                            <a class="nav-item nav-link active" id="nav-1-role" data-toggle="tab" href="#nav-1"
                                role="tab">
                                <h5><b> Matrix Normalisasi </b></h5>
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-2" role="tab">
                                <h5><b> Matrix Normalisasi Bobot </b></h5>
                            </a>
                            {{-- <a class="nav-item nav-link" data-toggle="tab" href="#nav-3" role="tab">
                                <h5><b> Matrix Solusi Ideal </b></h5>
                            </a> --}}
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-4" role="tab">
                                <h5><b> Jarak Solusi Ideal </b></h5>
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-5" role="tab">
                                <h5><b> Nilai Preferensi </b></h5>
                            </a>
                            {{-- <a class="nav-item nav-link" data-toggle="tab" href="#nav-6" role="tab">
                                <h5><b> Perangkingan </b></h5>
                            </a> --}}
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        {{-- Matrix Normalisasi --}}
                        <div class="tab-pane fade show active" id="nav-1" role="tabpanel">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Perhitungan Topsis </li>
                                <li class="breadcrumb-item active">Matrix Normalisasi </li>
                            </ol>
                            <div class="row">
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
                                        {{-- <a class="btn btn-primary btn-md" href={{ url('administrasi/perhitungan-topsis/hasil') }}>
                                        <i class="fa fa-plus" style="margin-right: 10px"></i>
                                        Add Nilai Karyawan
                                        </a> --}}
                                        <section>
                                            <form action="{{route('admin.topsis.matrix.normalisasi.bobot')}}"
                                                method="POST">
                                                @csrf
                                                <div class="table-responsive">
                                                    <table id="" class="display table table-striped table-bordered" style="width:100%; text-align: center">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 3%">No</th>
                                                                <th style="width: 10%">Nomor Induk Karyawan</th>
                                                                <th style="width: 10%">Nama Karyawan</th>
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
                                                                @inject('penilaian','App\Http\Controllers\Admin\PerhitunganTopsisController')
                                                                @foreach ($penilaian->getMatrix1($karyawan->id) as
                                                                $penilaian)
                                                                <td>
                                                                    {{round($penilaian->nilai,5)}}
                                                                </td>
                                                                @endforeach
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="float: right;">Proses Normaliasasi Bobot</button>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Matrix Normalisasi Bobot --}}
                        <div class="tab-pane fade" id="nav-2" role="tabpanel">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Perhitungan Topsis </li>
                                <li class="breadcrumb-item active">Matrix Normalisasi Bobot
                                </li>
                            </ol>
                            <div class="row">
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

                                        <section>
                                            <form action="{{route('admin.topsis.matrix.jarak.ideal')}}" method="POST">
                                                @csrf
                                                <div class="table-responsive">
                                                    <table id="" class="display table table-striped table-bordered" style="width:100%; text-align: center">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 3%">No</th>
                                                                <th style="width: 10%">Nomor Induk Karyawan</th>
                                                                <th style="width: 10%">Nama Karyawan</th>
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
                                                                @inject('penilaian','App\Http\Controllers\Admin\PerhitunganTopsisController')
                                                                @foreach ($penilaian->getMatrix2($karyawan->id) as
                                                                $penilaian)
                                                                <td>
                                                                    {{round($penilaian->nilai,5)}}
                                                                </td>
                                                                @endforeach
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="float: right;">Proses Jarak Ideal</button>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Matix jarak Ideal --}}
                        <div class="tab-pane fade" id="nav-4" role="tabpanel">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Perhitungan Topsis </li>
                                <li class="breadcrumb-item active">Jarak Solusi Ideal </li>
                            </ol>

                            <div class="row">
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

                                        <section>
                                            <form action="{{route('admin.topsis.matrix.preferensi')}}" method="POST">
                                                @csrf
                                                <div class="table-responsive">
                                                    <table id="" class="display table table-striped table-bordered" style="width:100%; text-align: center">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 3%">No</th>
                                                                <th style="width: 10%">Nomor Induk Karyawan</th>
                                                                <th style="width: 10%">Nama Karyawan</th>
                                                                <th style="width: 10%">jarak Ideal Positif (+)</th>
                                                                <th style="width: 10%">jarak Ideal Negatif (-)</th>
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
                                                                @inject('penilaian','App\Http\Controllers\Admin\PerhitunganTopsisController')
                                                                @foreach ($penilaian->getMatrix4($karyawan->id) as
                                                                $penilaian)
                                                                <td>
                                                                    {{round($penilaian->nilai_max ,5)}}
                                                                </td>
                                                                <td>
                                                                    {{round($penilaian->nilai_min ,5)}}
                                                                </td>
                                                                @endforeach
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="float: right;">Proses Preferensi</button>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Matix Preferensi --}}
                        <div class="tab-pane fade" id="nav-5" role="tabpanel">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Perhitungan Topsis </li>
                                <li class="breadcrumb-item active">Nilai Preferensi </li>
                            </ol>

                            <div class="row">
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

                                        <section>
                                            <div class="table-responsive">
                                                <table id="" class="display table table-striped table-bordered" style="width:100%; text-align: center">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 3%">No</th>
                                                            <th style="width: 10%">Nomor Induk Karyawan</th>
                                                            <th style="width: 10%">Nama Karyawan</th>
                                                            <th style="width: 10%">Hasil Preferensi </th>
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
                                                            @inject('penilaian','App\Http\Controllers\Admin\PerhitunganTopsisController')
                                                            @foreach ($penilaian->getMatrix5($karyawan->id) as
                                                            $penilaian)
                                                            <td>
                                                                {{round($penilaian->nilai_max ,5)}}
                                                            </td>
                                                            @endforeach
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>
    {{-- end tabpanel --}}

    </div>
    </div>
    </div>
    </div>
</main>
@endsection

@section('js')
<script>
    new DataTable('table.display');
</script>
@endsection
