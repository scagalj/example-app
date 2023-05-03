<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model {

    protected $table = 'accessories';
    protected $fillable = [
        'name',
        'description',
        'iconName',
        'accessoriesType',
        'request',
        'popular',
    ];

    public function room() {
        return $this->belongsTo(Room::class);
    }

}
