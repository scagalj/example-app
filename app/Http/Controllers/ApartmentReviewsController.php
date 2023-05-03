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
use App\Models\ApartmentReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Description of ApartmentReviewsController
 *
 * @author Stjepan
 */
class ApartmentReviewsController extends BaseController {
    //put your code here
    
    public function getAll() {
        $reviews = ApartmentReviews::inRandomOrder()->get();

        return $reviews;
    }
}
