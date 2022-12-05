@extends('pemilik.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <ul class="navbar-nav ms-4 flex-row item-justify gap-4"> 
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
                                    <a type="button" class="btn btn-info rounded-3"  href="{{ route('join') }}">{{ __('Pajak') }}</a>
                                </li>
</ul>
            </div>
        </div>
    </div>
</div>
@endsection
