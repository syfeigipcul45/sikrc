<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPelatihansToJadwalPelatihans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_pelatihans', function (Blueprint $table) {
            $table->text('peserta')->after('jam_berakhir')->nullable();
            $table->text('file_undangan')->after('peserta')->nullable();
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
