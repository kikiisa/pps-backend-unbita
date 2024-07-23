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
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('deskripsi');
            $table->string('icon');
            $table->text('about');
            $table->text('visi_misi');
            $table->string('phone');
            $table->string("total_mahasiswa");
            $table->string("total_pengajar");
            $table->string("total_lulusan");
            $table->string("total_prodi");
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
        Schema::dropIfExists('pengaturans');
    }
};
