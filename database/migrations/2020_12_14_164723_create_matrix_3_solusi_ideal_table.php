<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrix3SolusiIdealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_3_solusi_ideal', function (Blueprint $table) {
            $table->id();
            $table->double('nilai_min');
            $table->double('nilai_max');

            // foreign key
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->unsignedBigInteger('bobot_id')->nullable();

            $table->foreign('kriteria_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('karyawan_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');

            $table->foreign('bobot_id')
                ->references('id')->on('matrix_2_normalisasi_bobot')
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
        Schema::dropIfExists('matrix_3_solusi_ideal');
    }
}
