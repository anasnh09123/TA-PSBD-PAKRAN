@extends('pemilik.layout')

@section('content')
<ul class="navbar-nav ms-auto flex-row item-justify gap-5"> 
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3" href="{{ route('kendaraan.index') }}">{{ __('Kendaraan') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3" href="{{ route('pemilik.index') }}">{{ __('Pemilik') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="{{ route('pajak.index') }}">{{ __('Kategori') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-success rounded-3"  href="{{ route('join') }}">{{ __('Pajak') }}</a>
                                </li>
</ul>
<h4 class="mt-5">Pajak Kendaraan</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<form action="">
<div class="input-group mb-3">
  <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<table class="table table-hover mt-2">
    <thead>
      <tr>
      <th>Id Pemilik</th>
        <th>Plat Nomor</th>
        <th>Nama Pemilik</th>
        <th>Jenis Kendaraan</th>
        <th>Merk </th>
        <th>Waktu Pajak</th>
        <th>Harga Pajak/thn</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_pemilik }}</td>
                <td>{{ $data->plat_nomor }}</td>
                <td>{{ $data->nama_pemilik }}</td>
                <td>{{ $data->jenis_kendaraan }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->waktu_pajak }}</td>
                <td>{{ $data->harga_pajak }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop