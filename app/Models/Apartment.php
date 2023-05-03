<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use App\Http\Controllers\LangController;
use App\Models\ApartmentReviews;
use App\Models\House;
use App\Models\Images;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Apartment
 *
 * @author Stjepan
 */
class Apartment extends Model {
    /* Fields:
     * - id
     * - name
     * - list of rooms;  
     * 
     */
    
//    protected $transient = [
//        'descriptionit' => null,
//    ];

    protected $table = 'apartment';
    protected $fillable = [
        'name',
        'internalName',
        'apartmentType',
        'size',
        'note',
        'description'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function house() {
        return $this->belongsTo(House::class);
    }

    public function room() {
        return $this->hasMany(Room::class);
    }

    public function images() {
        return $this->hasMany(Images::class);
    }

    public function apartmentReviews() {
        return $this->hasMany(ApartmentReviews::class);
    }
    
    public function getdescriptionvalue($lang){
        return $this->getDescriptionLang()->getValue($lang);
    }
    
    public function getDescriptionLang() {
        $description = LangController::convertJsonToLanguageField($this->description);
        return $description ;
    }

    public function getImagesPath() {
        return '/images/apartments/' . $this->id . '/';
    }

    public function getMainImages() {
        return $this->images()->where('mainimage', true);
    }

    public function getOtherImages() {
        return $this->images()->where('mainimage', false);

//        $otherImages = array();
//        foreach ($otherImages as $this->images => $image) {
//            if (!$image->mainimage) {
//                $otherImages[] = $image;
//            }
//        }
//        return $otherImages;
    }

}
