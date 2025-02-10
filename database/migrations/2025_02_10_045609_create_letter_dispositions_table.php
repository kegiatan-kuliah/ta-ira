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
        Schema::create('letter_dispositions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('letter_disposition_no');
            $table->text('instruction');
            $table->unsignedBigInteger('in_letter_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('in_letter_id')->references('id')->on('in_letters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_dispositions');
    }
};
