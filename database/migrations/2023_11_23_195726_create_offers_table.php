<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('gate');
            $table->string('styleGate');
            $table->string('widthGate');
            $table->string('heightGate');
            $table->boolean('entryGate')->default(false);
            $table->string('widthEntryGate')->nullable();
            $table->string('heightEntryGate')->nullable();
            $table->boolean('montage')->default(false);
            $table->string('montagePlace')->nullable();
            $table->boolean('motor')->default(false);
            $table->text('msg')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
