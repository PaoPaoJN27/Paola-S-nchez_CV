<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cv['name'] }} - CV</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- FontAwesome (Íconos Locales) -->
    <link rel="stylesheet" href="{{ asset('frontawesome/css/all.min.css') }}">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">

    <!-- AOS (Animaciones Locales) -->
    <link rel="stylesheet" href="{{ asset('aos/aos.css') }}">
</head>
<body class="dark-mode">
<button id="toggleDarkMode" class="btn btn-light rounded-circle shadow toggle-mode-btn">
  <i class="fas fa-moon"></i>
</button>

<button class="btn btn-light d-md-none shadow" id="togglePanel"
        style="z-index: 1100; position: fixed; top: 8px; left: 8px; padding: 8px 10px;">
        <i class="fas fa-bars fa-lg"></i>
    </button>

<div class="container-fluid px-0">
    <div class="row g-0">
        <!-- Panel izquierdo sticky -->
        <div class="col-12 col-md-4">
            <div class="left-panel text-white p-4">
                <div class="profile-section text-center mb-4">
                    <img src="{{ asset('img/cv.jpg') }}" alt="Foto de {{ $cv['name'] }}" class="profile-img img-fluid rounded-circle mb-2">
                    <h2 class="fw-bold">{{ $cv['name'] }}</h2>
                    <h5 class="text-light">{{ $cv['title'] }}</h5>
                </div>

                <div class="info-section mb-4">
                    <h4><i class="fas fa-user-circle icon"></i> Información Personal</h4>
                    <p><i class="fas fa-map-marker-alt icon"></i> {{ $cv['contact']['location'] }}</p>
                    <p><i class="fas fa-envelope icon"></i> <a href="mailto:{{ $cv['contact']['email'] }}" class="text-white">{{ $cv['contact']['email'] }}</a></p>
                    <p><i class="fab fa-github icon"></i> <a href="{{ $cv['contact']['github'] }}" target="_blank" class="text-white">GitHub</a></p>
                    <p><i class="fab fa-linkedin icon"></i> <a href="{{ $cv['contact']['linkedin'] }}" target="_blank" class="text-white">LinkedIn</a></p>
                </div>

                <div class="info-section">
                    <h4><i class="fas fa-user-check"></i> Habilidades Personales</h4>
                    <ul>
                        @foreach ($cv['soft_skills'] as $soft_skill)
                            <li>{{ $soft_skill }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="info-section mt-4">
    <h4><i class="fas fa-language"></i> Idiomas</h4>
    <ul>
        @foreach ($cv['languages'] as $lang)
            <li>{{ $lang }}</li>
        @endforeach
    </ul>
</div>

            </div>
        </div>

            <!-- LADO DERECHO -->
<div class="col-12 col-md-8 right-panel p-4">

<div class="section mb-4" data-aos="fade-right">
    <h3><i class="fas fa-user"></i> Sobre Mí</h3>
    <p>{{ $cv['about'] }}</p>
</div>

<div class="section mb-4" data-aos="fade-left">
    <h3><i class="fas fa-graduation-cap"></i> Formación Académica</h3>
    @foreach ($cv['education'] as $edu)
        <p><strong>{{ $edu['degree'] }}</strong> ({{ $edu['year'] }})<br>{{ $edu['institution'] }}</p>
    @endforeach
</div>

<div class="section mb-4" data-aos="fade-up">
    <h3><i class="fas fa-book-open"></i> Cursos</h3>
    <ul>
        @foreach ($cv['courses'] as $course)
            <li>
                <strong>{{ $course['title'] }}</strong><br>
                <em>{{ $course['issuer'] }}</em>
            </li>
        @endforeach
    </ul>
</div>

@if (!empty($cv['diplomas']))
<div class="section mb-4" data-aos="fade-up">
    <h3><i class="fas fa-award"></i> Diplomas</h3>
    @foreach ($cv['diplomas'] as $diploma)
        <p><strong>{{ $diploma['title'] }}</strong> ({{ $diploma['year'] }})<br>
        <em>{{ $diploma['issuer'] }}</em></p>
        @if (is_array($diploma['description']))
            <ul>
                @foreach ($diploma['description'] as $point)
                    <li>{{ $point }}</li>
                @endforeach
            </ul>
        @endif
    @endforeach
</div>
@endif

<div class="section mb-4" data-aos="fade-left">
    <h3><i class="fas fa-briefcase"></i> Experiencia Profesional</h3>
    @foreach ($cv['experience'] as $exp)
        <p><strong>{{ $exp['title'] }}</strong><br><em>{{ $exp['company'] }}</em></p>
        @if (is_array($exp['description']))
            <ul>
                @foreach ($exp['description'] as $point)
                    <li>{{ $point }}</li>
                @endforeach
            </ul>
        @else
            <p>{{ $exp['description'] }}</p>
        @endif
    @endforeach
</div>

<div class="section mb-4" data-aos="fade-right">
    <h3><i class="fas fa-code"></i> Habilidades Técnicas</h3>
    <div class="row">
        @foreach ($cv['skills'] as $category => $skills)
            <div class="col-12 col-md-6">
                <h5 class="fw-bold">{{ $category }}</h5>
                <ul>
                    @foreach ($skills as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>

@if (!empty($cv['projects']))
<div class="section mb-4" data-aos="zoom-in">
    <h3><i class="fas fa-folder-open"></i> Proyectos</h3>
    @foreach ($cv['projects'] as $project)
        <div class="mb-4">
            <div class="d-flex justify-content-between">
                <strong>{{ $project['title'] }}</strong>
                <span>{{ $project['year'] }}</span>
            </div>
            <em>{{ $project['role'] }}</em>
            @if (is_array($project['description']))
                <ul>
                    @foreach ($project['description'] as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            @else
                <p>{{ $project['description'] }}</p>
            @endif
        </div>
    @endforeach
</div>
@endif

<div class="text-center mt-4">
    <a href="https://tuportafolio.com" target="_blank" class="btn btn-outline-light">
        <i class="fas fa-briefcase"></i> Ver Portafolio Completo
    </a>
</div>
<div class="text-center mt-4">
<a href="{{ asset('cv/Paola Sánchez Atilano-CV.pdf') }}" class="btn btn-primary" download>
    <i class="fas fa-file-pdf"></i> Descargar CV en PDF (Diseño Profesional)
</a>
</div>
</div>


        </div>
        <button id="scrollToTopBtn" class="btn btn-primary rounded-circle" style="position: fixed; bottom: 30px; right: 30px; display: none; z-index: 999;">
    <i class="fas fa-arrow-up"></i>
</button>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-out',
            once: true
        });
    </script>
    <script src="{{ asset('js/script.js') }}">
    
</script>
<script>
    const panel = document.querySelector('.left-panel');
    const toggle = document.getElementById('togglePanel');

    toggle.addEventListener('click', () => {
        panel.classList.toggle('show-on-mobile');
    });
</script>
<script>
    const toggleDarkModeBtn = document.getElementById('toggleDarkMode');
    const icon = toggleDarkModeBtn.querySelector('i');

    // Revisar preferencia guardada
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
        icon.classList.replace('fa-moon', 'fa-sun');
    }

    toggleDarkModeBtn.addEventListener('click', () => {
        const isDark = document.body.classList.toggle('dark-mode');
        icon.classList.toggle('fa-sun');
        icon.classList.toggle('fa-moon');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
</script>

</body>
</html>
