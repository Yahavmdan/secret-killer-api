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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->text('name')->unique();
            $table->integer('creator_id')->unique()->nullable(false)->default(0);
            $table->text( 'creator_name')->unique()->nullable(false)->default('none');
            $table->tinyInteger( 'is_active')->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
