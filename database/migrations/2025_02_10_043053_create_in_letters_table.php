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
        Schema::create('in_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_no');
            $table->date('letter_date');
            $table->string('sender');
            $table->string('subject');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('level_id');
            $table->string('attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_letters');
    }
};
