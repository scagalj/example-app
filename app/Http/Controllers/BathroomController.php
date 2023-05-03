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
use App\Models\BathRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Description of BathroomController
 *
 * @author Stjepan
 */
class BathroomController extends BaseController {
    
    public function store(Request $request, $room_id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $room = Room::find($room_id);


        $bathroom = $room->bathroom()->create([
            'name' => $validatedData['name'],
            'size' => $request->input('size'),
            'bathroomPosition' => $request->input('bathroomPosition'),
            'note' => $request->input('note'),
        ]);

        
        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id])->with('succesfulMessage', 'Apartment ' . $bathroom->name . ' created successfully');
    }

    public function update(Request $request, $room_id, $id) {
        $room = Room::find($room_id);

        $bathroom = BathRoom::find($id);
        $bathroom->name = $request->input('name');
        $bathroom->size = $request->input('size');
        $bathroom->bathroomPosition = $request->input('bathroomPosition');
        $bathroom->note = $request->input('note');
        $bathroom->save();

        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id])->with('succesfulMessage', 'Apartment ' . $bathroom->name . ' is updated');
    }

    public function new($room_id) {
        $room = Room::find($room_id);
        return view('admin/newbathroom',
                [
                    'apartment' => $room->apartment,
                    'room' => $room,
        ]);
    }

    public function edit($room_id, $id) {
        $room = Room::find($room_id);
        $bathroom = BathRoom::find($id);

        return view('admin/newbathroom',
                [
                    'apartment' => $room->apartment,
                    'room' => $room,
                    'bathroom' => $bathroom,
        ]);
    }
    
    public function delete($room_id, $id) {
        $room = Room::find($room_id);
        $bathroom = BathRoom::find($id);
        $bathroom->delete();
        
        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id]);
    }
    
    
}
