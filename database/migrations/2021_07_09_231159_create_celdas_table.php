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
            $table->integer('celda_a');
            $table->integer('celda_b');
            $table->integer('celda_c');
            $table->integer('celda_d');
            $table->integer('celda_e');
            $table->integer('celda_f');
            $table->integer('celda_g');
            $table->integer('celda_h');
            $table->integer('celda_i');
            $table->integer('celda_j');
            $table->integer('celda_k');
            $table->integer('celda_l');
            $table->integer('celda_m');
            $table->integer('celda_n');
            $table->integer('celda_o');
            $table->integer('celda_p');
            $table->integer('celda_q');
            $table->integer('celda_r');
            $table->integer('celda_s');
            $table->integer('celda_t');
            $table->integer('celda_u');
            $table->integer('celda_v');
            $table->integer('celda_w');
            $table->integer('celda_x');
            $table->integer('celda_y');
            $table->integer('celda_z');
            $table->integer('celda_aa');
            $table->integer('celda_ab');
            $table->integer('celda_ac');
            $table->integer('celda_ad');
            $table->integer('celda_ae');
            $table->integer('celda_af');
            $table->integer('celda_ag');
            $table->integer('celda_ah');
            $table->integer('celda_ai');
            $table->integer('celda_aj');
            $table->integer('celda_ak');
            $table->integer('celda_al');
            $table->integer('celda_am');
            $table->integer('celda_an');
            $table->integer('celda_ao');
            $table->integer('celda_ap');
            $table->integer('celda_aq');
            $table->integer('celda_ar');
            $table->integer('celda_as');
            $table->integer('celda_at');
            $table->integer('celda_au');
            $table->integer('celda_av');
            $table->integer('celda_aw');
            $table->integer('celda_ax');
            $table->integer('celda_ay');
            $table->integer('celda_az');
            $table->integer('celda_aaa');
            $table->integer('celda_aab');
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
