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
        Schema::create('designators', function (Blueprint $table) {
            $table->id();
            $table->string('designator');
            $table->longText('uraian_pekerjaan');
            $table->string('satuan');
            $table->string('material');
            $table->string('jasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designators');
    }
};
