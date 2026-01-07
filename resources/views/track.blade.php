@extends('layouts.layout')

@section('title', 'Seguimiento de Solicitud')

@section('content')
<div class="cel-card fade-in" style="max-width: 600px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 2rem;">
        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-cel-blue) 0%, var(--color-cel-blue-light) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
            <svg style="width: 40px; height: 40px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <h2 style="font-size: 2rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Seguimiento de Solicitud</h2>
        <p style="color: var(--color-gray-600); font-size: 1.125rem;">Consulte el estado de su solicitud de colegiatura</p>
    </div>

    <form action="{{ route('colegiatura.status') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 1.5rem;">
            <label for="search" class="cel-label">Ingrese su Email o DNI</label>
            <input type="text" id="search" name="search" class="cel-input @error('search') error @enderror" value="{{ old('search') }}" placeholder="ejemplo@correo.com o 12345678" required>
            @error('search')
                <div class="cel-error-message">{{ $message }}</div>
            @enderror
            <p style="font-size: 0.875rem; color: var(--color-gray-500); margin-top: 0.5rem;">
                Ingrese el correo electrónico o DNI que utilizó al registrar su solicitud
            </p>
        </div>

        <button type="submit" class="cel-btn-primary" style="width: 100%;">
            <span style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Buscar Solicitud
            </span>
        </button>
    </form>

    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid var(--color-gray-100); text-align: center;">
        <p style="color: var(--color-gray-600); margin-bottom: 1rem;">¿Aún no ha enviado su solicitud?</p>
        <a href="{{ route('colegiatura.create') }}" class="cel-btn-secondary">
            Iniciar Nueva Solicitud
        </a>
    </div>
</div>
@endsection
