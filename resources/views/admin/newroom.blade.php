
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style>
            .pl2{
                padding-left: 20px;
            }
            .mt1{
                margin-top: 10px;
            }
            .mb1{
                margin-bottom: 10px;
            }
            .pt1{
                padding-top: 10px;
            }
            .pt2{
                padding-top: 20px;
            }
            .pb1{
                padding-top: 10px;
            }
            .pb2{
                padding-bottom: 20px;
            }
        </style>
        <div class="pl2">

            <div class="pt1 pb2">
                <a href="{{ route('admin.rooms.back', ['apartment_id' => $apartment->id]) }}">Go back to previous page</a>
            </div>
            <div class="pb2">
                Creating room for apartment: {{ $apartment->name }}
            </div>

            <div class="pt1 pb2">
                <form action="{{ isset($room) ? route('admin.rooms.update', ['apartment_id' => $apartment->id, 'id' => $room->id]) : route('admin.rooms.store', ['apartment_id' => $apartment->id]) }}" method="post">
                    @csrf
                    @isset($room)
                    @method('patch')
                    @endisset
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $room->name ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="internalName">Internal name:</label>
                        <input type="text" name="internalName" id="internalName" value="{{ $room->internalName ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <input type="text" name="size" id="size" value="{{ $room->size ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Room Type:</label>
                        <select name="type" id="type" class="form-control">
                            @foreach (App\Commons\RoomType::all() as $value => $label)
                            <option value="{{ $label }}" {{ isset($room) && $room->roomType == $label ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}" />
                    <button class="mb1 mt1" type="submit">{{ isset($room) ? 'Save' : 'Create' }}</button>
                </form>
            </div>


            @isset($room)
            <div class="pt2 pb2 mt1 mb1">

                <p>Add new bed: <span><a href="{{ route('admin.beds.new', ['apartment_id' => $apartment->id, 'room_id' => $room->id]) }}">Add new bed</a></span></p>
                List of beds:
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($room->beds as $bed)
                        <tr>
                            <td>
                                <a href="{{ route('admin.beds.edit', ['apartment_id' => $apartment->id, 'room_id'=>$room->id, 'id' => $bed->id]) }}">Edit</a>
                            </td>
                            <td>{{ $bed->id }}</td>
                            <td>{{ $bed->name }}</td>
                            <td>
                                <form action="{{ route('admin.beds.delete', ['room_id' => $room->id, 'id' => $bed->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pt2 pb2 mt1 mb1">

                <p>Add new bathroom: <span><a href="{{ route('admin.bathrooms.new', ['room_id' => $room->id]) }}">Add new bathroom</a></span></p>
                List of Bathrooms:
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($room->bathroom as $bathroom)
                        <tr>
                            <td>
                                <a href="{{ route('admin.bathrooms.edit', ['room_id'=>$room->id, 'id' => $bathroom->id]) }}">Edit</a>
                            </td>
                            <td>{{ $bathroom->id }}</td>
                            <td>{{ $bathroom->name }}</td>
                            <td>{{ $bathroom->size }}</td>
                            <td>{{ $bathroom->bathroomPosition }}</td>
                            <td>{{ $bathroom->note }}</td>
                            <td>
                                <form action="{{ route('admin.bathrooms.delete', ['room_id' => $room->id, 'id' => $bathroom->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pt2 pb2 mt1 mb1">


                <p>Add new roomaccessories: <span><a href="{{ route('admin.roomaccessories.new', ['room_id' => $room->id]) }}">Add new roomaccessories</a></span></p>
                List of Accessories:
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($room->roomaccessories as $roomaccessorie)
                        <tr>
                            <td>
                                <a href="{{ route('admin.roomaccessories.edit', ['room_id'=>$room->id, 'id' => $roomaccessorie->id]) }}">Edit</a>
                            </td>
                            <td>{{ $roomaccessorie->id }}</td>
                            <td>{{ $roomaccessorie->accessories->name }}</td>
                            <td>{{ $roomaccessorie->accessories->popular }}</td>
                            <td>
                                <form action="{{ route('admin.roomaccessories.delete', ['room_id'=>$room->id, 'id' => $roomaccessorie->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




            @endisset

        </div>
    </body>
</html>