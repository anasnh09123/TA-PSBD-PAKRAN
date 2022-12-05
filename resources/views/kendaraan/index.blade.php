@extends('kendaraan.layout')

@section('content')

<form action="">
<ul class="navbar-nav ms-auto flex-row item-justify gap-5"> 
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                    <a type="button" class="btn btn-success rounded-3" href="{{ route('kendaraan.index') }}">{{ __('Kendaraan') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3" href="{{ route('pemilik.index') }}">{{ __('Pemilik') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="{{ route('pajak.index') }}">{{ __('Kategori') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="{{ route('join') }}">{{ __('Pajak') }}</a>
                                </li>
</ul>

<h4 class="mt-5">Data Kendaraan</h4>
<div class="input-group mt-3 mb-2">
  <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<a href="{{ route('kendaraan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Plat Nomor</th>
        <th>Jenis Kendaraan</th>
        <th>Merk</th>
        <th>Waktu Pajak</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->plat_nomor }}</td>
                <td>{{ $data->jenis_kendaraan }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->waktu_pajak }}</td>
                <td>
                    <a href="{{ route('kendaraan.edit', $data->plat_nomor) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                 
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->plat_nomor }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->plat_nomor }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kendaraan.delete', $data->plat_nomor) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recycle{{ $data->plat_nomor }}">
                        Recycle
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="recycle{{ $data->plat_nomor }}" tabindex="-1" aria-labelledby="recycleLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recycleLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kendaraan.recycle', $data->plat_nomor) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<h4 class="">Recycle</h4>

<table class="table table-hover mt-2">
    <thead>
      <tr>
      <th>Plat Nomor</th>
        <th>Jenis Kendaraan</th>
        <th>Merk</th>
        <th>Waktu Pajak</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datasrecycle as $data)
            <tr>
            <td>{{ $data->plat_nomor }}</td>
                <td>{{ $data->jenis_kendaraan }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->waktu_pajak }}</td>
                <td>
                    <a href="{{ route('kendaraan.restore', $data->plat_nomor) }}" type="button" class="btn btn-secondary rounded-3">Restore</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop