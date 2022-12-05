@extends('kendaraan.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Kendaraan</h5>

		<form method="post" action="{{ route('kendaraan.store') }}">
			@csrf
            <div class="mb-3">
                <label for="plat_nomor" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor">
            </div>
			<div class="mb-3">
                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk">
            </div>
            <div class="mb-3">
                <label for="waktu_pajak" class="form-label">Waktu Pajak</label>
                <input type="text" class="form-control" id="waktu_pajak" name="waktu_pajak">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop