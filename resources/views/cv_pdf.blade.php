<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $cv['name'] }} - CV PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #ffffff;
            color: #333;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #2c3e50;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .section {
            background-color: #f5f5f5;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            page-break-inside: avoid;
        }

        h2, h3, h4 {
            margin-top: 0;
        }

        ul {
            padding-left: 20px;
        }

        .info {
            margin-bottom: 10px;
        }

        .project {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>{{ $cv['name'] }}</h2>
            <h4>{{ $cv['title'] }}</h4>
            <p>{{ $cv['contact']['location'] }} | {{ $cv['contact']['email'] }}</p>
        </div>

        <div class="section">
            <h3>Sobre Mí</h3>
            <p>{{ $cv['about'] }}</p>
        </div>

        <div class="section">
            <h3>Formación Académica</h3>
            @foreach ($cv['education'] as $edu)
                <p><strong>{{ $edu['degree'] }}</strong> ({{ $edu['year'] }})<br>{{ $edu['institution'] }}</p>
            @endforeach
        </div>

        <div class="section">
            <h3>Experiencia Profesional</h3>
            @foreach ($cv['experience'] as $exp)
                <p><strong>{{ $exp['title'] }}</strong><br><em>{{ $exp['company'] }}</em></p>
                <p>{{ $exp['description'] }}</p>
            @endforeach
        </div>

        <div class="section">
        <h3 style="border-bottom: 1px solid #999; padding-bottom: 4px;">Cursos</h3>
@foreach ($cv['courses'] as $course)
    <p style="margin-bottom: 10px;">
        <strong>{{ $course['title'] }}</strong><br>
        <em>{{ $course['issuer'] }}</em>
    </p>
@endforeach

        </div>

        <div class="section">
            <h3>Habilidades Técnicas</h3>
            @foreach ($cv['skills'] as $category => $skills)
                <h4>{{ $category }}</h4>
                <ul>
                    @foreach ($skills as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>

        <div class="section">
            <h3>Habilidades Personales</h3>
            <ul>
                @foreach ($cv['soft_skills'] as $soft_skill)
                    <li>{{ $soft_skill }}</li>
                @endforeach
            </ul>
        </div>

        <div class="section">
            <h3>Proyectos</h3>
            @foreach ($cv['projects'] as $project)
                <div class="project">
                    <h4>{{ $project['title'] }}</h4>
                    <p><strong>Rol:</strong> {{ $project['role'] }}</p>
                    <p>{{ $project['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>



