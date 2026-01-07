<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Inscripción de Colegiaturas - Colegio de Economistas de Lima">
    <title>@yield('title', 'Colegiatura') - Colegio de Economistas de Lima</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Header removed as per user request -->
    <div style="height: 1rem;"></div>

    <!-- Main Content -->
    <main style="padding: 3rem 0; min-height: calc(100vh - 200px);">
        <div class="cel-container">
            @if(session('success'))
                <div class="cel-card fade-in" style="background: var(--color-success); color: white; margin-bottom: 2rem; padding: 1rem 1.5rem;">
                    <strong>✓ Éxito:</strong> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="cel-card fade-in" style="background: var(--color-error); color: white; margin-bottom: 2rem; padding: 1rem 1.5rem;">
                    <strong>✗ Error:</strong> {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="cel-footer">
        <div class="cel-footer-grid">
            <!-- Forma de Pago -->
            <div>
                <h4>FORMA DE PAGO:</h4>
                <p>BCP N° 193 - 9621984 - 0 - 55 / CCI N° 002 - 193 - 00962198405518</p>
                <div style="margin-top: 1rem; font-size: 0.8rem;">
                    <p>Enviar voucher de pago a:</p>
                    <a href="mailto:contacto@cel.org.pe" style="color: #374151; text-decoration: underline;">contacto@cel.org.pe</a>
                </div>
            </div>

            <!-- Horario -->
            <div>
                <h4>HORA DE ATENCIÓN:</h4>
                <p>Lunes a viernes de 9:00 a.m. a 1:00 p.m.</p>
                <p>y de 2:00 p.m. a 6:00 p.m.</p>
                
                <div class="cel-social-icons">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/colegiodeeconomistasdelima" target="_blank" class="cel-social-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/celeconomistas" target="_blank" class="cel-social-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@colegiodeeconomistasdelima" target="_blank" class="cel-social-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/company/colegio-de-economistas-de-lima" target="_blank" class="cel-social-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Mayor Informacion -->
            <div>
                <h4>MAYOR INFORMACIÓN:</h4>
                <p>Teléfono: (51-1) 440 - 2671</p>
                <p>Celular: 991 730 865 - 992 936 302</p>
                <p>E-mail: contacto@cel.org.pe</p>
            </div>
        </div>
    </footer>
</body>
</html>
