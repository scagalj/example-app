<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use App\Http\Controllers\LangController;
use App\Models\ApartmentReviews;
use App\Models\ApartmentPrices;
use App\Models\House;
use App\Models\Images;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    
    public function apartmentPrices() {
        return $this->hasMany(ApartmentPrices::class);
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

    public function getMainImage() {
        return $this->images()->where('mainimage', true)->first();
    }
    
    public function getMainImages() {
        return $this->images()->where('mainimage', true);
    }
    
    public function getOtherImages() {
        return $this->images()->where('mainimage', false)->get();
    }

    public function getImagesByRange($indexFrom, $imageCount = 2) {
        return $this->images()->where('mainimage', false)->get()->slice($indexFrom, $imageCount);
    }
    
    public function getAllImagesToDisplay() {
        $c = collect();
        $mainImages = $this->getMainImage();
        $c->add($mainImages);
        $otherImages = $this->getOtherImages();
        return $c->concat($otherImages);
    }
    
    public function getNumberOfGuests() {
        $roomsWithBeds = $this->getAllRoomsWithBed();
        $guestCounter = 0;
        foreach ($roomsWithBeds as $roomsWithBed) {
            $guestCounter = $guestCounter + $roomsWithBed->getNumberOfGuests();
        }
        return $guestCounter;
    }

    public function getNumberOfBedrooms() {
        $numberOfBedrooms = 0;
        $rooms = $this->room()->get();
        foreach ($rooms as $room) {
            if ($room->isBedroom()) {
                $numberOfBedrooms = $numberOfBedrooms + 1;
            }
        }
        return $numberOfBedrooms;
    }

    public function getNumberOfBeds() {
        $numberOfBeds = 0;
        $rooms = $this->room()->get();
        foreach ($rooms as $room) {
            foreach ($room->beds as $bed) {
                $numberOfBeds = $numberOfBeds + $bed->numberOfBeds;
            }
        }

        return $numberOfBeds;
    }

    public function getNumberOfBathrooms() {
        $numberOfBathrooms = 0;
        $rooms = $this->room()->get();
        foreach ($rooms as $room) {
            $numberOfBathrooms = $numberOfBathrooms + sizeof($room->bathroom()->get());
        }
        return $numberOfBathrooms;
    }

    public function getAllRoomsWithBed() {
        $allrooms = $this->room()->get();
        $c = collect();
        foreach ($allrooms as $room) {
            if (($room->beds()->first())) {
                $c->add($room);
            }
        }
        return $c;
    }

    public function getAllAccessoriesWithPopularFirst() {
        if (empty($this->room())) {
            return null;
        }
        if (is_null($this->room())) {
            return null;
        }
        if (is_null($this->room()->first())) {
            return null;
        }
        if (empty($this->room()->first()->roomaccessories())) {
            return null;
        }
        $allAccessories = $this->room()->first()->roomaccessories()->get();
        $popularAccessories = collect();
        $otherAccessories = collect();
        foreach ($allAccessories as $roomaccessories) {
            if ($roomaccessories->accessories->popular == 'true') {
                $popularAccessories->add($roomaccessories);
            } else {
                $otherAccessories->add($roomaccessories);
            }
        }
        return $popularAccessories->concat($otherAccessories);
    }

    public function getAllAccessories() {
        $allAccessories = $this->room()->first()->roomaccessories()->get();
        return $allAccessories;
    }

    public function calculatePrice($periodFrom, $periodTo){
        
        if (!isset($periodFrom)) {
            $periodFrom = date('d.m.Y');
        }

        if (!isset($periodTo)) {
            $periodTo = date('d.m.Y', strtotime($periodFrom . ' +1 day')); // Add one day
        }

        error_log('Datum1: ' . $periodFrom);
        error_log('Datum:2 ' . $periodTo);


        $dateFrom = Carbon::createFromFormat('d.m.Y', $periodFrom);
        $dateTo = Carbon::createFromFormat('d.m.Y', $periodTo);
        
        $amount = 0;
        
        while($dateFrom < $dateTo){
            $price = $this->calculatePriceForDate($dateFrom);
            if($price != null){
                
                error_log('Calculate price:' . $price->price . ' for date ' . $dateFrom);
                $amount += $price->price;
            }
            $dateFrom->addDay();
        }
        return $amount;
        
    }
    
    private function calculatePriceForDate($date){
        $apartmentPrices = $this->apartmentPrices()->get();
        foreach($apartmentPrices as $price){
            if($date->between($price->fromDate, $price->toDate)){
                return $price;
            }
        }
        return null;
    }
    
//    public function getOtherImages() {
//        return $this->images()->where('mainimage', false);

//        $otherImages = array();
//        foreach ($otherImages as $this->images => $image) {
//            if (!$image->mainimage) {
//                $otherImages[] = $image;
//            }
//        }
//        return $otherImages;
//    }

}
