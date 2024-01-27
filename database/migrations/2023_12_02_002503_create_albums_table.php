<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('cover_file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('albums');
    }
};
