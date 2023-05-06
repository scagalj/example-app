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

}
