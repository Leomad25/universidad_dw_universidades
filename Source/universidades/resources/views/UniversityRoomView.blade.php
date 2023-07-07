<!DOCTYPE html>
<html>
<head>
    <title>Lista de Universidades</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>
<body>
    @if ($university->isEmpty())
        <h1>Universidad no encontrada</h1>
    @else
        <h1>Universidad {{ $university[0]->name }} ({{ $university[0]->nit }})</h1>
        <!-- Panel de botones -->
        <div style="margin-bottom: 10px;">
            <a href="{{ url('/') }}">Regresar al home</a>
        </div>
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
        <!-- Listado -->
        <div>
            @if ($rooms->isEmpty())
                <h2>No hay salones</h2>
            @else
                <ul id="rooms-list">
                    @foreach ($rooms as $room)
                        <li>{{$room->id}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
    <footer>
        <script src="{{ asset('js/insertSubCategories.js') }}"></script>
        <script>
            const subcategorydata = {!!$subCategories!!};
            onInit_subCategory('category_id', 'sub_category_id', subcategorydata);
        </script>
        <script src="{{ asset('js/roomData.js') }}"></script>
        <script>
            const roomsdata = {!!$rooms!!};
            onInit_rooms('rooms-list', roomsdata);
        </script>
    </footer>
</body>
</html>