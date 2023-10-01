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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_bat');
            $table->string('nomMarche');
            $table->string('numMarche');
            $table->string('lo');
            $table->string('md');
            $table->string('DS');
            $table->string('DO');
            $table->string('DD');
            $table->string('ntj');
            $table->string('mr');
            $table->string('mtva');
            $table->string('mtrp-ttc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
