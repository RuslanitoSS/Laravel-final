<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_things_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThingsTable extends Migration
{
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('wrnt')->nullable();
            $table->foreignId('master')->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('things');
    }
}
