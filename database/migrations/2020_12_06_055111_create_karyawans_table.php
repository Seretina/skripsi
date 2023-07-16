<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->nullable();
            $table->string('name', 50)->nullable();
            $table->string('gender', 15)->nullable();
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('name_parent', 50)->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            //soft delete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
