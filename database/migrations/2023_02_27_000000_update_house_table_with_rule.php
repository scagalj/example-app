<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHouseTableWithRule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('house', function (Blueprint $table) {
            $table->string('checkInRule')->nullable();
            $table->string('checkOutRule')->nullable();
            $table->string('quietHoursRule')->nullable();
            $table->string('extraBedPolicy')->nullable();
            $table->string('damagePolicy')->nullable();
            $table->boolean('smokingAllowed')->default(0);
            $table->boolean('partiesAllowed')->default(0);
            $table->boolean('petsAllowed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house', function (Blueprint $table) {
            $table->dropColumn('checkInRule');
            $table->dropColumn('checkOutRule');
            $table->dropColumn('quietHoursRule');
            $table->dropColumn('extraBedPolicy');
            $table->dropColumn('damagePolicy');
            $table->dropColumn('smokingAllowed');
            $table->dropColumn('partiesAllowed');
            $table->dropColumn('petsAllowed');
        });
    }
}
