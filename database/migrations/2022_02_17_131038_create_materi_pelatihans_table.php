<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriPelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_pelatihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('tema_pelatihans')->onDelete('cascade');
            $table->text('link_media')->nullable();
            $table->string('caption')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('materi_pelatihans');
    }
}
