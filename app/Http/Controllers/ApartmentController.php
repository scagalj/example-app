<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Apartment;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LangController;

/**
 * Description of ApartmentController
 *
 * @author Stjepan
 */
class ApartmentController extends BaseController {

    public function back($house_id) {
        return redirect()->route('admin.houses.edit', ['id' => $house_id]);
    }

    public function store(Request $request, $house_id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $house = House::find($house_id);

        $apartment = $house->apartment()->create([
            'name' => $validatedData['name'],
            'internalName' => $request->input('internalName'),
            'size' => $request->input('size'),
            'apartmentType' => $request->input('type'),
            'note' => $request->input('note'),
            'description' => LangController::getLanguageFieldAsJson($request, 'description'),
        ]);

        return redirect()->route('admin.apartments.edit', ['house_id' => $house_id, 'id' => $apartment->id])->with('succesfulMessage', 'Apartment ' . $apartment->name . ' created successfully');
    }

    public function update(Request $request, $house_id, $id) {

        $apartment = Apartment::find($id);
        $apartment->name = $request->input('name');
        $apartment->internalName = $request->input('internalName');
        $apartment->apartmentType = $request->input('type');
        $apartment->size = $request->input('size');
        $apartment->note = $request->input('note');
        
        $apartment->description = LangController::getLanguageFieldAsJson($request, 'description');

        $apartment->save();

        return redirect()->route('admin.apartments.edit', ['house_id' => $house_id, 'id' => $apartment->id])->with('succesfulMessage', 'Apartment ' . $apartment->name . ' is updated');
    }

    
    
    
    
    public function new($house_id) {
        $house = House::find($house_id);

        return view('admin/newapartment',
                ['house' => $house]);
    }

    public function edit($house_id, $id) {
        $house = House::find($house_id);
        $apartment = Apartment::find($id);

        return view('admin/newapartment', [
            'apartment' => $apartment,
            'house' => $house,
        ]);
    }

    public function index() {
        $allApartments = Apartment::all();
        Log::info($allApartments);

        return view('admin/apartments', ['apartments' => Apartment::all()]);
    }

    public function show(Apartment $apartment) {
        return view('apartment', ['apartment' => $apartment]);
    }

    public function destroy(Apartment $apartment) {
        if ($apartment->delete()) {
            return true;
        }
    }
    
    public static function getById($apartmentId){
        return Apartment::find($apartmentId);
    }

    public static function getAll() {
        return Apartment::all();
    }

    public function getMainImage($apartment) {
        return $apartment->images()->where('mainimage', true)->first();
    }

    public static function getOtherImages($apartment) {
        return $apartment->images()->where('mainimage', false)->get();
    }

    public static function getImagesByRange($apartment, $indexFrom, $imageCount = 2) {
        return $apartment->images()->where('mainimage', false)->get()->slice($indexFrom, $imageCount);
    }

    public static function getAllImagesToDisplay($apartment) {
        $c = collect();
        $mainImages = self::getMainImage($apartment);
        $c->add($mainImages);
        $otherImages = self::getOtherImages($apartment);
        return $c->concat($otherImages);
    }

    public static function getNumberOfGuests($apartment) {
        $roomsWithBeds = self::getAllRoomsWithBed($apartment);
        $guestCounter = 0;
        foreach ($roomsWithBeds as $roomsWithBed) {
            $guestCounter = $guestCounter + $roomsWithBed->getNumberOfGuests();
        }
        return $guestCounter;
    }

    public static function getNumberOfBedrooms($apartment) {
        $numberOfBedrooms = 0;
        $rooms = $apartment->room()->get();
        foreach ($rooms as $room) {
            if ($room->isBedroom()) {
                $numberOfBedrooms = $numberOfBedrooms + 1;
            }
        }
        return $numberOfBedrooms;
    }

    public static function getNumberOfBeds($apartment) {
        $numberOfBeds = 0;
        $rooms = $apartment->room()->get();
        foreach ($rooms as $room) {
            foreach ($room->beds as $bed) {
                $numberOfBeds = $numberOfBeds + $bed->numberOfBeds;
            }
        }

        return $numberOfBeds;
    }

    public static function getNumberOfBathrooms($apartment) {
        $numberOfBathrooms = 0;
        $rooms = $apartment->room()->get();
        foreach ($rooms as $room) {
            $numberOfBathrooms = $numberOfBathrooms + sizeof($room->bathroom()->get());
        }
        return $numberOfBathrooms;
    }

    public static function getAllRoomsWithBed($apartment) {
        $allrooms = $apartment->room()->get();
        $c = collect();
        foreach ($allrooms as $room) {
            if (($room->beds()->first())) {
                $c->add($room);
            }
        }
        return $c;
    }

    public static function getAllAccessoriesWithPopularFirst($apartment) {
        if (empty($apartment->room())) {
            return null;
        }
        if (is_null($apartment->room())) {
            return null;
        }
        if (is_null($apartment->room()->first())) {
            return null;
        }
        if (empty($apartment->room()->first()->roomaccessories())) {
            return null;
        }
        $allAccessories = $apartment->room()->first()->roomaccessories()->get();
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

    public static function getAllAccessories($apartment) {
        $allAccessories = $apartment->room()->first()->roomaccessories()->get();
        return $allAccessories;
    }

}
