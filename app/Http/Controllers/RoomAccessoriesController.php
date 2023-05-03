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
use App\Models\Room;
use App\Models\RoomAccessories;
use Illuminate\Http\Request;

/**
 * Description of RoomAccessoriesController
 *
 * @author Stjepan
 */
class RoomAccessoriesController extends BaseController {
    
    public function store(Request $request, $room_id) {
        $room = Room::find($room_id);

        $roomaccessories = $room->roomAccessories()->create([
            'accessories_id' => $request->input('accessories_id'),
        ]);

        
//        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id]);
        return redirect()->route('admin.roomaccessories.new', ['room_id' => $room->id]);
    }

    public function update(Request $request, $room_id, $id) {
        $room = Room::find($room_id);

        $roomaccessories = RoomAccessories::find($id);
        $roomaccessories->accessories_id = $request->input('accessories_id');
        $roomaccessories->save();

        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id]);
    }

    public function new($room_id) {
        $room = Room::find($room_id);
        return view('admin/newroomaccessories',
                [
                    'apartment' => $room->apartment,
                    'room' => $room,
        ]);
    }

    public function edit($room_id, $id) {
        $room = Room::find($room_id);
        $roomaccessories = RoomAccessories::find($id);

        return view('admin/newroomaccessories',
                [
                    'apartment' => $room->apartment,
                    'room' => $room,
                    'roomaccessories' => $roomaccessories,
        ]);
    }
    
    public function delete($room_id, $id) {
        $room = Room::find($room_id);
        $roomaccessories = RoomAccessories::find($id);
        $roomaccessories->delete();
        
        return redirect()->route('admin.rooms.edit', ['apartment_id' => $room->apartment->id, 'id' => $room->id]);
    }
    
}
