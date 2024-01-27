<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('image_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id');
            $table->integer('img_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('image_tags');
    }
};
