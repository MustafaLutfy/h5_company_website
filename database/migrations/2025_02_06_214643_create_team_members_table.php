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
        Schema::create('team_members', function (Blueprint $table) {  
            $table->id();  
            $table->string('name_en');  
            $table->string('name_ar');  
            $table->string('role_en');  
            $table->string('role_ar');  
            $table->text('description_en');  
            $table->text('description_ar');  
            $table->string('image');  
            $table->timestamps();  
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
