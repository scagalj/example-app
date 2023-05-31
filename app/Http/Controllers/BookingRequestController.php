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
use App\Models\Beds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\BookingRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;

/**
 * Description of BedController
 *
 * @author Stjepan
 */
class BookingRequestController extends BaseController {

    public function sendInformationRequest(Request $request) {

        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        $firstName = $request->input('firstName');
        $email = $request->input('email');
        $note = $request->input('note');
        $apartment_id = $request->input('apartment');

        $apartmentName = '';
        if (isset($apartment_id)) {
            $apartmentName = Apartment::find($apartment_id)->name;
        }

        $collection = collect([
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'firstName' => $firstName,
            'email' => $email,
            'note' => $note,
            'apartmentName' => $apartmentName,
            'request' => 'informationRequest',
        ]);

        Mail::to('cagalj95@gmail.com')->send(new BookingRequestMail($collection));
        session()->flash('booking-request-status', 'send');
        return redirect()->back();
    }

    public function sendBookingRequest(Request $request, $apartment_id) {

        $apartment = Apartment::find($apartment_id);

        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        $numberOfGuests = $request->input('guests');
        $price = $request->input('apartmentPrice_input');
        $firstName = $request->input('firstName');
        $email = $request->input('email');
        $note = $request->input('note');
        $collection = collect([
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'firstName' => $firstName,
            'guests' => $numberOfGuests,
            'price' => $price,
            'email' => $email,
            'note' => $note,
            'apartmentName' => $apartment->name,
            'request' => 'bookingRequest',
        ]);
        Mail::to('cagalj95@gmail.com')->send(new BookingRequestMail($collection));
        session()->flash('booking-request-status', 'send');
        return redirect()->back();
    }

}
