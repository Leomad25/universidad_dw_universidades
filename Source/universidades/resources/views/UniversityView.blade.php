<!DOCTYPE html>
<html>
<head>
    <title>Lista de Universidades</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/universityList.css') }}">
</head>
<body>
    <h1>Lista de Universidades</h1>
    <!-- Crear -->
    <div>
        <a href="{{ url('/createUniversity') }}">Añadir universidad</a>
    </div>

    <div class="university-title">
    @if ($universites->isEmpty())
        <h2>No hay universidades registradas.</h2>
    @else
        <h2>Listado de universidades</h2>
        <ul id="university-list" class="university-list"></ul>
    @endif
    </div>

    <footer>
        <script src="{{ asset('js/universityData.js') }}"></script>
        <script>
            const universityData = {!!$universites!!};
            onInit_university('university-list', universityData);
        </script>
    </footer>
</body>
</html>