<?php
// In the created migration file

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->boolean('auto_approve')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');

            // Set the default status based on auto_approve
            $table->index(['event_id', 'auto_approve']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
