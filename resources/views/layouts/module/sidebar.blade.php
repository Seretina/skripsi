<nav class="sidebar-nav">
    <ul class="nav">
        <br>
        <br>
        <br>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home')}}">
                <i class="nav-icon fa fa-barcode"></i> Dashboard
            </a>
        </li>
        <br>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.karyawan.index')}}">
                <i class="nav-icon fa fa-barcode"></i> Data Siswa
            </a>
        </li>
        <br>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.kriteria.index')}}">
                <i class="nav-icon fa fa-barcode"></i> Kriteria Siswa
            </a>
        </li>
        <br>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.penilaian.index')}}">
                <i class="nav-icon fa fa-barcode"></i> Penilaian Siswa
            </a>
        </li>
        <br>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.topsis.index')}}">
                <i class="nav-icon fa fa-barcode"></i> Perhitungan Topsis
            </a>
        </li>

    </ul>

</nav>
