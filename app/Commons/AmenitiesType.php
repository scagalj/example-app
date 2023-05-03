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
class AmenitiesType {
    
    const SIGHTS = 'sights';
    const RESTAURANTS_CAFES = 'restaurants_cafes';
    const TOP_ATTRACTIONS = 'top_attractions';
    const NATURAL_BEAUTY = 'natural_beauty';
    const BEACHES = 'beaches';
    const AIRPORTS = 'airposts';
    const SKI_LIFTS = 'ski_lifts';
    const TRANSPORT = 'transport';
    
    public static function all() {
        return [
            self::SIGHTS,
            self::RESTAURANTS_CAFES,
            self::TOP_ATTRACTIONS,
            self::NATURAL_BEAUTY,
            self::BEACHES,
            self::AIRPORTS,
            self::SKI_LIFTS,
            self::TRANSPORT,
        ];
    }
    
}
