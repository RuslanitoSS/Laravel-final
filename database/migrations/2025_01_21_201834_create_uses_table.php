<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_uses_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsesTable extends Migration
{
    public function up()
    {
        Schema::create('uses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thing_id')->constrained('things')->onDelete('cascade');
            $table->foreignId('place_id')->constrained('places')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('uses');
    }
}
