@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Siswa</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">

                    <div class="card-title-block">
                        <h3 class="title">Data Siswa</h3>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-block">
                                <div class="card-title-block">
                                    <div>
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
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title"><a class="btn btn-primary btn-md"
                                            href={{ route('admin.karyawan.create') }}>
                                            <i class="fa fa-plus" style="margin-right: 10px"></i>
                                            Tambah Data
                                        </a></h3>
                                </div>
                                <section>
                                    <div class="table-responsive">
                                        <table id="dataSiswa" class="table table-striped table-bordered" style="width:100%; text-align: center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 3%">No</th>
                                                    <th style="width: 10%">NISN</th>
                                                    <th style="width: 10%">Nama Siswa</th>
                                                    <th style="width: 10%">Jenis Kelamin</th>
                                                    <th style="width: 10%">Tempat Lahir</th>
                                                    <th style="width: 10%">Tanggal Lahir</th>
                                                    <th style="width: 10%">Agama</th>
                                                    <th style="width: 10%">Nama Orang Tua</th>
                                                    <th style="width: 10%">Alamat</th>
                                                    <th style="width: 8%">Aksi</th>
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
                                                    <td>
                                                        {{$karyawan->gender}}
                                                    </td>
                                                    <td>
                                                        {{$karyawan->pob}}
                                                    </td>
                                                    <td>
                                                        {{$karyawan->dob}}
                                                    </td>
                                                    <td>
                                                        {{$karyawan->religion}}
                                                    </td>
                                                    <td>
                                                        {{$karyawan->name_parent}}
                                                    </td>
                                                    <td>
                                                        {{$karyawan->address}}
                                                    </td>
                                                    <td class="project-actions ">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('admin.karyawan.show',[$karyawan->id]) }}">
                                                            <i class="fa fa-folder"></i>View
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="javascript:void(0)"
                                                            onclick="if(confirm('Are you sure you want to delete this employee?')) $('#deleteForm-{{$karyawan->id}}').submit()">
                                                            <i class="fa fa-trash"></i>
                                                            Delete
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.karyawan.delete', [$karyawan->id]) }}"
                                                            method="POST" id='deleteForm-{{$karyawan->id}}'>
                                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                                            <input type="hidden" name="id" value="{{$karyawan->id}}">
                                                        </form>
                                                    </td>
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
    </div>
</main>
@endsection
@section('js')
<script>new DataTable('#dataSiswa');</script>
@endsection
