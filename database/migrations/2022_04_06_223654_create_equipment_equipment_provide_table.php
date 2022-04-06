<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentEquipmentProvideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_equipment_provide', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('equipment_provide_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('equipment_equipment_provide');
    }
}
