<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Accessories;

/**
 * Description of RoomAccessories
 *
 * @author Stjepan
 */
class RoomAccessories extends Model {
    
    protected $fillable = [
        'accessories_id',
        'room_id',
    ];
    
    public function room() {
        return $this->belongsTo(Room::class);
    }
    
    public function accessories() {
        return $this->belongsTo(Accessories::class);
    }
}
