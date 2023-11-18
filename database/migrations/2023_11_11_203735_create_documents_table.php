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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('picture');
            $table->string('std_bform_picture');
            $table->string('father_id_picture_front');
            $table->string('father_id_picture_back');
            $table->string('previous_school_certificate_pic');
            $table->string('mother_id_card_picture_front')->nullable();
            $table->string('mother_id_card_picture_back')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
