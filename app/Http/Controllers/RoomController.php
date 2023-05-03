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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends BaseController {

    public function back($apartment_id){
        $apartment = Apartment::find($apartment_id);
        return redirect()->route('admin.apartments.edit', ['house_id' => $apartment->house->id, 'id' => $apartment_id]);
    }
    
    public function store(Request $request, $apartment_id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $apartment = Apartment::find($apartment_id);


        $room = $apartment->room()->create([
            'name' => $validatedData['name'],
            'internalName' => $request->input('internalName'),
            'size' => $request->input('size'),
            'roomType' => $request->input('type'),
        ]);

        return redirect()->route('admin.rooms.edit', ['apartment_id' => $apartment_id, 'id' => $room->id])->with('succesfulMessage', 'Apartment ' . $room->name . ' created successfully');
    }

    public function update(Request $request, $apartment_id, $id) {

        $room = Room::find($id);
        $room->name = $request->input('name');
        $room->internalName = $request->input('internalName');
        $room->roomType = $request->input('type');
        $room->size = $request->input('size');
        $room->save();

        return redirect()->route('admin.rooms.edit', ['apartment_id' => $apartment_id, 'id' => $room->id])->with('succesfulMessage', 'Apartment ' . $room->name . ' is updated');
    }

    public function new($apartment_id) {
        $apartment = Apartment::find($apartment_id);
        return view('admin/newroom',
                ['apartment' => $apartment]);
    }

    public function edit($apartment_id, $id) {
        $apartment = Apartment::find($apartment_id);
        $room = Room::find($id);

        return view('admin/newroom',
                [
                    'apartment' => $apartment,
                    'room' => $room,
        ]);
    }
    
    public function delete($apartment_id, $id) {
        $apartment = Apartment::find($apartment_id);
        $room = Room::find($id);
        $room->delete();

        return redirect()->route('admin.apartments.edit', ['house_id' => $apartment->house->id, 'id' => $apartment->id]);
    }

}
