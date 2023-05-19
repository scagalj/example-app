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
use Carbon\Carbon;
use \App\Models\ApartmentPrices;

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
        error_log('Pozvana update price.');



        $apartment = Apartment::find($id);
        $apartment->name = $request->input('name');
        $apartment->internalName = $request->input('internalName');
        $apartment->apartmentType = $request->input('type');
        $apartment->size = $request->input('size');
        $apartment->note = $request->input('note');

        $apartment->description = LangController::getLanguageFieldAsJson($request, 'description');

        $apartment->save();

        return redirect()->route('admin.apartments.edit', ['house_id' => $house_id, 'id' => $apartment->id])->with('succesfulMessage', 'Apartment - ' . $apartment->name . ' is updated');
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

    public function deletePrice($apartment_id, $id) {
        error_log('Pozvana delete price.');
        
         $apartment = Apartment::find($apartment_id);
        $price = ApartmentPrices::find($id);
        $price->delete();

        return redirect()->route('admin.apartments.edit', ['house_id' => $apartment->house->id, 'id' => $apartment->id]);
        
    }
    
    public function updatePrice(Request $request, $apartent_id, $id) {
        $apartment = Apartment::find($apartent_id);
        $price = ApartmentPrices::find($id);
        
        $from = $request->input('fromDate') . ' 00:00:00';
        $to = $request->input('toDate') . ' 23:59:59';
        
        $price->fromDate = Carbon::createFromFormat('d.m.Y H:i:s', $from);
        $price->toDate = Carbon::createFromFormat('d.m.Y H:i:s', $to);
        $price->price =  $request->input('price');
        
        $price->save();
        
        return redirect()->route('admin.apartments.edit', ['house_id' => $apartment->house->id, 'id' => $apartment->id])->with('succesfulMessage', 'CIJENA JE PROSLA?');
    }
    
    public function addPrice(Request $request, $house_id, $id) {
        $apartment = Apartment::find($id);

        $price = $apartment->apartmentPrices()->create([
            'fromDate' => Carbon::createFromFormat('d.m.Y H:i:s', $request->input('fromDate') . ' 00:00:00')->toDateString(),
            'toDate' => Carbon::createFromFormat('d.m.Y H:i:s', $request->input('toDate') . ' 23:59:59')->toDateString(),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('admin.apartments.edit', ['house_id' => $apartment->house->id, 'id' => $apartment->id])->with('succesfulMessage', 'CIJENA JE PROSLA?');
    }
    
    

    public function index() {
//        $allApartments = Apartment::all();
//        Log::info($allApartments);

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

    public static function getById($apartmentId) {
        return Apartment::find($apartmentId);
    }

    public static function getAll() {
        return Apartment::all();
    }

}
