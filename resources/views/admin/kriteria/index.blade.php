@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kriteria</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">

                    <div class="card-title-block">
                        <h3 class="title">Kriteria</h3>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-md"
                                            href={{ route('admin.kriteria.create') }}>
                                            <i class="fa fa-plus" style="margin-right: 10px"></i>
                                            Tambah Data
                                        </a></h3>
                                </div>
                                <section>
                                    <div class="table-responsive">
                                        <table id="dataKriteria" class="table table-striped table-bordered" style="width:100%; text-align: center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 3%">No</th>
                                                    <th style="width: 10%">Nama Kriteria</th>
                                                    <th style="width: 10%">Bobot Kriteria</th>
                                                    <th style="width: 10%">Bobot</th>
                                                    <th style="width: 8%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($kriterias as $kriteria)
                                                <tr>
                                                    <td>
                                                        {{$no++}}
                                                    </td>
                                                    <td>
                                                        {{$kriteria->name}}
                                                    </td>
                                                    <td>
                                                        {{$kriteria->weight}} %
                                                    </td>
                                                    <td>
                                                        {{$kriteria->bobot}}
                                                    </td>

                                                    <td class="project-actions ">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('admin.kriteria.show',[$kriteria->id]) }}">
                                                            <i class="fa fa-folder"></i>View
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="javascript:void(0)"
                                                            onclick="if(confirm('Are you sure you want to delete this kriteria?')) $('#deleteForm-{{$kriteria->id}}').submit()">
                                                            <i class="fa fa-trash"></i>
                                                            Delete
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.kriteria.delete', [$kriteria->id]) }}"
                                                            method="POST" id='deleteForm-{{$kriteria->id}}'>
                                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                                            <input type="hidden" name="id" value="{{$kriteria->id}}">
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
<script>new DataTable('#dataKriteria');</script>
@endsection
