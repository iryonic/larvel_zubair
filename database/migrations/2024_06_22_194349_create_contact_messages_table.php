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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('adult')->nullable();

            $table->string('child')->nullable();

            $table->text('message')->nullable();
            $table->text('persons')->nullable();
            $table->text('pickupcity')->nullable();
            $table->date('pickupdate')->nullable();
            $table->time('pickuptime')->nullable();
            $table->text('traveltype')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
