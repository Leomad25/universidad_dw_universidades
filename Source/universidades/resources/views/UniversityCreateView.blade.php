<!DOCTYPE html>
<html>
<head>
    <title>Lista de Universidades</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <!-- Style of datapicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    @if (!boolval($isUpdate))
        <h1>Crear Universidad</h1>
    @else
        <h1>Actualizar Universidad</h1>
    @endif

    <!-- Panel de botones -->
    <div style="margin: 10px;">
        <a href="{{ url('/') }}">Regresar al home</a>
    </div>

    <!-- Formulario -->
    <div>
        <form method="POST" action="{{ isset($university) ? route('createUniversityPut', ['id' => $university->id]) : route('createUniversityPost') }}">
            @csrf
            
            @if (isset($university))
                @method('PUT')
            @endif

            <!-- Campo Nit -->
            <div class="form-input">
                <label for="nit">NIT:</label>
                <input autocomplete="off" type="text" name="nit" id="nit">
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                </div>
            </div>

            <!-- Campo Name -->
            <div class="form-input">
                <label for="name">Nombre:</label>
                <input autocomplete="off" type="text" name="name" id="name">
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                </div>
            </div>

            <!-- Campo Address -->
            <div class="form-input">
                <label for="address">Direccion:</label>
                <input autocomplete="off" type="text" name="address" id="address">
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                </div>
            </div>

            <!-- Campo eMail -->
            <div class="form-input">
                <label for="email">e-Mail:</label>
                <input autocomplete="off" type="text" name="email" id="email">
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                    <p>El correo es invalido</p>
                </div>
            </div>

            <!-- Campo Date -->
            <div class="form-input">
                <label for="date">Fecha:</label>
                <input autocomplete="off" type="text" name="date" id="date" data-flatpickr>
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                </div>
            </div>

            <!-- Campo Phone -->
            <div class="form-input">
                <label for="phone">Telefono:</label>
                <input autocomplete="off" type="tel" name="phone" id="phone">
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                    <p>El telefono es invalido</p>
                </div>
            </div>

            <!-- Campo Max_rooms -->
            <div class="form-input">
                <label for="max_rooms">Salones Maximos:</label>
                <input autocomplete="off" type="text" name="max_rooms" id="max_rooms">
                <div class="form-input-error">
                    <p>Este dato es requerido</p>
                    <p>El max de salones es invalido</p>
                </div>
            </div>

            <!-- Botton submmit -->
            @if (!boolval($isUpdate))
                <button id="form-btn-create" class="btn raised-button" type="submit" disabled>Crear</button>
            @else
                <button id="form-btn-update" class="btn raised-button" type="submit" disabled>Actualizar</button>
            @endif
        </form>
    </div>
    
    <!-- Pie de pagina -->
    <footer>
        <script src="{{ asset('js/formsAnimations.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>flatpickr("#date");</script>
        @if (boolval($isUpdate))
            <script src="{{ asset('js/loadUnivesity.js') }}"></script>
            <script>
                const predata = {!!$university!!};
                preLoadInfo(predata);
            </script>
        @endif
    </footer>
</body>
</html>