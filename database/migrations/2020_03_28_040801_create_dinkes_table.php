<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinkesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinkes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 12);
            $table->string('nama', 60);
            $table->string('password', 60);
            $table->string('api_token',80)->unique()->nullable()->default(null);
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

        Schema::table('dinkes', function (Blueprint $table) {
            $table->dropColumn('api_token');
        });
        Schema::dropIfExists('dinkes');
    }
}