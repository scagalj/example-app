<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Apartment;

/**
 * Description of Houses
 *
 * @author Stjepan
 */
class House extends Model {
    
    protected $table = 'house';
   
    protected $fillable = [
        'name',
        'internalName',
        'note',
        'checkInRule',
        'checkOutRule',
        'quietHoursRule',
        'extraBedPolicy',
        'damagePolicy',
        'smokingAllowed',
        'partiesAllowed',
        'petsAllowed',
        ];
    

    public function apartment() {
        return $this->hasMany(Apartment::class);
    }
    
        public function amenities() {
        return $this->hasMany(Amenities::class);
    }
    
    public function isHaveHouseRule(){
        if(!empty($this->checkInRule) && !empty($this->checkOutRule) ){
            return true;
        }
        return false;
    }
}
