@extends('layouts.layout')

@section('title', 'Estado de Solicitud')

@section('content')
<div class="cel-card fade-in" style="max-width: 800px; margin: 0 auto;">
    <!-- Header -->
    <div style="text-align: center; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 2px solid var(--color-gray-100);">
        <h2 style="font-size: 2rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Estado de su Solicitud</h2>
        <p style="color: var(--color-gray-600);">Número de Solicitud: <strong>#{{ str_pad($solicitud->id, 6, '0', STR_PAD_LEFT) }}</strong></p>
    </div>

    <!-- Status Badge -->
    <div style="text-align: center; margin-bottom: 2rem;">
        <span class="cel-badge {{ $solicitud->getStatusBadgeClass() }}" style="font-size: 1.125rem; padding: 0.75rem 1.5rem;">
            {{ $solicitud->getStatusLabel() }}
        </span>
    </div>

    <!-- Applicant Information -->
    <div style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1.5rem;">Información del Solicitante</h3>
        <div style="background: var(--color-gray-50); border-radius: 12px; padding: 1.5rem;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div>
                    <p style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 0.25rem;">Nombre Completo</p>
                    <p style="font-weight: 600; color: var(--color-gray-800);">{{ $solicitud->nombre_completo }}</p>
                </div>
                @if($solicitud->dni)
                <div>
                    <p style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 0.25rem;">DNI</p>
                    <p style="font-weight: 600; color: var(--color-gray-800);">{{ $solicitud->dni }}</p>
                </div>
                @endif
                <div>
                    <p style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 0.25rem;">Email</p>
                    <p style="font-weight: 600; color: var(--color-gray-800);">{{ $solicitud->email }}</p>
                </div>
                @if($solicitud->telefono)
                <div>
                    <p style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 0.25rem;">Teléfono</p>
                    <p style="font-weight: 600; color: var(--color-gray-800);">{{ $solicitud->telefono }}</p>
                </div>
                @endif
                <div>
                    <p style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 0.25rem;">Fecha de Solicitud</p>
                    <p style="font-weight: 600; color: var(--color-gray-800);">{{ $solicitud->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents -->
    <div style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1.5rem;">Documentos Adjuntos</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
            @if($solicitud->foto_path)
            <div style="background: var(--color-gray-50); border-radius: 10px; padding: 1rem; text-align: center;">
                <svg style="width: 40px; height: 40px; margin: 0 auto 0.75rem; color: var(--color-cel-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p style="font-weight: 600; margin-bottom: 0.5rem; color: var(--color-gray-700);">Fotografía</p>
                <a href="{{ $solicitud->foto_url }}" target="_blank" class="cel-btn-secondary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Ver</a>
            </div>
            @endif

            @if($solicitud->voucher_path)
            <div style="background: var(--color-gray-50); border-radius: 10px; padding: 1rem; text-align: center;">
                <svg style="width: 40px; height: 40px; margin: 0 auto 0.75rem; color: var(--color-cel-gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p style="font-weight: 600; margin-bottom: 0.5rem; color: var(--color-gray-700);">Voucher</p>
                <a href="{{ $solicitud->voucher_url }}" target="_blank" class="cel-btn-secondary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Ver</a>
            </div>
            @endif

            @if($solicitud->solicitud_pdf_path)
            <div style="background: var(--color-gray-50); border-radius: 10px; padding: 1rem; text-align: center;">
                <svg style="width: 40px; height: 40px; margin: 0 auto 0.75rem; color: var(--color-gray-600);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <p style="font-weight: 600; margin-bottom: 0.5rem; color: var(--color-gray-700);">Solicitud PDF</p>
                <a href="{{ $solicitud->solicitud_pdf_url }}" target="_blank" class="cel-btn-secondary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Ver</a>
            </div>
            @endif

            @if($solicitud->diploma_path)
            <div style="background: var(--color-gray-50); border-radius: 10px; padding: 1rem; text-align: center;">
                <svg style="width: 40px; height: 40px; margin: 0 auto 0.75rem; color: var(--color-success);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                <p style="font-weight: 600; margin-bottom: 0.5rem; color: var(--color-gray-700);">Diploma</p>
                <a href="{{ $solicitud->diploma_url }}" target="_blank" class="cel-btn-secondary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Ver</a>
            </div>
            @endif
        </div>
    </div>

    <!-- Admin Notes (if any) -->
    @if($solicitud->notas_admin)
    <div style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1rem;">Observaciones del Administrador</h3>
        <div style="background: var(--color-info); background: rgba(59, 130, 246, 0.1); border-left: 4px solid var(--color-info); border-radius: 8px; padding: 1.5rem;">
            <p style="color: var(--color-gray-800); line-height: 1.6;">{{ $solicitud->notas_admin }}</p>
        </div>
    </div>
    @endif

    <!-- Status Info -->
    @if($solicitud->isPendiente())
    <div style="background: rgba(245, 158, 11, 0.1); border-left: 4px solid var(--color-warning); border-radius: 8px; padding: 1.5rem; margin-bottom: 2rem;">
        <p style="color: var(--color-gray-800); line-height: 1.6;">
            <strong>Su solicitud está en revisión.</strong> Nuestro equipo administrativo está evaluando su documentación. Recibirá una notificación por correo electrónico cuando haya una actualización.
        </p>
    </div>
    @elseif($solicitud->isAprobado())
    <div style="background: rgba(16, 185, 129, 0.1); border-left: 4px solid var(--color-success); border-radius: 8px; padding: 1.5rem; margin-bottom: 2rem;">
        <p style="color: var(--color-gray-800); line-height: 1.6;">
            <strong>¡Felicitaciones! Su solicitud ha sido aprobada.</strong> Pronto recibirá instrucciones sobre los siguientes pasos para completar su proceso de colegiatura.
        </p>
    </div>
    @elseif($solicitud->isRechazado())
    <div style="background: rgba(239, 68, 68, 0.1); border-left: 4px solid var(--color-error); border-radius: 8px; padding: 1.5rem; margin-bottom: 2rem;">
        <p style="color: var(--color-gray-800); line-height: 1.6;">
            <strong>Su solicitud ha sido rechazada.</strong> Por favor revise las observaciones del administrador para más detalles o contacte con nuestra oficina para mayor información.
        </p>
    </div>
    @endif

    <!-- Actions -->
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; padding-top: 2rem; border-top: 2px solid var(--color-gray-100);">
        <a href="{{ route('colegiatura.track') }}" class="cel-btn-secondary">Buscar otra Solicitud</a>
        <a href="{{ route('home') }}" class="cel-btn-secondary">Volver al Inicio</a>
    </div>
</div>
@endsection
