@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>{{ __('Reportes') }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('urbanizacion.index') }}" class="btn btn-primary">Urbanizaciones</a>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('reporte.lecturas') }}" class="btn btn-primary">Reporte de Lecturas </a>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('reporte.lecturas.anios') }}" class="btn btn-primary">Reporte de Lecturas por año</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
