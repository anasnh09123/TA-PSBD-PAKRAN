@extends('pemilik.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data pemilik</h5>

		<form method="post" action="{{ route('pemilik.update', $data->id_pemilik) }}">
			@csrf
            <div class="mb-3">
                <label for="id_pemilik" class="form-label">ID pemilik</label>
                <input type="text" class="form-control" id="id_pemilik" name="id_pemilik" value="{{ $data->id_pemilik }}">
            </div>
			<div class="mb-3">
                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ $data->nama_pemilik }}">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}">
            </div>
            <div class="mb-3">
                <label for="plat_nomor" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="{{ $data->plat_nomor }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop