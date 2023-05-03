
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php

        use \App\Http\Controllers\AccessoriesController;
        ?>
        Creating roomaccessories for room: {{ $room->name }}

        <form action="{{ isset($roomaccessories) ? route('admin.roomaccessories.update', ['room_id' => $room->id, 'id' => $roomaccessories->id]) : route('admin.roomaccessories.store', ['room_id' => $room->id]) }}" method="post">
            @csrf
            @isset($roomaccessories)
            @method('patch')
            @endisset

            <div class="form-group">

                <?php
                $allAccessories = AccessoriesController::getAllAccessories($room->id);
                ?>




                <div class="form-group">
                    <label for="accessories_id">Accessories:</label>
                    <select name="accessories_id" id="accessories_id" class="form-control">
                        @foreach($allAccessories as $accessories)
                        <option value="{{ $accessories->id }}" {{ isset($roomaccessories) && $roomaccessories->accessories()->id == $accessories->id ? 'selected' : '' }}>{{ $accessories->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <input type="hidden" name="room_id" value="{{ $room->id }}" />
            <button type="submit">{{ isset($roomaccessories) ? 'Save' : 'Create' }}</button>
        </form>

    </body>
</html>