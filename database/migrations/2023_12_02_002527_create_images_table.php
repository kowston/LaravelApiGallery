<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image_file_path');
            $table->integer('album_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('image');
    }
};
