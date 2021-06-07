<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('slug')->unique();
            $table->string('name');
            $table->date('date');
            $table->string('address');
            $table->string('first_contact_person');
            $table->string('second_contact_person')->nullable();
            $table->string('event_center')->nullable();
            $table->string('seating_arrangement')->nullable();
            $table->string('banner')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('max_guest')->default(500);
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
        Schema::dropIfExists('wedding_events');
    }
}
