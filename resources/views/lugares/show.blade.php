@extends('layouts.app')

@section('title', $lugar['titulo'] . ' - El Salvador Turístico')

@section('content')
    <a href="{{ route('lugares.index') }}" class="btn btn-outline-secondary btn-sm mb-3">&larr; Volver al catálogo</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <span class="badge bg-secondary mb-2">{{ $lugar['categoria'] }}</span>
            <h1 class="card-title">{{ $lugar['titulo'] }}</h1>

            <dl class="row mt-4">
                <dt class="col-sm-3">Departamento</dt>
                <dd class="col-sm-9">{{ $lugar['departamento'] }}</dd>

                <dt class="col-sm-3">Categoría</dt>
                <dd class="col-sm-9">{{ $lugar['categoria'] }}</dd>

                <dt class="col-sm-3">Precio</dt>
                <dd class="col-sm-9">{{ $lugar['precio'] }}</dd>

                <dt class="col-sm-3">Horario</dt>
                <dd class="col-sm-9">{{ $lugar['horario'] }}</dd>

                <dt class="col-sm-3">Ubicación</dt>
                <dd class="col-sm-9">{{ $lugar['ubicacion'] }}</dd>
            </dl>

            <p class="mt-3">{{ $lugar['descripcion'] }}</p>

            <a href="{{ route('contacto.create', ['lugar_id' => $lugar['id']]) }}" class="btn btn-primary">
                Contactar sobre este lugar
            </a>
        </div>
    </div>
@endsection
