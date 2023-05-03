<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Apartment;
use App\Models\Room;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Description of HouseController
 *
 * @author Stjepan
 */
class HouseController extends BaseController {

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $house = House::create([
                    'name' => $validatedData['name'],
                    'internalName' => $request->input('internalName'),
                    'note' => $request->input('note'),
                    'checkInRule' => $request->input('checkInRule'),
                    'checkOutRule' => $request->input('checkOutRule'),
                    'quietHoursRule' => $request->input('quietHoursRule'),
                    'extraBedPolicy' => $request->input('extraBedPolicy'),
                    'damagePolicy' => $request->input('damagePolicy'),
                    'smokingAllowed' => $request->has('smokingAllowed'),
                    'partiesAllowed' => $request->has('partiesAllowed'),
                    'petsAllowed' => $request->has('petsAllowed'),
        ]);

        return redirect()->route('admin.houses.edit', ['id' => $house->id])->with('succesfulMessage', 'Apartment ' . $house->name . ' created successfully');
    }

    public function update(Request $request, $id) {

        $house = House::find($id);
        $house->name = $request->input('name');
        $house->internalName = $request->input('internalName');
        $house->note = $request->input('note');
        $house->checkInRule = $request->input('checkInRule');
        $house->checkOutRule = $request->input('checkOutRule');
        $house->quietHoursRule = $request->input('quietHoursRule');
        $house->extraBedPolicy = $request->input('extraBedPolicy');
        $house->damagePolicy = $request->input('damagePolicy');
        $house->smokingAllowed = $request->has('smokingAllowed');
        $house->partiesAllowed = $request->has('partiesAllowed');
        $house->petsAllowed = $request->has('petsAllowed');
        $house->save();

        return redirect()->route('admin.houses.edit', ['id' => $house->id])->with('succesfulMessage', 'Apartment ' . $house->name . ' is updated');
    }

    public function new() {
        return view('admin/newhouse');
    }

    public function edit($id) {
        $house = House::find($id);

        return view('admin/newhouse', ['house' => $house]);
    }

    public function index() {
        $houses = House::all();
        Log::info($houses);

        return view('admin/houses', ['houses' => $houses]);
    }

}
