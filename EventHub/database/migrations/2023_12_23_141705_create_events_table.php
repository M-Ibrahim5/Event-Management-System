<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();    
            $table->string('eventName');
            $table->text('eventDescription');
            $table->string('eventLocation');
            $table->string('eventCategory');
            $table->date('eventStartDate');
            $table->date('eventEndDate');
            $table->time('eventStartTime');
            $table->time('eventEndTime');
            $table->decimal('eventPrice', 10, 2);
            $table->integer('eventCapacity');
            $table->string('eventStatus');
            
            // Assuming 'email' is a string column, adjust the type accordingly
            $table->string('email'); 
            $table->string('imagePath')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('sponsorStatus')->nullable();
            // Define the foreign key constraint
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
