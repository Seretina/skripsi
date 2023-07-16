<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrix1NormalisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_1_normalisasi', function (Blueprint $table) {
            $table->id();
            $table->double('nilai');

            // foreign key
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->unsignedBigInteger('penilaian_id')->nullable();

            $table->foreign('kriteria_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('karyawan_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');

            $table->foreign('penilaian_id')
                ->references('id')->on('penilaians')
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
        Schema::dropIfExists('matrix_1_normalisasi');
    }
}
