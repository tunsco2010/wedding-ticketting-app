<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitedGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invited_guests', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug')->unique();
            $table->string('name');
            $table->string('number_of_guest');
            $table->boolean('family');
            $table->string('email');
            $table->string('phone');
            $table->string('barcode');
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
        Schema::dropIfExists('invited_guests');
    }
}
