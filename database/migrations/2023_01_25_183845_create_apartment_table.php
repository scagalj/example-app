<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Commons\ApartmentType;

class CreateApartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('apartment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('internalName')->nullable();
            $table->string('apartmentType')->nullable();
            $table->string('size')->nullable();
            $table->json('description')->nullable();
            $table->string('note')->nullable();
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
    public function down()
    {
        Schema::dropIfExists('apartment');
    }
}
