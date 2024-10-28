<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockTable extends Migration
{
    public function up()
    {
        Schema::create('lock', function (Blueprint $table) {
            $table->id();
            $table->string('linkLock');
            $table->foreignId('FkIdLink')->constrained('link')->onDelete('cascade');
            $table->foreignId('FkIdCategory')->constrained('category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lock');
    }
}
