<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Beds;
use App\Models\Apartment;
use App\Models\Accessories;
use App\Models\RoomAccessories;

/**
 * Description of Room
 *
 * @author Stjepan
 * 
 *     ROOM
 * -id
 * -name
 * -internalName
 * -size
 * -apartmentId - reference na APARTMENT
 * -roomType
 * -numberOfBathrooms
 * -list of BEDS
 * -list of ACCESSORIES
 * 
 */
class Room extends Model {

    protected $table = 'room';
    protected $fillable = [
        'name',
        'internalName',
        'size',
        'roomType',
        'apartment_id',
    ];

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

    public function bathroom() {
        return $this->hasMany(BathRoom::class);
    }

    public function beds() {
        return $this->hasMany(Beds::class);
    }

    public function roomaccessories() {
        return $this->hasMany(RoomAccessories::class);
    }

    public function getNumberOfGuests() {
        $guestCounter = 0;
        foreach ($this->beds as $bed) {
            $guestCounter = $guestCounter + ($bed->numberOfBeds * $this->resolveBedCapacity($bed->bedType));
        }

        return $guestCounter;
    }

    public function isBedroom() {
        return $this->roomType == 'bedroom';
    }

    private function resolveBedCapacity($bedType) {
        switch ($bedType) {
            case 'single_bed':
                return 1;
            case 'twin_bed':
            case 'double_bed':
            case 'queen_bed':
            case 'king_bed':
            case 'bunk_bed':
            case 'sofa_bed':
            case 'air_bed':
            case 'water_bed':
                return 2;
        }
    }

}
