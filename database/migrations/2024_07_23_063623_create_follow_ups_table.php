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
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('LeadId');
            $table->text('followUp1')->nullable();
            $table->text('followUp2')->nullable();
            $table->text('followUp3')->nullable();
            $table->text('followUp4')->nullable();
            $table->text('followUp5')->nullable();
            $table->timestamps();

            $table->foreign('LeadId')->references('id')->on('leads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};
