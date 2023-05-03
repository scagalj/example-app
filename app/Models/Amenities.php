<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    
    protected $table = 'amenities';
    protected $fillable = [
        'name',
        'distance',
        'amenitiesType',
        'amenitiesSubType',
        'externalUrl',
    ];
    
    public function house() {
        return $this->belongsTo(House::class);
    }}
