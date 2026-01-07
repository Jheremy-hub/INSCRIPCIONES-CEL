@extends('layouts.layout')

@section('title', 'Solicitud de Colegiatura')

@section('content')
<div class="cel-card fade-in" style="max-width: 900px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 2px solid var(--color-gray-100);">
        <h2 style="font-size: 2rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Solicitud de Colegiatura</h2>
        <p style="color: var(--color-gray-600); font-size: 1.125rem;">Complete el formulario con sus datos personales y adjunte los documentos requeridos</p>
    </div>

    <form action="{{ route('colegiatura.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Sección: Datos Personales -->
        <div style="margin-bottom: 2.5rem;">
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Datos Personales
            </h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                <div>
                    <label for="nombres" class="cel-label cel-label-required">Nombres</label>
                    <input type="text" id="nombres" name="nombres" class="cel-input @error('nombres') error @enderror" value="{{ old('nombres') }}" required>
                    @error('nombres')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="apellidos" class="cel-label cel-label-required">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" class="cel-input @error('apellidos') error @enderror" value="{{ old('apellidos') }}" required>
                    @error('apellidos')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="dni" class="cel-label">DNI</label>
                    <input type="text" id="dni" name="dni" class="cel-input @error('dni') error @enderror" value="{{ old('dni') }}" maxlength="8" placeholder="8 dígitos">
                    @error('dni')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección: Contacto -->
        <div style="margin-bottom: 2.5rem;">
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Información de Contacto
            </h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                <div>
                    <label for="email" class="cel-label cel-label-required">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="cel-input @error('email') error @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="telefono" class="cel-label">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" class="cel-input @error('telefono') error @enderror" value="{{ old('telefono') }}" placeholder="+51 999 999 999">
                    @error('telefono')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección: Documentos -->
        <div style="margin-bottom: 2.5rem;">
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-cel-blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                Documentos
            </h3>
            
            <div style="display: grid; gap: 1.5rem;">
                <!-- Foto -->
                <div>
                    <label for="foto" class="cel-label">Fotografía Tamaño Carnet</label>
                    <div class="cel-file-upload">
                        <input type="file" id="foto" name="foto" accept="image/jpeg,image/png" style="display: none;" onchange="setupImagePreview(this, 'foto-preview')">
                        <label for="foto" style="cursor: pointer; display: block;">
                            <svg style="width: 48px; height: 48px; margin: 0 auto 1rem; color: var(--color-cel-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p style="font-weight: 600; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Haga clic o arrastre la imagen aquí</p>
                            <p style="font-size: 0.875rem; color: var(--color-gray-500);">JPG o PNG (Máx. 5MB)</p>
                        </label>
                        <img id="foto-preview" style="display: none; max-width: 200px; margin: 1rem auto; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    </div>
                    @error('foto')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Voucher -->
                <div>
                    <label for="voucher" class="cel-label">Voucher de Pago</label>
                    <div class="cel-file-upload">
                        <input type="file" id="voucher" name="voucher" accept="application/pdf,image/jpeg,image/png" style="display: none;">
                        <label for="voucher" style="cursor: pointer; display: block;">
                            <svg style="width: 48px; height: 48px; margin: 0 auto 1rem; color: var(--color-cel-gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p style="font-weight: 600; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Haga clic o arrastre el archivo aquí</p>
                            <p style="font-size: 0.875rem; color: var(--color-gray-500);">PDF, JPG o PNG (Máx. 5MB)</p>
                        </label>
                    </div>
                    @error('voucher')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Solicitud PDF (opcional) -->
                <div>
                    <label for="solicitud_pdf" class="cel-label">Solicitud PDF Completa <span style="font-weight: 400; color: var(--color-gray-500);">(Opcional)</span></label>
                    <div class="cel-file-upload">
                        <input type="file" id="solicitud_pdf" name="solicitud_pdf" accept="application/pdf" style="display: none;">
                        <label for="solicitud_pdf" style="cursor: pointer; display: block;">
                            <svg style="width: 48px; height: 48px; margin: 0 auto 1rem; color: var(--color-gray-500);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <p style="font-weight: 600; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Haga clic o arrastre el archivo aquí</p>
                            <p style="font-size: 0.875rem; color: var(--color-gray-500);">PDF (Máx. 10MB)</p>
                        </label>
                    </div>
                    @error('solicitud_pdf')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Diploma (opcional) -->
                <div>
                    <label for="diploma" class="cel-label">Diploma o Título <span style="font-weight: 400; color: var(--color-gray-500);">(Opcional)</span></label>
                    <div class="cel-file-upload">
                        <input type="file" id="diploma" name="diploma" accept="application/pdf,image/jpeg,image/png" style="display: none;">
                        <label for="diploma" style="cursor: pointer; display: block;">
                            <svg style="width: 48px; height: 48px; margin: 0 auto 1rem; color: var(--color-gray-500);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            <p style="font-weight: 600; color: var(--color-cel-blue); margin-bottom: 0.5rem;">Haga clic o arrastre el archivo aquí</p>
                            <p style="font-size: 0.875rem; color: var(--color-gray-500);">PDF, JPG o PNG (Máx. 10MB)</p>
                        </label>
                    </div>
                    @error('diploma')
                        <div class="cel-error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Botones -->
        <div style="display: flex; gap: 1rem; justify-content: flex-end; padding-top: 2rem; border-top: 2px solid var(--color-gray-100);">
            <a href="{{ route('home') }}" class="cel-btn-secondary">Cancelar</a>
            <button type="submit" class="cel-btn-primary">Enviar Solicitud</button>
        </div>
    </form>
</div>
@endsection
