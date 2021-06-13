<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitedGuestsTable extends Migration
{
    /**
     * Run the migrations.
     * name, number_of_guest reserved_for email phone room_needed comment
     * @return void
     */
    public function up()
    {
        Schema::create('invited_guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->tinyInteger('status')->default('0');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedInteger('number_of_guest');
            $table->string('reserved_for')->default('single');
            $table->string('room_needed')->default('No');
            $table->longText('barcode')->nullable();
            $table->string('comment')->nullable();
            $table->string('attending')->default('all-event');
            $table->foreignId('wedding_event_id')->constrained('wedding_events');
            $table->timestamps();
            $table->softDeletes();
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
