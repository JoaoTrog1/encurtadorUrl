<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkTable extends Migration
{
    public function up()
    {
        Schema::create('link', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->string('description')->nullable();
            $table->string( 'identifier')->unique();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('link');
    }
}
