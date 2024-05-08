<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_id');
            $table->string('email');
            $table->foreignId('event_id'); // Event ID as foreign key
            $table->integer('ticket_quantity'); // Ticket quantity
            $table->float('amount');
            $table->string('currency');
            $table->string('status');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
