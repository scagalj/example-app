
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        Creating amenities for House: {{ $house->name }}
        
        <form action="{{ isset($amenities) ? route('admin.amenities.update', ['house_id' => $house->id, 'id' => $amenities->id]) : route('admin.amenities.store', ['house_id' => $house->id]) }}" method="post">
            @csrf
            @isset($amenities)
            @method('patch')
            @endisset
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $amenities->name ?? '' }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="distance">Distance:</label>
                <input type="text" name="distance" id="distance" value="{{ $amenities->distance ?? '' }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="amenitiesType">Amenities type:</label>
                <select name="amenitiesType" id="amenitiesType" class="form-control">
                    @foreach (App\Commons\AmenitiesType::all() as $value => $label)
                    <option value="{{ $label }}" {{ isset($amenities) && $amenities->amenitiesType == $label ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="amenitiesSubType">Amenities sub type:</label>
                <select name="amenitiesSubType" id="amenitiesSubType" class="form-control">
                    @foreach (App\Commons\AmenitiesSubType::all() as $value => $label)
                    <option value="{{ $label }}" {{ isset($amenities) && $amenities->amenitiesSubType == $label ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div class="form-group">
                <label for="externalUrl">ExternalUrl:</label>
                <input type="text" name="externalUrl" id="externalUrl" value="{{ $amenities->externalUrl ?? '' }}" class="form-control">
            </div>
            
            <input type="hidden" name="house_id" value="{{ $house->id }}" />
            <button type="submit">{{ isset($amenities) ? 'Save' : 'Create' }}</button>
        </form>

    </body>
</html>