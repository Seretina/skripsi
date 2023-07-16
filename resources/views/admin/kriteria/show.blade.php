@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Kriteria</li>
        <li class="breadcrumb-item active">Tambah Kriteria</li>
    </ol>
    <div class="container-fluid">
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
                        <h3 class="title">Tambah Kriteria</h3>
                    </div>

                    <form action="{{ route('admin.kriteria.update', [ $kriteria->id ]) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Kriteria <sup style='color:red'>*</sup></label>
                                <input type="text" placeholder="Enter Name of Kriteria" name="name" id="inputName"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    value="{{ $kriteria->name }}">
                                @error('name')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="weight">Bobot Kriteria ( Weight )</sup></label>
                                <input type="number" placeholder="Enter weight of Employee" name="weight" id="inputName"
                                    class="form-control @if ($errors->has('weight')) is-invalid @endif"
                                    value="{{ $kriteria->weight }}">
                                @error('weight')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <a class="btn btn-danger" href="{{ route('admin.kriteria.index') }}">Cancel</a>
                            <input type="submit" value="Create Kriteria" class="btn btn-success float-right">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
