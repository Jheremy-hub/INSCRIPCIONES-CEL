@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<!-- Línea dorada superior -->
<div style="height: 4px; background: linear-gradient(90deg, #d4af37 0%, #f3eacb 50%, #d4af37 100%); width: 100%;"></div>

<div style="background: #f3f4f6; min-height: 100vh; padding-bottom: 3rem;">
    <!-- Hero Banner -->
    <div style="max-width: 1200px; margin: 0 auto 3rem; padding-top: 2rem; padding-left: 1rem; padding-right: 1rem;">
        <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.15); border: 4px solid #9ca3af;">
            <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160927626/settings_images/3df67-5fa7-570-0e87-61ec7786e3c_PORTADA_WEB-01.jpg" alt="Colegio de Economistas de Lima" style="width: 100%; height: auto; display: block;">
        </div>
    </div>

    <div class="cel-container" style="padding: 0 1rem;">
        <!-- CTA Button -->
        <div style="text-align: center; margin-bottom: 4rem;">
            <a href="https://api.whatsapp.com/send?phone=51991730865" target="_blank" class="cel-btn-yellow" style="display: inline-block; width: auto; max-width: 400px; padding: 1.25rem 3.5rem; font-size: 1.15rem;">
                📞 Contáctanos YA
            </a>
        </div>

        <!-- Intro Text -->
        <div style="text-align: center; max-width: 900px; margin: 0 auto 5rem; padding: 2.5rem; background: white; border-radius: 16px; box-shadow: 0 8px 30px rgba(0,61,130,0.08);">
            <p style="font-weight: 600; margin-bottom: 1rem; font-size: 1.2rem; color: #003d82;">
                Ser parte del CEL es dar un paso firme hacia el crecimiento profesional.
            </p>
            <p style="color: #374151; line-height: 1.8; font-size: 1.05rem;">
                Al colegiarte, accedes a una red de economistas de alto nivel, formación continua especializada, respaldo institucional y oportunidades para destacar en el ámbito público y privado.
            </p>
            <div style="width: 80px; height: 3px; background: #d4a744; margin: 1.5rem auto; border-radius: 2px;"></div>
            <p style="font-weight: 800; color: #003d82; margin-top: 1.5rem; font-size: 1.4rem;">
                ¡Colégiate hoy y marca la diferencia!
            </p>
        </div>

        <!-- Colegiaturas y Costos Header -->
        <div class="cel-red-banner">
            COLEGIATURAS Y COSTOS
        </div>

        <!-- Pricing Accordions -->
        <div style="max-width: 900px; margin: 0 auto 5rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1.5rem; align-items: start;">
            
            <!-- Ordinaria -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Colegiatura Ordinaria
                </div>
                <div class="cel-accordion-content">
                    <p style="margin-bottom: 1rem; font-weight: 600; color: #003d82;">Pago por derecho de Colegiatura Incluye:</p>
                    <ul class="cel-list-check">
                        <li>Diploma</li>
                        <li>Portadiploma en biocuero</li>
                        <li>Constancia de Habilitación</li>
                        <li>Resolución Carné Medalla</li>
                        <li>Solapero</li>
                        <li>Pago adelantado de 12 cuotas ordinarias</li>
                    </ul>
                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                        <p style="font-weight: 800; font-size: 1.2rem; color: #003d82;">TOTAL: S/. 1,870.00 soles</p>
                    </div>
                </div>
            </div>

            <!-- Promocion Colegiatura Joven -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Promoción Colegiatura Joven
                </div>
                <div class="cel-accordion-content">
                    <div style="background-color: #fef3c7; padding: 0.5rem; border-radius: 4px; margin-bottom: 1rem; font-size: 0.9rem; color: #92400e; font-weight: 600;">
                        Válido hasta un año después de la fecha de su título profesional
                    </div>
                    <p style="margin-bottom: 1rem; font-weight: 600; color: #003d82;">Pago por derecho de Colegiatura Incluye:</p>
                    <ul class="cel-list-check">
                        <li>Diploma</li>
                        <li>Portadiploma en biocuero</li>
                        <li>Constancia de Habilitación</li>
                        <li>Resolución Carné Medalla</li>
                        <li>Solapero</li>
                        <li>Pago adelantado de 12 cuotas ordinarias</li>
                    </ul>
                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                        <p style="font-weight: 800; font-size: 1.2rem; color: #003d82;">TOTAL: S/. 1,270.00 soles</p>
                    </div>
                </div>
            </div>
            
            <!-- Extraordinaria -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Colegiatura Extraordinaria
                </div>
                <div class="cel-accordion-content">
                    <p style="margin-bottom: 1rem; font-weight: 600; color: #003d82;">Pago por derecho de Colegiatura Incluye:</p>
                    <ul class="cel-list-check">
                        <li>Diploma</li>
                        <li>Portadiploma en biocuero</li>
                        <li>Constancia de Habilitación</li>
                        <li>Resolución</li>
                        <li>Carné</li>
                        <li>Medalla</li>
                        <li>Solapero</li>
                        <li>Pago adelantado de 12 cuotas ordinarias</li>
                    </ul>
                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                        <p style="font-weight: 800; font-size: 1.2rem; color: #003d82;">TOTAL: S/. 2,500.00 soles</p>
                    </div>
                </div>
            </div>

            <!-- Extranjero -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Colegiatura Proveniente del Extranjero
                </div>
                <div class="cel-accordion-content">
                    <p style="margin-bottom: 1rem; font-weight: 600; color: #003d82;">Pago por derecho de Colegiatura Incluye:</p>
                    <ul class="cel-list-check">
                        <li>Diploma</li>
                        <li>Portadiploma en biocuero</li>
                        <li>Constancia de Habilitación</li>
                        <li>Resolución</li>
                        <li>Carné</li>
                        <li>Medalla</li>
                        <li>Solapero</li>
                        <li>Pago adelantado de 12 cuotas ordinarias</li>
                    </ul>
                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                        <p style="font-weight: 800; font-size: 1.2rem; color: #003d82;">TOTAL: S/. 1,970.00 soles</p>
                    </div>
                </div>
            </div>

            <!-- Modalidades -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Modalidades
                </div>
                <div class="cel-accordion-content">
                    <p>Las ceremonias de colegiatura se realizan bajo las siguientes modalidades:</p>
                    <ul class="cel-list-check" style="margin-top: 1rem;">
                        <li style="font-weight: 700;">📍 Presencial: Auditorio del CEL</li>
                        <li style="font-weight: 700;">💻 Virtual: Plataforma Zoom</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Requisitos y Beneficios Header -->
        <div class="cel-red-banner">
            REQUISITOS Y BENEFICIOS
        </div>

        <!-- Requisitos y Beneficios Accordions -->
        <div style="max-width: 900px; margin: 0 auto 5rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1.5rem; align-items: start;">
            
            <!-- Requisitos -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Requisitos
                </div>
                <div class="cel-accordion-content">
                    <ul class="cel-list-check">
                        <li>Solicitud de Incorporación</li>
                        <li>Ficha Personal con foto tamaño carné a color en fondo blanco (Grabada en el archivo)</li>
                        <li>Compromiso de Honor</li>
                        <li>Declaración Jurada</li>
                        <li>Copia legalizada del Título por la Secretaria de la Universidad de procedencia o la SUNEDU (ambos lados tamaño A4)</li>
                        <li>Copia simple del Bachiller (ambos lados)</li>
                        <li>Copia simple del DNI (ambos lados)</li>
                        <li>Voucher de pago por derecho de colegiatura</li>
                    </ul>
                </div>
            </div>

            <!-- Beneficios -->
            <div class="cel-accordion">
                <div class="cel-accordion-header" onclick="this.nextElementSibling.classList.toggle('active')">
                    Beneficios
                </div>
                <div class="cel-accordion-content">
                    <ul class="cel-list-check">
                        <li>Sorteo de Becas Integrales</li>
                        <li>Certificaciones de Capacitación Gratuita</li>
                        <li>Centro Recreacional</li>
                        <li>Foros de alto contenido de valor</li>
                        <li>Convenios Institucionales</li>
                        <li>Bolsa de Trabajo</li>
                        <li>Capacitaciones Especializadas</li>
                        <li>Asesoría Laboral Gratuita</li>
                        <li>Networking y mucho más</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Action Buttons - Centered Section -->
        <div style="text-align: center; margin: 2rem auto 4rem; max-width: 700px;">
            <div style="display: flex; gap: 2rem; justify-content: center; align-items: center;">
                <a href="https://drive.google.com/file/d/15t4XAn3gIpwJ2EwmXxBllNUB_HRk0RK9/view?usp=sharing" target="_blank" class="cel-btn-yellow" style="min-width: 280px; padding: 1.2rem 2rem; font-size: 0.9rem; text-align: center;">
                    📥 DESCARGA AQUÍ LA SOLICITUD Y FICHAS DE COLEGIATURA
                </a>
                <a href="{{ route('colegiatura.registro') }}" class="cel-btn-yellow" style="min-width: 200px; padding: 1.2rem 2.5rem; font-size: 1rem; text-align: center;">
                    ✍️ REGÍSTRATE AQUÍ
                </a>
            </div>
        </div>

        <!-- Videos Section -->
        <div style="max-width: 1000px; margin: 0 auto 3rem;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
                <!-- Video 1 -->
                <div class="cel-video-card" style="border: 4px solid #9ca3af; border-radius: 20px; overflow: hidden;">
                    <a href="https://www.cel.org.pe/Colegiaturas-CEL?wvideo=wylqno9tr2" target="_blank" style="text-decoration: none; display: block;">
                        <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160927626/settings_images/0d75625-18f4-77d-25af-f1847843f5_PORTADA_DE_VIDEOS-01.jpg" alt="Video testimonios" style="width: 100%; height: auto; display: block;">
                    </a>
                </div>
                <!-- Video 2 -->
                <div class="cel-video-card" style="border: 4px solid #9ca3af; border-radius: 20px; overflow: hidden;">
                    <a href="https://www.cel.org.pe/Colegiaturas-CEL?wvideo=21v6kphmiu" target="_blank" style="text-decoration: none; display: block;">
                        <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160927626/settings_images/8308ff-1a74-742-821b-0d8bfa6d7e6a_PORTADA_DE_VIDEOS-02.jpg" alt="¿Por qué colegiarte en el CEL?" style="width: 100%; height: auto; display: block;">
                    </a>
                </div>
            </div>
            
            <!-- Video 3 (Centered) -->
            <div class="cel-video-card" style="max-width: 600px; margin: 0 auto; border: 4px solid #9ca3af; border-radius: 20px; overflow: hidden;">
                <a href="https://www.cel.org.pe/Colegiaturas-CEL?wvideo=ezivr1xilm" target="_blank" style="text-decoration: none; display: block;">
                    <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160927626/settings_images/7eef3e4-3855-015a-8b65-d63fb7051a6e_PORTADA_DE_VIDEOS-03.jpg" alt="Video testimonios de colegiados" style="width: 100%; height: auto; display: block;">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
