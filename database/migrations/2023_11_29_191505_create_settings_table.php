<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('title_page');
            $table->string('email_receive');
            $table->string('units_measurement');
            $table->string('company_email');
            $table->string('company_mobile');
            $table->text('company_address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
