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
        Schema::create('addmissions', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('natinality');
            $table->string('std_bform_no');
            $table->string('father_id_card_no');
            $table->string('class');
            $table->string('previous_school');
            $table->string('father_occupation');
            $table->string('father_salary');
            $table->string('no_of_sublings');
            $table->string('mother_name');
            $table->staring('mother_id_card_number');
            $table->string('father_education');
            $table->string('mother_education');
            $table->string('contact_number');
            $table->integer('parent_id')->referances('parents')->on('id')->onDelete('CASCADE');
            $table->integer('document_id')->referances('document')->on('id')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addmissions');
    }
};
