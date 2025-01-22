<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('use'); // Удаляем старую таблицу (сохраните данные, если нужно)

        Schema::create('use', function (Blueprint $table) {
            $table->id(); // Если нужен первичный ключ
            $table->unsignedBigInteger('thing_id');
            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('amount');
            $table->timestamps();

            // Внешние ключи с каскадным удалением
            $table->foreign('thing_id')->references('id')->on('thing')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('place')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('use');
    }
}
