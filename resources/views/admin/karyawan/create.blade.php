@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item active">Tambah Siswa</li>
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
                        <h3 class="title">Tambah Siswa</h3>
                    </div>

                    <form action="{{ route('admin.karyawan.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nisn">Nomer Induk Siswa Nasional <sup style='color:red'>*</sup></label>
                                <input type="text" placeholder="Enter NISN" name="nisn" id="inputnisn"
                                    class="form-control @if ($errors->has('nisn')) is-invalid @endif"
                                    value="{{ old('nisn') }}">
                                @error('nisn')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Siswa <sup style='color:red'>*</sup></label>
                                <input type="text" placeholder="Enter Name of Siswa" name="name" id="inputName"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Pilih Jenis Kelamin</sup></label>
                                <select name="gender" id="gender"
                                    class="form-control @if ($errors->has('gender')) is-invalid @endif">
                                    <option value="">Select a Gender</option>
                                    <option value="Laki - Laki" @if(old('gender')=='Laki - Laki' ) selected="selected" @endif>Laki - Laki</option>
                                    <option value="Perumpuan" @if(old('gender')=='Perumpuan' ) selected="selected" @endif>Perumpuan</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pob">Tempat Lahir </sup></label>
                                <input type="text" placeholder="Enter Place of Birth" name="pob" id="inputName"
                                    class="form-control @if ($errors->has('pob')) is-invalid @endif"
                                    value="{{ old('pob') }}">
                                @error('pob')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dob">Tanggal Lahir</label>
                                <input type="date" placeholder="Enter dob" name="dob" id="inputdob"
                                    class="form-control @if ($errors->has('dob')) is-invalid @endif"
                                    value="{{ old('dob') }}">
                                @error('dob')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="religion">Pilih Agama</sup></label>
                                <select name="religion" id="religion" class="form-control @if ($errors->has('religion')) is-invalid @endif">
                                    <option value="">Select a religion</option>
                                    <option value="Islam" @if(old('religion')=='Islam' ) selected="selected" @endif>Islam</option>
                                    <option value="Protestan" @if(old('religion')=='Protestan' ) selected="selected" @endif>Protestan</option>
                                    <option value="Katolik" @if(old('religion')=='Katolik' ) selected="selected" @endif>Katolik</option>
                                    <option value="Hindu" @if(old('religion')=='Hindu' ) selected="selected" @endif>Hindu</option>
                                    <option value="Buddha" @if(old('religion')=='Buddha' ) selected="selected" @endif>Buddha</option>
                                    <option value="Khonghucu" @if(old('religion')=='Khonghucu' ) selected="selected" @endif>Khonghucu</option>
                                </select>
                                @error('religion')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name_parent">Nama Orang Tua </sup></label>
                                <input type="text" placeholder="Nama Orang Tua" name="name_parent" id="inputName"
                                    class="form-control @if ($errors->has('name_parent')) is-invalid @endif"
                                    value="{{ old('name_parent') }}">
                                @error('name_parent')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address </sup></label>
                                <input type="text" placeholder="Enter Address of Siswa" name="address" id="inputName"
                                    class="form-control @if ($errors->has('address')) is-invalid @endif"
                                    value="{{ old('address') }}">
                                @error('address')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <a class="btn btn-danger" href="{{ route('admin.karyawan.index') }}">Cancel</a>
                            <input type="submit" value="Create" class="btn btn-success float-right">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
