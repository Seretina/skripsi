@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Penilaian</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">

                    <div class="card-title-block">
                        <h3 class="title">Penilaian</h3>
                    </div>
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

                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a class="btn btn-primary btn-md" href={{ route('admin.penilaian.create') }}>
                                            <i class="fa fa-plus" style="margin-right: 10px"></i>
                                            Tambah Data
                                        </a>
                                    </h3>
                                </div>
                                <section>
                                    <div class="table-responsive">
                                        <table id="" class="display table table-striped table-bordered" style="width:100%; text-align: center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 3%">No</th>
                                                    <th style="width: 10%">Nomor Induk Siswa Nasional</th>
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
                                                    @inject('penilaian',
                                                    'App\Http\Controllers\Admin\PenilaianController')
                                                    @foreach ($penilaian->penilaianKaryawan($karyawan->id) as
                                                    $penilaian)
                                                    {{-- <td>
                                                        {{round($penilaian->nilai,4)}}
                                                    </td> --}}
                                                    <td>
                                                        {{ $penilaian->nilai}}
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
        </div>
        {{-- page table inisial --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">
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

                                <div class="card-title-block">
                                    <h3 class="title">Inisialisasi Nilai</h3>
                                </div>
                                <section>
                                    <form action="{{route('admin.topsis.matrix.normalisasi')}}" method="POST">
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
                                                        @inject('penilaian',
                                                        'App\Http\Controllers\Admin\PenilaianController')
                                                        @foreach ($penilaian->penilaianKaryawan($karyawan->id) as
                                                        $penilaian)
                                                        <td>
                                                            {{round($penilaian->nilai_inisial,4)}}
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <br>
                                            <button type="submit" class="btn btn-primary" style="float: right;">Proses
                                                Normaliasasi</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
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
