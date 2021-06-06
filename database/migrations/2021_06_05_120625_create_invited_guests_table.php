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
            $table->boolean('reserved_for')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('room_needed')->default(false);
            $table->string('barcode');
            $table->string('comment')->nullable();
            $table->boolean('attending')->default(true);
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
