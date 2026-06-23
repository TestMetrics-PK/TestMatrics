<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('body');
            $table->json('options')->nullable();
            $table->string('answer')->nullable();
            $table->text('explanation')->nullable();
            $table->string('difficulty')->nullable();
            $table->string('type')->default('mcq');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
