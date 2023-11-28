<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reference_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('src');
            $table->string('tmp');
            $table->integer('reference_id');
            $table->boolean('main')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reference_galleries');
    }
};
