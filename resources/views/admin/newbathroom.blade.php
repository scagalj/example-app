
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        Creating bathroom for room: {{ $room->name }}
        
        <form action="{{ isset($bathroom) ? route('admin.bathrooms.update', ['room_id' => $room->id, 'id' => $bathroom->id]) : route('admin.bathrooms.store', ['room_id' => $room->id]) }}" method="post">
            @csrf
            @isset($bathroom)
            @method('patch')
            @endisset
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $bathroom->name ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" name="size" id="size" value="{{ $bathroom->size ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="bathroomPosition">Bathroom position:</label>
                <input type="text" name="bathroomPosition" id="bathroomPosition" value="{{ $bathroom->bathroomPosition ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <input type="text" name="note" id="note" value="{{ $bathroom->note ?? '' }}" class="form-control">
            </div>
            

            <input type="hidden" name="room_id" value="{{ $room->id }}" />
            <button type="submit">{{ isset($bathroom) ? 'Save' : 'Create' }}</button>
        </form>

    </body>
</html>