@extends('layouts.layout')

@section('title', 'Confirmación')

@section('content')
<div class="cel-card fade-in" style="max-width: 700px; margin: 0 auto; text-align: center;">
    <!-- Success Icon -->
    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--color-success) 0%, #10b981 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);">
        <svg style="width: 60px; height: 60px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 style="font-size: 2rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1rem;">¡Solicitud Enviada Exitosamente!</h2>
    
    <p style="font-size: 1.125rem; color: var(--color-gray-600); margin-bottom: 2rem; line-height: 1.6;">
        Su solicitud de colegiatura ha sido recibida y se encuentra en proceso de revisión.
    </p>

    <!-- Request Details -->
    <div style="background: var(--color-gray-50); border-radius: 12px; padding: 2rem; margin-bottom: 2rem; text-align: left;">
        <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1.5rem; text-align: center;">Detalles de su Solicitud</h3>
        
        <div style="display: grid; gap: 1rem;">
            <div style="display: flex; justify-content: space-between; padding: 0.75rem; background: white; border-radius: 8px;">
                <span style="font-weight: 600; color: var(--color-gray-700);">Número de Solicitud:</span>
                <span style="color: var(--color-cel-blue); font-weight: 700;">#{{ str_pad($solicitud->id, 6, '0', STR_PAD_LEFT) }}</span>
            </div>
            
            <div style="display: flex; justify-content: space-between; padding: 0.75rem; background: white; border-radius: 8px;">
                <span style="font-weight: 600; color: var(--color-gray-700);">Solicitante:</span>
                <span style="color: var(--color-gray-800);">{{ $solicitud->nombre_completo }}</span>
            </div>
            
            <div style="display: flex; justify-content: space-between; padding: 0.75rem; background: white; border-radius: 8px;">
                <span style="font-weight: 600; color: var(--color-gray-700);">Email:</span>
                <span style="color: var(--color-gray-800);">{{ $solicitud->email }}</span>
            </div>
            
            <div style="display: flex; justify-content: space-between; padding: 0.75rem; background: white; border-radius: 8px;">
                <span style="font-weight: 600; color: var(--color-gray-700);">Fecha:</span>
                <span style="color: var(--color-gray-800);">{{ $solicitud->created_at->format('d/m/Y H:i') }}</span>
            </div>
            
            <div style="display: flex; justify-content: space-between; padding: 0.75rem; background: white; border-radius: 8px;">
                <span style="font-weight: 600; color: var(--color-gray-700);">Estado:</span>
                <span class="cel-badge {{ $solicitud->getStatusBadgeClass() }}">{{ $solicitud->getStatusLabel() }}</span>
            </div>
        </div>
    </div>

    <!-- Next Steps -->
    <div style="background: linear-gradient(135deg, var(--color-cel-blue) 0%, var(--color-cel-blue-light) 100%); color: white; border-radius: 12px; padding: 2rem; margin-bottom: 2rem; text-align: left;">
        <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem;">Próximos Pasos</h3>
        <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="flex-shrink: 0; width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.875rem;">1</span>
                <span>Su solicitud será revisada por nuestro equipo administrativo</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="flex-shrink: 0; width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.875rem;">2</span>
                <span>Recibirá un correo electrónico con actualizaciones sobre el estado de su solicitud</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="flex-shrink: 0; width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.875rem;">3</span>
                <span>Puede consultar el estado en cualquier momento usando su email o DNI</span>
            </li>
        </ul>
    </div>

    <!-- Actions -->
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="{{ route('colegiatura.track') }}" class="cel-btn-primary">
            Rastrear mi Solicitud
        </a>
        <a href="{{ route('home') }}" class="cel-btn-secondary">
            Volver al Inicio
        </a>
    </div>
</div>
@endsection
