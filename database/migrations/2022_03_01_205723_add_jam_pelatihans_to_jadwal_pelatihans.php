<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJamPelatihansToJadwalPelatihans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_pelatihans', function (Blueprint $table) {
            $table->string('jam_mulai')->after('waktu_pelatihan')->nullable();
            $table->string('jam_berakhir')->after('jam_mulai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_pelatihans', function (Blueprint $table) {
            //
        });
    }
}
