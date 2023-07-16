<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->double('nilai');
            $table->double('nilai_inisial')->nullable();

            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('kriteria_id');

            $table->foreign('kriteria_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');
            $table->foreign('karyawan_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');
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
        Schema::dropIfExists('penilaians');
    }
}
