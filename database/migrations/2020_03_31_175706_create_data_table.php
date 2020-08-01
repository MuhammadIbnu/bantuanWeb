<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('kd_berkas');
            $table->unsignedInteger('kd_petugas')->nullable();
            $table->unsignedInteger('kd_dinkes')->nullable();
            $table->unsignedInteger('kd_waris')->nullable();
            $table->unsignedInteger('kd_bakuda')->nullable();
            $table->string('ktp_meninggal')->nullable();
            $table->string('kk_meninggal')->nullable();
            $table->string('jamkesmas')->nullable();
            $table->string('ktp_waris')->nullable();
            $table->string('kk_waris')->nullable();
            $table->string('akta_kematian')->nullable();
            $table->string('pernyataan_ahli_waris')->nullable();
            $table->string('pakta_waris')->nullable();
            $table->string('buku_tabungan')->nullable();
            $table->boolean('confirmed_I')->nullable();
            $table->boolean('confirmed_II')->nullable();
            $table->boolean('confirmed_III')->nullable();
            $table->boolean('confirmed_IV')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('keterangan_II')->nullable();
            $table->text('keterangan_III')->nullable();
            $table->text('keterangan_IV')->nullable();
            $table->foreign('kd_petugas')->references('id')->on('petugas')->onDelete('cascade');
            $table->foreign('kd_dinkes')->references('id')->on('dinkes')->onDelete('cascade');
            $table->foreign('kd_waris')->references('id')->on('waris')->onDelete('cascade');
            $table->foreign('kd_bakuda')->references('id')->on('bakuda')->onDelete('cascade');
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
        Schema::dropIfExists('data');
    }
}
