@extends('pajak.layout')

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

        <h5 class="card-title fw-bolder mb-3">Tambah Kategori</h5>

		<form method="post" action="{{ route('pajak.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_pajak" class="form-label">ID Kategori</label>
                <input type="text" class="form-control" id="id_pajak" name="id_pajak">
            </div>
			<div class="mb-3">
                <label for="harga_pajak" class="form-label">Harga Pajak/thn</label>
                <input type="text" class="form-control" id="harga_pajak" name="harga_pajak">
            </div>
            <div class="mb-3">
                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop