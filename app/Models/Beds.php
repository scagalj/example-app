<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    
    protected $table = 'beds';
    protected $fillable = [
        'name',
        'bedType',
        'size',
        'numberOfBeds',
    ];
    
    public function room() {
        return $this->belongsTo(Room::class);
    }
    
}
