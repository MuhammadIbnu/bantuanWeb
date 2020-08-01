<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',16);
            $table->string('kk',16);
            $table->string('nama',20)->nullable();
            $table->string('jk',10)->nullable();
            $table->string('tmpt_lhr',10)->nullable();
            $table->string('tgl_lhr',10)->nullable();
            $table->string('nama_ibu',20)->nullable();
            $table->string('nama_ayah',20)->nullable();
            $table->string('kota',15)->nullable();
            $table->string('kec',20)->nullable();
            $table->string('kel',20)->nullable();
            $table->string('alamat',50)->nullable();
            $table->string('rt',10)->nullable();
            $table->string('rw',10)->nullable();
            $table->string('password',60);
            $table->string('api_token')->unique()->nullable()->default(null);
            $table->string('fcm_token')->nullable();
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
        Schema::table('waris', function (Blueprint $table) {
            $table->dropColumn('api_token');
        });
        Schema::dropIfExists('waris');
    }
}
