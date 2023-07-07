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

    @if ($universites->isEmpty())
        <p>No hay universidades registradas.</p>
    @else
        <ul id="university-list" class="university-list"></ul>
    @endif
    <footer>
        <script src="{{ asset('js/universityData.js') }}"></script>
        <script>
            const universityData = {!!$universites!!};
            onInit_university('university-list', universityData);
        </script>
    </footer>
</body>
</html>