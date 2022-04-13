<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenKerjasamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_kerjasamas', function (Blueprint $table) {
            $table->id();
            $table->string('id_kerjasama');
            $table->foreign('id_kerjasama')->references('id')->on('kerja_samas')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('link_file')->nullable();
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
        Schema::dropIfExists('dokumen_kerjasamas');
    }
}
