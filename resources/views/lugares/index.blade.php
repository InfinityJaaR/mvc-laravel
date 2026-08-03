@extends('layouts.app')

@section('title', 'Lugares Turísticos - El Salvador')

@section('content')
    <h1 class="mb-4">Lugares Turísticos de El Salvador</h1>

    <div class="row g-4">
        @foreach ($lugares as $lugar)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary align-self-start mb-2">{{ $lugar['categoria'] }}</span>
                        <h5 class="card-title">{{ $lugar['titulo'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $lugar['departamento'] }}</h6>
                        <p class="card-text">{{ $lugar['precio'] }}</p>
                        <a href="{{ route('lugares.show', $lugar['id']) }}" class="btn btn-primary mt-auto">Ver detalle</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
