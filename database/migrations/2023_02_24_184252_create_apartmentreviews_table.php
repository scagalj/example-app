<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Commons\RoomType;

class CreateApartmentReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartmentreviews', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName')->nullable();
            $table->string('title')->nullable();
            $table->string('positiveComment')->nullable();
            $table->string('negativeComment')->nullable();
            $table->double('ratingNumber',8,2)->nullable();
            $table->string('countryCode')->nullable();
            $table->dateTime('bookingStartDate')->nullable();
            $table->dateTime('bookingEndDate')->nullable();
            $table->string('numberOfGuests')->nullable();
            $table->dateTime('reviewDate')->nullable();
            $table->unsignedBigInteger('apartment_id')->nullable();
            $table->foreign('apartment_id')->references('id')->on('apartment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartmentreviews');
    }
}
