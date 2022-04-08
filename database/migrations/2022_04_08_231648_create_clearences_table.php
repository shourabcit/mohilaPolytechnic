<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('craftinspector')->default(false);
            $table->boolean('workshopsuper')->default(false);
            $table->boolean('depthead')->default(false);
            $table->boolean('register')->default(false);
            $table->boolean('viceprincipal')->default(false);
            $table->boolean('principal')->default(false);
            $table->integer('status')->default(0); // 0 for request send not approved  || 1 for request has been approved 
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
        Schema::dropIfExists('clearences');
    }
}
