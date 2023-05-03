<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <style>
            .form-group{
                padding-bottom: 10px;
            }
        </style>
        
        new house test's

        {{ session('succesfulMessage'); }}


        <form action="{{ isset($house) ? route('admin.houses.update', ['id' => $house->id]) : route('admin.houses.store') }}" method="post">
            @csrf
            @isset($house)
            @method('patch')
            @endisset

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $house->name ?? '' }}">
            </div>

            <div class="form-group">
                <label for="internalName">Internal name:</label>
                <input type="text" id="internalName" name="internalName" value="{{ $house->internalName ?? '' }}">
            </div>

            <div class="form-group">
                <label for="note">Note:</label>
                <input type="text" id="note" name="note" value="{{ $house->note ?? '' }}">
            </div>
            
            <div class="form-group">
                <label for="checkInRule">Check in rule:</label>
                <input type="text" id="checkInRule" name="checkInRule" value="{{ $house->checkInRule ?? '' }}">
            </div>
            
            <div class="form-group">
                <label for="checkOutRule">Check out rule:</label>
                <input type="text" id="checkOutRule" name="checkOutRule" value="{{ $house->checkOutRule ?? '' }}">
            </div>
            
            <div class="form-group">
                <label for="quietHoursRule">Quiet hours rule:</label>
                <input type="text" id="quietHoursRule" name="quietHoursRule" value="{{ $house->quietHoursRule ?? '' }}">
            </div>
            
            <div class="form-group">
                <label for="extraBedPolicy">Extra bed policy:</label>
                <input type="text" id="extraBedPolicy" name="extraBedPolicy" value="{{ $house->extraBedPolicy ?? '' }}">
            </div>
            
            <div class="form-group">
                <label for="damagePolicy">Damage policy:</label>
                <input type="text" id="damagePolicy" name="damagePolicy" value="{{ $house->damagePolicy ?? '' }}">
            </div>
            
            <div class="form-group">
                <label for="smokingAllowed">Smoking allowed:</label>
                <input type="checkbox" name="smokingAllowed" id="smokingAllowed">
            </div>
            
            <div class="form-group">
                <label for="partiesAllowed">Parties allowed:</label>
                <input type="checkbox" name="partiesAllowed" id="partiesAllowed">
            </div>
            
            <div class="form-group">
                <label for="petsAllowed">Pets allowed:</label>
                <input type="checkbox" name="petsAllowed" id="petsAllowed">
            </div>


            <button type="submit">{{ isset($house) ? 'Save' : 'Create' }}</button>
        </form>

        @isset($house)




        <p>Create new apartment: <span><a href="{{ route('admin.apartments.new', ['house_id' => $house->id]) }}">New apartment</a></span></p>

        List of Apartments:


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($house->apartment as $apartment)
                <tr>
                    <td>
                        <a href="{{ route('admin.apartments.edit', ['house_id' => $house->id, 'id' => $apartment->id]) }}">Edit</a>
                    </td>
                    <td>{{ $apartment->id }}</td>
                    <td>{{ $apartment->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
        <p>Add new amenities: <span><a href="{{ route('admin.amenities.new', ['house_id' => $house->id]) }}">Add new amenities</a></span></p>

        List of Amenities:


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($house->amenities as $amenities)
                <tr>
                    <td>
                        <a href="{{ route('admin.amenities.edit', ['house_id'=>$house->id, 'id' => $amenities->id]) }}">Edit</a>
                    </td>
                    <td>{{ $amenities->id }}</td>
                    <td>{{ $amenities->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endisset

    </body>
</html>
