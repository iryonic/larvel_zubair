<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('homeimage')->nullable();
            $table->string('headertext')->nullable();
            $table->string('headerparagraph')->nullable();
            $table->string('whatsappnumber')->nullable();
            $table->text('whychooseusdescription')->nullable();
            $table->string('whychooseusimage')->nullable();
            $table->string('servicetitleone')->nullable();
            $table->text('serviceparaone')->nullable();
            $table->string('servicetitltwo')->nullable();
            $table->text('serviceparatwo')->nullable();
            $table->string('servicetitlethree')->nullable();
            $table->text('serviceparathree')->nullable();
            $table->string('serviceimage')->nullable();
            $table->string('thirdheading')->nullable();
            $table->text('thirdparagrapgh')->nullable();
            $table->string('bestpackheading')->nullable();
            $table->text('bestpackpara')->nullable();
            $table->string('desone')->nullable();
            $table->string('destwo')->nullable();
            $table->string('desthree')->nullable();
            $table->string('desfour')->nullable();

            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
