<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetos', function (Blueprint $table) {
            $table->id();
            $table->string('object_type');
            $table->bigInteger('location');
            $table->date('day_found');
            $table->time('hour_found')->nullable(true);
            $table->string('observation');
            $table->boolean('delievered')->nullable(true);
            $table->boolean('donated')->nullable(true);
            $table->timestamps();

            $table->foreignId('id_category')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetos');
    }
};
