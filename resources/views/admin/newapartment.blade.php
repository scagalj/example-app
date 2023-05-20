<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        @include('/layouts/header')
    </head>
    <body>

        <style>

            #newApartmentForm *{
                padding: 5px;
            }

            .button{
                width: 150px;
                height: 50px;
                font-size: 20pt;

            }

        </style>

        <?php

        use \App\Http\Controllers\ApartmentController;
        ?>

        <div>
            <a href="{{ route('admin.apartments.back', ['house_id' => $house->id]) }}">Go back</a>
        </div>


        <div>
            {{ session('succesfulMessage'); }}
        </div>


        <div>
            <form id="newApartmentForm" action="{{ isset($apartment) ? route('admin.apartments.update', ['house_id' => $house->id, 'id' => $apartment->id]) : route('admin.apartments.store', ['house_id' => $house->id]) }}" method="post">
                @csrf
                @isset($apartment)
                @method('patch')
                @endisset

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $apartment->name ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="internalName">Internal name:</label>
                    <input type="text" id="internalName" name="internalName" value="{{ $apartment->internalName ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="sze">Size:</label>
                    <input type="text" id="size" name="size" value="{{ $apartment->size ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="note">Note:</label>
                    <input type="text" id="note" name="note" value="{{ $apartment->note ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="type">Apartment Type:</label>
                    <select name="type" id="type" class="form-control">
                        @foreach (App\Commons\ApartmentType::all() as $value => $label)
                        <option value="{{ $label }}" {{ isset($apartment) && $apartment->apartmentType == $label ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                @isset($apartment)
                @include('/language/transatablefields', ['fieldName' => 'description', 'fieldObject' => $apartment])
                @endisset

                <button class="button" type="submit">{{ isset($apartment) ? 'Save' : 'Create' }}</button>
            </form>
        </div>

        @isset($apartment)

        <br/>
        <br/>
        Upload images:

        <form action="{{ route('admin.apartments.uploadimage', ['house_id' => $house->id, 'apartment_id' => $apartment->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description">
            </div>

            <div class="form-group">
                <label for="mainimage">Main image:</label>
                <input type="checkbox" name="mainimage" id="mainimage">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </form>

        <br/>

        Images:




        <div class="entity-details">
            <?php
            $otherImages = $apartment->getOtherImages();
            ?>
            @foreach($otherImages as $image)
            <img src="{{$apartment->getImagesPath() . $image->filename}}" title="{{$image->description}}" alt="{{ $image->name }}" width="100" height="100" style="padding: 10px;">
            <span>is{{$image->mainimage}}</span>
            <form action="{{ route('admin.apartments.deleteimage', ['apartment_id'=>$apartment->id, 'image_id' => $image->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit">Delete</button>
            </form>                
            @endforeach

        </div>

        <br/>
        <br/>
        <?php
        $mainImage = $apartment->getMainImage()
        ?>
        @isset($mainImage)
        <img src="{{$apartment->getImagesPath() . $mainImage->filename}}" title="{{$mainImage->description}}" alt="{{ $mainImage->name }}" width="100" height="100" style="padding: 10px;">
        <span>is{{$mainImage->mainimage}}</span>
        <form action="{{ route('admin.apartments.deleteimage', ['apartment_id'=>$apartment->id, 'image_id' => $mainImage->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <button type="submit">Delete</button>
        </form> 
        @endisset

        <br/>
        <br/>



        <p>Create new room: <span><a href="{{ route('admin.rooms.new', ['apartment_id' => $apartment->id]) }}">New room</a></span></p>

        List of rooms:


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apartment->room as $room)
                <tr>
                    <td>
                        <a href="{{ route('admin.rooms.edit', ['apartment_id' => $apartment->id, 'id' => $room->id]) }}">Edit</a>
                    </td>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>
                        <form action="{{ route('admin.rooms.delete', ['apartment_id' => $apartment->id, 'id' => $room->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <button type="submit">Delete</button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <br/>
        <br/>

        <h3>Prices:</h3>


        <table>
            <thead>
                <tr>
                    <th>From date</th>
                    <th>To date</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apartment->apartmentPrices as $price)
                <tr>
                    <form action="{{ route('admin.apartments.updateprice', ['apartment_id' => $apartment->id, 'id' => $price->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <td><button type="submit">Update</button></td>
                        <td><input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off"  data-provide="datepicker" id="fromDate" name="fromDate" value="{{ \Carbon\Carbon::parse($price->fromDate)->format('d.m.Y') }}" required="true"></td>
                        <td><input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off"  data-provide="datepicker" id="toDate" name="toDate" value="{{ \Carbon\Carbon::parse($price->toDate)->format('d.m.Y') }}" required="true"></td>
                        <td><input type="number" step="any"  name="price" id="price" class="form-control" value="{{ $price->price }}" required="true"/></td>
                    </form> 
                <td>
                    <form action="{{ route('admin.apartments.deleteprice', ['apartment_id' => $apartment->id, 'id' => $price->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit">Delete</button>
                    </form> 
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form action="{{ route('admin.apartments.addprice', ['house_id'=>$apartment->house->id, 'id'=>$apartment->id] ) }}" method="post" enctype="multipart/form-data">
    @csrf


    <div class="input-date">
        <span>From date:</span>
        <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off"  data-provide="datepicker" id="fromDate" name="fromDate" value="" required="true">
    </div>
    <div class="input-date">
        <span>To date:</span>
        <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off" data-provide="datepicker" id="toDate" name="toDate" value="" required="true">
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="any"  name="price" id="price" class="form-control" required="true"/>
    </div>


    <div class=" uppercase input-date">
        <button type="submit" class="makeRequestBtn uppercase">Add price</button>
    </div>
</form> 


@endisset


<div class="panel-body">
</div>

<script>
    $(document).ready(function () {
        $(".date-pickers").datepicker.defaults.format = 'dd.mm.yyyy';
    });
</script>

</body>
</html>
