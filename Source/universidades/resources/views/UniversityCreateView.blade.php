<!DOCTYPE html>
<html>
<head>
    <title>Lista de Universidades</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <!-- Style of datapicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <h1>Crear de Universidades</h1>
    <!-- Formulario -->
    <div>
        <form method="POST" action="{{ url('/createUniversity') }}">
            @csrf

            <!-- Campo Nit -->
            <div class="form-input">
                <label for="nit">NIT:</label>
                <input autocomplete="off" type="text" name="nit" id="nit" required>
            </div>

            <!-- Campo Name -->
            <div class="form-input">
                <label for="name">Nombre:</label>
                <input autocomplete="off" type="text" name="name" id="name" required>
            </div>

            <!-- Campo Address -->
            <div class="form-input">
                <label for="address">Direccion:</label>
                <input autocomplete="off" type="text" name="address" id="address" required>
            </div>

            <!-- Campo eMail -->
            <div class="form-input">
                <label for="email">e-Mail:</label>
                <input autocomplete="off" type="email" name="email" id="email" required>
            </div>

            <!-- Campo Date -->
            <div class="form-input">
                <label for="date">Fecha:</label>
                <input autocomplete="off" type="text" name="date" id="date" required data-flatpickr>
            </div>

            <!-- Campo Phone -->
            <div class="form-input">
                <label for="phone">Telefono:</label>
                <input autocomplete="off" type="tel" name="phone" id="phone" required>
            </div>

            <!-- Campo Max_rooms -->
            <div class="form-input">
                <label for="max_rooms">Salones Maximos:</label>
                <input autocomplete="off" type="text" name="max_rooms" id="max_rooms" required>
            </div>

            <!-- Botton submmit -->
            <button class="btn raised-button" type="submit">Crear</button>
        </form>
    </div>
    <!-- Panel de botones -->
    <div style="margin: 10px;">
        <a href="{{ url('/') }}">Regresar al home</a>
    </div>
    <!-- Pie de pagina -->
    <footer>
        <script src="{{ asset('js/formsAnimations.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>flatpickr("#date");</script>
    </footer>
</body>
</html>