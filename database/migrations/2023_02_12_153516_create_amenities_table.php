<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('amenitiesType');
            $table->string('amenitiesSubType')->nullable();
            $table->string('distance')->nullable();
            $table->string('externalUrl')->nullable();
            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')->references('id')->on('house')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('amenities');
    }

}
