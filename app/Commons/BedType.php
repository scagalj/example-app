<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commons;

class BedType {

    const SINGLE_BED = 'single_bed';
    const TWIN_BED = 'twin_bed';
    const DOUBLE_BED = 'double_bed';
    const QUEEN_BED = 'queen_bed';
    const KING_BED = 'king_bed';
    const BUNK_BED = 'bunk_bed';
    const SOFA_BED = 'sofa_bed';
    const AIR_BED = 'air_bed';
    const WATER_BED = 'water_bed';

    public static function all() {
        return [
            self::SINGLE_BED,
            self::TWIN_BED,
            self::DOUBLE_BED,
            self::QUEEN_BED,
            self::KING_BED,
            self::BUNK_BED,
            self::SOFA_BED,
            self::AIR_BED,
            self::WATER_BED,
        ];
    }

}
