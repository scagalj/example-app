<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commons;

/**
 * Description of AmenitiesType
 *
 * @author Stjepan
 */
class AmenitiesSubType {
    
    const MOUNTAIN = 'mountain';
    const LAKE = 'lake';
    const RESTAURANTS = 'restaurant';
    const CAFE_BAR = 'cafe_bar';
    const TRAIN = 'train';
    const BUS = 'bus';
    const TAXI = 'taxi';
    const SEA_OCEAN = 'sea_ocean';
 
    
    public static function all() {
        return [
            self::MOUNTAIN,
            self::LAKE,
            self::RESTAURANTS,
            self::CAFE_BAR,
            self::TRAIN,
            self::BUS,
            self::TAXI,
            self::SEA_OCEAN,
        ];
    }
}
