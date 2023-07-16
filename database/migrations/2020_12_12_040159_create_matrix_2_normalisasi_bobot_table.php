<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrix2NormalisasiBobotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_2_normalisasi_bobot', function (Blueprint $table) {
            $table->id();
            $table->double('nilai');

            // foreign key
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->unsignedBigInteger('normalisasi_id')->nullable();

            $table->foreign('kriteria_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('karyawan_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');

            $table->foreign('normalisasi_id')
                ->references('id')->on('matrix_1_normalisasi')
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
        Schema::dropIfExists('matrix_2_normalisasi_bobot');
    }
}
