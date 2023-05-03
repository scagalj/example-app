<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Apartment;
use App\Models\Room;
use App\Models\Beds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Description of BedController
 *
 * @author Stjepan
 */
class BedController extends BaseController {

    public function store(Request $request, $apartment_id, $room_id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $room = Room::find($room_id);


        $bed = $room->beds()->create([
            'name' => $validatedData['name'],
            'size' => $request->input('size'),
            'bedType' => $request->input('type'),
            'numberOfBeds' => $request->input('numberOfBeds'),
        ]);

        
        return redirect()->route('admin.rooms.edit', ['apartment_id' => $apartment_id, 'id' => $room_id])->with('succesfulMessage', 'Apartment ' . $bed->name . ' created successfully');
    }

    public function update(Request $request, $apartment_id, $room_id, $id) {

        $beds = Beds::find($id);
        $beds->name = $request->input('name');
        $beds->bedType = $request->input('type');
        $beds->size = $request->input('size');
        $beds->numberOfBeds = $request->input('numberOfBeds');
        $beds->save();

//        return back();
        return redirect()->route('admin.rooms.edit', ['apartment_id' => $apartment_id, 'id' => $room_id])->with('succesfulMessage', 'Apartment ' . $beds->name . ' is updated');
    }

    public function new($apartment_id, $room_id) {
        $apartment = Apartment::find($apartment_id);
        $room = Room::find($room_id);
        return view('admin/newbed',
                [
                    'apartment' => $apartment,
                    'room' => $room,
        ]);
    }

    public function edit($apartment_id,$room_id, $id) {
        $apartment = Apartment::find($apartment_id);
        $room = Room::find($room_id);
        $bed = Beds::find($id);

        return view('admin/newbed',
                [
                    'apartment' => $apartment,
                    'room' => $room,
                    'bed' => $bed,
        ]);
    }
    
    public function delete($room_id, $id) {
        $room = Room::find($room_id);
        $bed = Beds::find($id);
        $bed->delete();
        
        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id]);
    }

}
