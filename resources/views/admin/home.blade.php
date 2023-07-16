@extends('layouts.admin')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-block">
                    <div class="card-title-block">
                        <h3 class="title text-center">SISTEM PENDUKUNG KEPUTUSAN - SMP MUHAMMADIYAH 31 JAKARTA</h3>
                    </div>
                    <div class="head logo-sekolah">
                        <img src="{{ asset('assets/my_asset/LOGO-SEKOLAH.jpg') }}" alt="LOGO SEKOLAH" class="center">
                    </div>
                    <br>
                    <div class="body description-school text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur temporibus non eligendi corrupti itaque voluptatem unde consequuntur incidunt doloremque praesentium accusantium earum et cumque pariatur similique dolore in, amet cum.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
}
</style>
@endsection
