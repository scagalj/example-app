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


/**
 * Description of BathRoom
 *
 * @author Stjepan
 */
class BathRoom extends Model {
    
    protected $table = 'bathroom';
    protected $fillable = [
        'name',
        'size',
        'bathroomPosition',
        'note',
    ];
    
    public function room() {
        return $this->belongsTo(Room::class);
    }
}
