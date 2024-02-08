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
        Schema::create('troli_data', function (Blueprint $table) {
            $table->id();
            $table->integer('items_id')->nullable();
            $table->integer('kuantitas');
            $table->bigInteger('sub_total')->nullable();
            $table->string('kode_promo')->nullable();
            $table->string('discount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
