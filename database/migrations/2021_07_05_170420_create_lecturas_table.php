<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('celda_p1_a', 100);
            $table->string('celda_p1_b', 100);
            $table->string('celda_p1_c', 100);
            $table->string('celda_p1_d', 100);
            $table->string('celda_p1_', 100);
            $table->string('celda_p1_f', 100);
            $table->string('celda_p1_g', 100);
            $table->string('celda_p1_h', 100);
            $table->string('celda_p1_i', 100);
            $table->string('celda_p1_j', 100);
            $table->string('celda_p1_k', 100);
            $table->string('celda_p1_l', 100);
            $table->string('celda_p1_m', 100);
            $table->string('celda_p1_n', 100);
            $table->string('celda_p1_o', 100);
            $table->string('celda_p1_p', 100);
            $table->string('celda_p1_q', 100);
            $table->string('celda_p1_r', 100);
            $table->string('celda_p1_s', 100);
            $table->string('celda_p1_t', 100);
            $table->string('celda_p1_u', 100);
            $table->string('celda_p1_v', 100);
            $table->string('celda_p1_w', 100);
            $table->string('celda_p1_x', 100);
            $table->string('celda_p1_y', 100);
            $table->string('celda_p1_z', 100);
            $table->string('celda_p1_aa', 100);
            $table->string('celda_p1_ab', 100);
            $table->string('celda_p1_ac', 100);
            $table->string('celda_p1_ad', 100);
            $table->string('celda_p1_ae', 100);
            $table->string('celda_p1_af', 100);
            $table->string('celda_p1_ag', 100);
            $table->string('celda_p1_ah', 100);
            $table->string('celda_p1_ai', 100);
            $table->string('celda_p1_aj', 100);
            $table->string('celda_p2_a', 100);
            $table->string('celda_p2_b', 100);
            $table->string('celda_p2_c', 100);
            $table->string('celda_p2_d', 100);
            $table->string('celda_p2_e', 100);
            $table->string('celda_p2_f', 100);
            $table->string('celda_p2_g', 100);
            $table->string('celda_p2_h', 100);
            $table->string('celda_p2_i', 100);
            $table->string('celda_p2_j', 100);
            $table->string('celda_p2_k', 100);
            $table->string('celda_p2_l', 100);
            $table->string('celda_p2_m', 100);
            $table->string('celda_p2_n', 100);
            $table->string('celda_p2_o', 100);
            $table->string('celda_p2_p', 100);
            $table->string('celda_p2_q', 100);
            $table->string('celda_p2_r', 100);
            $table->string('celda_p2_s', 100);
            $table->string('celda_p2_t', 100);
            $table->string('celda_p2_u', 100);
            $table->string('celda_p2_v', 100);
            $table->string('celda_p2_w', 100);
            $table->string('celda_p2_x', 100);
            $table->string('celda_p2_y', 100);
            $table->string('celda_p2_z', 100);
            $table->string('celda_p2_aa', 100);
            $table->string('celda_p2_ab', 100);
            $table->string('celda_p2_ac', 100);
            $table->string('celda_p2_ad', 100);
            $table->string('celda_p2_ae', 100);
            $table->string('celda_p2_af', 100);
            $table->string('celda_p2_ag', 100);
            $table->string('celda_p2_ah', 100);
            $table->string('celda_p2_ai', 100);
            $table->string('celda_p2_aj', 100);
            $table->string('celda_p3_a', 100);
            $table->string('celda_p3_b', 100);
            $table->string('celda_p3_c', 100);
            $table->string('celda_p3_d', 100);
            $table->string('celda_p3_e', 100);
            $table->string('celda_p3_f', 100);
            $table->string('celda_p3_g', 100);
            $table->string('celda_p3_h', 100);
            $table->string('celda_p3_i', 100);
            $table->string('celda_p3_j', 100);
            $table->string('celda_p3_k', 100);
            $table->string('celda_p3_l', 100);
            $table->string('celda_p3_m', 100);
            $table->string('celda_p3_n', 100);
            $table->string('celda_p3_o', 100);
            $table->string('celda_p3_p', 100);
            $table->string('celda_p3_q', 100);
            $table->string('celda_p3_r', 100);
            $table->string('celda_p3_s', 100);
            $table->string('celda_p3_t', 100);
            $table->string('celda_p3_u', 100);
            $table->string('celda_p3_v', 100);
            $table->string('celda_p3_w', 100);
            $table->string('celda_p3_x', 100);
            $table->string('celda_p3_y', 100);
            $table->string('celda_p3_z', 100);
            $table->string('celda_p3_aa', 100);
            $table->string('celda_p3_ab', 100);
            $table->string('celda_p3_ac', 100);
            $table->string('celda_p3_ad', 100);
            $table->string('celda_p3_ae', 100);
            $table->string('celda_p3_af', 100);
            $table->string('celda_p3_ag', 100);
            $table->string('celda_p3_ah', 100);
            $table->string('celda_p3_ai', 100);
            $table->string('celda_p3_aj', 100);
            $table->string('manzana');
            $table->string('lote');
            $table->string('imagen');
            $table->string('periodo_inicio');
            $table->string('periodo_fin');
            $table->foreignId('urbanizacion_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturas');
    }
}
