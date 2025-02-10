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
        Schema::create('letter_agendas', function (Blueprint $table) {
            $table->id();
            $table->string('agenda_no');
            $table->date('date');
            $table->unsignedBigInteger('in_letter_id')->nullable();
            $table->unsignedBigInteger('out_letter_id')->nullable();
            $table->timestamps();

            $table->foreign('in_letter_id')->references('id')->on('in_letters')->onDelete('cascade');
            $table->foreign('out_letter_id')->references('id')->on('out_letters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_agendas');
    }
};
