
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        Creating bed for room: {{ $room->name }}
        
        <form action="{{ isset($bed) ? route('admin.beds.update', ['apartment_id' => $apartment->id, 'room_id' => $room->id, 'id' => $bed->id]) : route('admin.beds.store', ['apartment_id' => $apartment->id, 'room_id' => $room->id]) }}" method="post">
            @csrf
            @isset($bed)
            @method('patch')
            @endisset
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $bed->name ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" name="size" id="size" value="{{ $bed->size ?? '' }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="numberOfBeds">Number of beds:</label>
                <input type="number" name="numberOfBeds" id="numberOfBeds" value="{{ $bed->numberOfBeds ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Bed Type:</label>
                <select name="type" id="type" class="form-control">
                    @foreach (App\Commons\BedType::all() as $value => $label)
                    <option value="{{ $label }}" {{ isset($bed) && $bed->bedType == $label ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="room_id" value="{{ $room->id }}" />
            <button type="submit">{{ isset($bed) ? 'Save' : 'Create' }}</button>
        </form>

    </body>
</html>