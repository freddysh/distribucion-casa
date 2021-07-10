<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeldasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celdas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('celda_a', 100);
            $table->string('celda_b', 100);
            $table->string('celda_c', 100);
            $table->string('celda_d', 100);
            $table->string('celda_e', 100);
            $table->string('celda_f', 100);
            $table->string('celda_g', 100);
            $table->string('celda_h', 100);
            $table->string('celda_i', 100);
            $table->string('celda_j', 100);
            $table->string('celda_k', 100);
            $table->string('celda_l', 100);
            $table->string('celda_m', 100);
            $table->string('celda_n', 100);
            $table->string('celda_o', 100);
            $table->string('celda_p', 100);
            $table->string('celda_q', 100);
            $table->string('celda_r', 100);
            $table->string('celda_s', 100);
            $table->string('celda_t', 100);
            $table->string('celda_u', 100);
            $table->string('celda_v', 100);
            $table->string('celda_w', 100);
            $table->string('celda_x', 100);
            $table->string('celda_y', 100);
            $table->string('celda_z', 100);
            $table->string('celda_aa', 100);
            $table->string('celda_ab', 100);
            $table->string('celda_ac', 100);
            $table->string('celda_ad', 100);
            $table->string('celda_ae', 100);
            $table->string('celda_af', 100);
            $table->string('celda_ag', 100);
            $table->string('celda_ah', 100);
            $table->string('celda_ai', 100);
            $table->string('celda_aj', 100);
            $table->foreignId('lectura_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('celdas');
    }
}
