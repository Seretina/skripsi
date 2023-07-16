<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrix4PreferensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_4_preferensi', function (Blueprint $table) {
            $table->id();
            $table->double('nilai_max');

            // foreign key
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->unsignedBigInteger('jarak_id')->nullable();

            $table->foreign('kriteria_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('karyawan_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');

            $table->foreign('jarak_id')
                ->references('id')->on('matrix_3_jarak_ideal')
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
        Schema::dropIfExists('matrix_4_preferensi');
    }
}
