<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Accessories;
use App\Models\Room;

/**
 * Description of AccessoriesController
 *
 * @author Stjepan
 */
class AccessoriesController extends BaseController {
    //put your code here
    
     public static function getAllAccessories($room_id) {
         
         $room = Room::find($room_id);
         $allRoomAccessories = $room->roomaccessories()->get();
         $availableAccessories = collect();
        
         $accessories = Accessories::all();

         foreach ($accessories as $accessorie) {
            $shouldAdd = true;
            foreach ($allRoomAccessories as $roomAccessories) {
                if ($accessorie->id == $roomAccessories->accessories->id) {
                    $shouldAdd = false;
                    break;
                }
            }
                if ($shouldAdd) {
                    $availableAccessories->add($accessorie);
                }
        }

        return $availableAccessories;
    }
    
}
