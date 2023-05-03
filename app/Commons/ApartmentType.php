<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commons;

use Illuminate\Validation\Rules\Enum;

class ApartmentType{

    const STUDIO_APARTMENT = 'studio_apartment';
    const APARTMENT = 'apartment';
    const CONDO = 'condo';
    const HOUSE = 'house';

    public static function all() {
        return [
            self::STUDIO_APARTMENT,
            self::APARTMENT,
            self::CONDO,
            self::HOUSE,
        ];
    }

}
