<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_places_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('repair')->default(false);
            $table->boolean('work')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('places');
    }
}
