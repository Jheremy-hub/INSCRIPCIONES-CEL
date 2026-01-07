@extends('layouts.layout')

@section('title', 'Registro de Colegiatura - CEL')

@section('content')
<!-- Línea dorada superior -->
<div style="height: 4px; background: linear-gradient(90deg, #d4af37 0%, #f3eacb 50%, #d4af37 100%); width: 100%;"></div>

<div class="cel-container" style="padding: 2rem 1rem; background: #f3f4f6; min-height: 100vh;">
    
    <!-- Lógica de Éxito: Ocultar Formulario -->
    @if(session('success'))
        <div style="text-align: center; max-width: 600px; margin: 5rem auto; background: white; padding: 4rem 2rem; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <div style="font-size: 4rem; margin-bottom: 1.5rem;">✅</div>
            <h2 style="color: #065f46; font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">¡Datos Registrados!</h2>
            <p style="color: #4b5563; font-size: 1.1rem; margin-bottom: 2.5rem;">
                {{ session('success') }}
            </p>
            <a href="{{ route('home') }}" style="background: #b91c1c; color: white; padding: 1rem 3rem; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1.1rem; transition: background 0.3s; display: inline-block;">
                Volver a la página principal
            </a>
        </div>
    @else
        <!-- Header de Bienvenida -->
        <h1 style="text-align: center; color: #b91c1c; font-size: 2.5rem; font-weight: 700; margin-bottom: 2rem;">
            ¡Bienvenido al Colegio de Economistas de Lima!
        </h1>

        <!-- Banner de Modalidades -->
        <div style="max-width: 1000px; margin: 0 auto 3rem;">
            <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160962609/settings_images/37f6072-d1d3-017b-da74-c52dd0856af7_OPTIN_COLEGIATURA-01.jpg" 
                 alt="Modalidades de Colegiatura CEL" 
                 style="width: 100%; height: auto; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border: 4px solid #9ca3af;">
        </div>

        <!-- Formulario Principal -->
        <div style="background: #e5e7eb; border-radius: 16px; padding: 3rem; max-width: 700px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            
            <!-- Título -->
            <h2 style="text-align: center; color: #b91c1c; font-size: 1.8rem; font-weight: 700; margin: 0 0 2rem;">
                ¡Colégiate hoy y marca la diferencia!
            </h2>

            <!-- Subtítulo del formulario -->
            <h4 style="text-align: center; color: #b91c1c; font-size: 1.1rem; font-style: italic; margin: 2rem 0 1.5rem;">
                Registra tus datos aquí
            </h4>

            <form action="{{ route('colegiatura.registro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if($errors->any())
                    <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
                        <strong>Por favor corrige los siguientes errores:</strong>
                        <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Campos de Datos Personales -->
                <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                    <input type="text" name="apellidos_nombres" placeholder="APELLIDOS Y NOMBRES" required
                        style="width: 100%; padding: 1rem; border: 1px solid #d1d5db; border-radius: 4px; font-size: 0.95rem; color: #6b7280; box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);">
                    
                    <input type="email" name="correo" placeholder="CORREO ELECTRÓNICO" required
                        style="width: 100%; padding: 1rem; border: 1px solid #d1d5db; border-radius: 4px; font-size: 0.95rem; color: #6b7280; box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);">
                    
                    <input type="tel" name="celular" placeholder="NÚMERO CELULAR" required
                        style="width: 100%; padding: 1rem; border: 1px solid #d1d5db; border-radius: 4px; font-size: 0.95rem; color: #6b7280; box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);">
                    
                    <input type="text" name="dni" placeholder="NÚMERO DE DNI" required maxlength="8"
                        style="width: 100%; padding: 1rem; border: 1px solid #d1d5db; border-radius: 4px; font-size: 0.95rem; color: #6b7280; box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);">
                </div>

                <!-- Separador -->
                <div style="border-top: 2px solid #b91c1c; margin: 2rem 0; padding-top: 2rem;">
                    <h4 style="text-align: center; color: #003d82; font-size: 1.1rem; font-weight: 700; margin: 0 0 1.5rem;">
                        Sube tus documentos
                    </h4>
                </div>

                <!-- Grid de Documentos -->
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    
                    <!-- Solicitud de Incorporación -->
                    <div style="background: white; border: 1px solid #d1d5db; border-radius: 8px; padding: 1rem;">
                        <label style="display: block; color: #1f2937; font-weight: 600; margin-bottom: 0.5rem;">
                            Solicitud de Incorporación (PDF)
                        </label>
                        <input type="file" name="solicitud_incorporacion" accept=".pdf" required
                            style="width: 100%; padding: 0.5rem; border: 1px dashed #9ca3af; border-radius: 4px; cursor: pointer;">
                    </div>

                    <!-- Ficha Personal -->
                    <div style="background: white; border: 1px solid #d1d5db; border-radius: 8px; padding: 1rem;">
                        <label style="display: block; color: #1f2937; font-weight: 600; margin-bottom: 0.5rem;">
                            Ficha Personal (PDF)
                        </label>
                        <input type="file" name="ficha_personal" accept=".pdf" required
                            style="width: 100%; padding: 0.5rem; border: 1px dashed #9ca3af; border-radius: 4px; cursor: pointer;">
                    </div>

                    <!-- Compromiso de Honor -->
                    <div style="background: white; border: 1px solid #d1d5db; border-radius: 8px; padding: 1rem;">
                        <label style="display: block; color: #1f2937; font-weight: 600; margin-bottom: 0.5rem;">
                            Compromiso de Honor (PDF)
                        </label>
                        <input type="file" name="compromiso_honor" accept=".pdf" required
                            style="width: 100%; padding: 0.5rem; border: 1px dashed #9ca3af; border-radius: 4px; cursor: pointer;">
                    </div>

                    <!-- Declaración Jurada -->
                    <div style="background: white; border: 1px solid #d1d5db; border-radius: 8px; padding: 1rem;">
                        <label style="display: block; color: #1f2937; font-weight: 600; margin-bottom: 0.5rem;">
                            Declaración Jurada (PDF)
                        </label>
                        <input type="file" name="declaracion_jurada" accept=".pdf" required
                            style="width: 100%; padding: 0.5rem; border: 1px dashed #9ca3af; border-radius: 4px; cursor: pointer;">
                    </div>

                    <!-- Ficha Carnet -->
                    <div style="background: white; border: 1px solid #d1d5db; border-radius: 8px; padding: 1rem;">
                        <label style="display: block; color: #1f2937; font-weight: 600; margin-bottom: 0.5rem;">
                            Ficha Carnet (PDF o Imagen)
                        </label>
                        <input type="file" name="ficha_carnet" accept=".pdf,.jpg,.jpeg,.png" required
                            style="width: 100%; padding: 0.5rem; border: 1px dashed #9ca3af; border-radius: 4px; cursor: pointer;">
                    </div>
                </div>

                <!-- Botón Enviar -->
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" style="background: #b91c1c; color: white; border: none; padding: 1rem 3rem; font-size: 1.1rem; font-weight: 700; border-radius: 6px; cursor: pointer; transition: background 0.3s;">
                        Enviar
                    </button>
                </div>
            </form>
        </div>

        <!-- Enlace de regreso -->
        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('home') }}" style="color: #6b7280; text-decoration: none; font-weight: 600;">
                ← Volver a la página principal
            </a>
        </div>
    @endif
</div>

<script>
    // Actualizar nombre de archivo seleccionado
    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.addEventListener('change', function() {
            // Opcional: mostrar nombre
        });
    });
</script>
@endsection
