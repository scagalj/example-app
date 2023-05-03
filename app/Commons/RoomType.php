<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commons;

class RoomType {

    const BEDROOM = 'bedroom';
    const COMMON_SPACE = 'common_space';
    const LIVIN_ROOM = 'living_room';
    const BATHROOM = 'bathroom';
    const GALLERY = 'gallery';

    public static function all() {
        return [
            self::BEDROOM,
            self::COMMON_SPACE,
            self::LIVIN_ROOM,
            self::BATHROOM,
            self::GALLERY,
        ];
    }

}