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
 * Description of Images
 *
 * @author Stjepan
 */
class Images extends Model {
    
    protected $fillable = [
        'filename',
        'description',
        'mainimage',
        ];
    
    
    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }
}
