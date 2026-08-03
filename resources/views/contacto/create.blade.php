@extends('layouts.app')

@section('title', 'Contacto - El Salvador Turístico')

@section('content')
    <h1 class="mb-4">Formulario de Contacto</h1>

    @if (session('exito'))
        <div class="alert alert-success">{{ session('exito') }}</div>
    @endif

    <form method="POST" action="{{ route('contacto.store') }}" class="card card-body shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                   class="form-control @error('nombre') is-invalid @enderror">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lugar_id" class="form-label">¿Sobre qué lugar consultas?</label>
            <select name="lugar_id" id="lugar_id" class="form-select @error('lugar_id') is-invalid @enderror">
                <option value="">-- Consulta general --</option>
                @foreach ($lugares as $lugar)
                    <option value="{{ $lugar['id'] }}"
                        @selected(old('lugar_id', $lugarSeleccionado['id'] ?? null) == $lugar['id'])>
                        {{ $lugar['titulo'] }}
                    </option>
                @endforeach
            </select>
            @error('lugar_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea name="mensaje" id="mensaje" rows="4"
                      class="form-control @error('mensaje') is-invalid @enderror">{{ old('mensaje') }}</textarea>
            @error('mensaje')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
