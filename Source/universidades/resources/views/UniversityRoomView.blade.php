<!DOCTYPE html>
<html>
<head>
    <title>Lista de Universidades</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomList.css') }}">
</head>
<body>
    @if ($university->isEmpty())
        <h1>Universidad no encontrada</h1>
    @else
        <h1 style="padding-bottom: 0px !important;">Universidad</h1>
        <h1 style="padding-top: 0px !important;">{{ $university[0]->name }} ({{ $university[0]->nit }})</h1>
        <!-- Panel de botones -->
        <div style="margin-bottom: 10px;">
            <a href="{{ url('/') }}">Regresar al home</a>
        </div>

        @if (intval($university[0]->max_rooms) > count($rooms))
        <!-- Formulario de agregar Rooms -->
        <div class="form">
            <h2>Agregar salon</h2>
            <form method="POST" action="{{ route('createRoom') }}">
                @csrf

                <!-- Campo University_id -->
                <div class="form-input form-input-active">
                    <label for="university_id">Id universidad:</label>
                    <input type="text" name="university_id" id="university_id" value="{{ $university[0]->id }}" readonly>
                </div>

                <!-- Campo Category -->
                <div class="form-input form-input-active">
                    <label for="category_id">Categoría:</label>
                    <select name="category_id" id="category_id" require>
                        <option value="">- Selecciona una categoría -</option>
                        @if(!$categories->isEmpty())
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Campo SubCategory -->
                <div class="form-input form-input-active">
                    <label for="sub_category_id">SubCategoría:</label>
                    <select name="sub_category_id" id="sub_category_id" require></select>
                </div>
                
                <!-- Botones -->
                <button class="btn raised-button" type="submit">Agregar</button>
            </form>
        </div>
        @endif

        <!-- Listado -->
        <div id="rooms-list-container">
            @if ($rooms->isEmpty())
                <h2>No hay salones</h2>
            @else
                <h2>Salones de la universidad</h2>
                <ul id="rooms-list"></ul>
            @endif
        </div>
        <footer>
            <script>
                const subcategorydata = {!!$subCategories!!};
            </script>
            @if (intval($university[0]->max_rooms) > count($rooms))
                <script src="{{ asset('js/insertSubCategories.js') }}"></script>
                <script>
                    onInit_subCategory('category_id', 'sub_category_id', subcategorydata);
                </script>
            @endif
            <script src="{{ asset('js/roomData.js') }}"></script>
            <script>
                const categorydata = {!!$categories!!};
                const roomsdata = {!!$rooms!!};
                onInit_rooms('rooms-list', roomsdata, categorydata, subcategorydata);
            </script>
        </footer>
    @endif
</body>
</html>