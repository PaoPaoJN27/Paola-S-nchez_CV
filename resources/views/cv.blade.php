<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cv['name'] }} - CV</title>
    
    {{-- Bootstrap desde archivos locales --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    
    {{-- FontAwesome para íconos (sigue cargándolo online para evitar descargas adicionales) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    {{-- Estilos personalizados --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- AOS (Animate On Scroll) para animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

</head>
<body>

<div class="container mt-5">
    <div class="profile-header text-center" data-aos="fade-right">
        <img src="{{ asset('img/cv.jpg') }}" alt="Foto de {{ $cv['name'] }}" class="profile-img">
        <h1 class="fw-bold">{{ $cv['name'] }}</h1>
        <h4>{{ $cv['title'] }}</h4>
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-user"></i> Sobre Mí</h3>
        <p>{{ $cv['about'] }}</p>
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-user-circle icon"></i> Contacto</h3>
        <ul class="list-unstyled">
            <li><i class="fas fa-envelope icon"></i> Email: <a href="mailto:{{ $cv['contact']['email'] }}">{{ $cv['contact']['email'] }}</a></li>
            <li><i class="fas fa-map-marker-alt icon"></i> Ubicación: {{ $cv['contact']['location'] }}</li>
            <li><i class="fab fa-github icon"></i> <a href="{{ $cv['contact']['github'] }}" target="_blank">GitHub</a></li>
            <li><i class="fab fa-linkedin icon"></i> <a href="{{ $cv['contact']['linkedin'] }}" target="_blank">LinkedIn</a></li>
        </ul>
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-graduation-cap"></i> Formación Académica</h3>
        @foreach ($cv['education'] as $edu)
            <p><strong>{{ $edu['degree'] }}</strong> ({{ $edu['year'] }})<br>{{ $edu['institution'] }}</p>
        @endforeach
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-book-open"></i> Cursos y Certificaciones</h3>
        <ul>
            @foreach ($cv['courses'] as $course)
                <li>{{ $course }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-briefcase"></i> Experiencia Profesional</h3>
        @foreach ($cv['experience'] as $exp)
            <p><strong>{{ $exp['title'] }}</strong> <br><em>{{ $exp['company'] }}</em></p>
            <p>{{ $exp['description'] }}</p>
        @endforeach
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-code icon"></i> Habilidades Técnicas</h3>
        <div class="row">
            @foreach ($cv['skills'] as $category => $skills)
                <div class="col-md-4">
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

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-user-check"></i> Habilidades Personales</h3>
        <ul>
            @foreach ($cv['soft_skills'] as $soft_skill)
                <li>{{ $soft_skill }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section" data-aos="fade-right">
        <h3><i class="fas fa-folder-open icon"></i> Proyectos</h3>
        @foreach ($cv['projects'] as $project)
            <div class="p-3 border rounded mb-3">
                <h4 class="fw-bold">{{ $project['title'] }}</h4>
                <p><strong>Rol:</strong> {{ $project['role'] }}</p>
                <p>{{ $project['description'] }}</p>
                <a href="{{ $project['link'] }}" target="_blank" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Ver proyecto</a>
            </div>
        @endforeach
    </div>

    <div class="text-center" data-aos="fade-right">
        <a href="#" class="btn btn-custom"><i class="fas fa-download"></i> Descargar CV en PDF</a>
    </div>
</div>

    <!-- Script de AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Duración de la animación en milisegundos
            easing: 'ease-out', // Tipo de animación
            once: true // La animación solo ocurre una vez
        });
    </script>

</body>
</html>
