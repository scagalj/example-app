<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Amenities;
use \App\Models\House;
use Illuminate\Http\Request;

/**
 * Description of AmenitiesController
 *
 * @author Stjepan
 */
class AmenitiesController extends BaseController {
    
    public function store(Request $request, $house_id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $house = House::find($house_id);


        $amenities = $house->amenities()->create([
            'name' => $validatedData['name'],
            'distance' => $request->input('distance'),
            'amenitiesType' => $request->input('amenitiestype'),
            'amenitiesSubType' => $request->input('amenitiessubtype'),
            'externalUrl' => $request->input('externalUrl'),
        ]);

        
        return redirect()->route('admin.houses.edit', ['id' => $house->id])->with('succesfulMessage', 'House ' . $amenities->name . ' created successfully');
    }

    public function update(Request $request, $house_id, $id) {
        $house = House::find($house_id);

        $amenities = Amenities::find($id);
        $amenities->name = $request->input('name');
        $amenities->distance = $request->input('distance');
        $amenities->amenitiesType = $request->input('amenitiesType');
        $amenities->amenitiesSubType = $request->input('amenitiesSubType');
        $amenities->externalUrl = $request->input('externalUrl');
        $amenities->save();

//        return back();
        return redirect()->route('admin.houses.edit', ['id' => $house->id])->with('succesfulMessage', 'House ' . $amenities->name . ' is updated');
    }

    public function new($house_id) {
        $house = House::find($house_id);
        return view('admin/newamenities',
                [
                    'house' => $house,
        ]);
    }

    public function edit($house_id, $id) {
        $house = House::find($house_id);
        $amenities = Amenities::find($id);

        return view('admin/newamenities',
                [
                    'house' => $house,
                    'amenities' => $amenities,
        ]);
    }
    
    
}
