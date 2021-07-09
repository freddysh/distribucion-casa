<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use Illuminate\Http\Request;

class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        //
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request->all();
        $lectura=new Lectura();
        $lectura->codigo=$request->codigo;
        $lectura->celda_p1_a=$request->celda_p1_a;
        $lectura->celda_p1_b=$request->celda_p1_b;
        $lectura->celda_p1_c=$request->celda_p1_c;
        $lectura->celda_p1_d=$request->celda_p1_d;
        $lectura->celda_p1_e=$request->celda_p1_e;
        $lectura->celda_p1_f=$request->celda_p1_f;
        $lectura->celda_p1_g=$request->celda_p1_g;
        $lectura->celda_p1_h=$request->celda_p1_h;
        $lectura->celda_p1_i=$request->celda_p1_i;
        $lectura->celda_p1_j=$request->celda_p1_j;
        $lectura->celda_p1_k=$request->celda_p1_k;
        $lectura->celda_p1_l=$request->celda_p1_l;
        $lectura->celda_p1_m=$request->celda_p1_m;
        $lectura->celda_p1_n=$request->celda_p1_n;
        $lectura->celda_p1_o=$request->celda_p1_o;
        $lectura->celda_p1_p=$request->celda_p1_p;
        $lectura->celda_p1_q=$request->celda_p1_q;
        $lectura->celda_p1_r=$request->celda_p1_r;
        $lectura->celda_p1_s=$request->celda_p1_s;
        $lectura->celda_p1_t=$request->celda_p1_t;
        $lectura->celda_p1_u=$request->celda_p1_u;
        $lectura->celda_p1_v=$request->celda_p1_v;
        $lectura->celda_p1_w=$request->celda_p1_w;
        $lectura->celda_p1_x=$request->celda_p1_x;
        $lectura->celda_p1_y=$request->celda_p1_y;
        $lectura->celda_p1_z=$request->celda_p1_z;
        $lectura->celda_p1_aa=$request->celda_p1_aa;
        $lectura->celda_p1_ab=$request->celda_p1_ab;
        $lectura->celda_p1_ac=$request->celda_p1_ac;
        $lectura->celda_p1_ad=$request->celda_p1_ad;
        $lectura->celda_p1_ae=$request->celda_p1_ae;
        $lectura->celda_p1_af=$request->celda_p1_af;
        $lectura->celda_p1_ag=$request->celda_p1_ag;
        $lectura->celda_p1_ah=$request->celda_p1_ah;
        $lectura->celda_p1_ai=$request->celda_p1_ai;
        $lectura->celda_p1_aj=$request->celda_p1_aj;
        $lectura->celda_p2_a=$request->celda_p2_a;
        $lectura->celda_p2_b=$request->celda_p2_b;
        $lectura->celda_p2_c=$request->celda_p2_c;
        $lectura->celda_p2_d=$request->celda_p2_d;
        $lectura->celda_p2_e=$request->celda_p2_e;
        $lectura->celda_p2_f=$request->celda_p2_f;
        $lectura->celda_p2_g=$request->celda_p2_g;
        $lectura->celda_p2_h=$request->celda_p2_h;
        $lectura->celda_p2_h=$request->celda_p2_h;
        $lectura->celda_p2_i=$request->celda_p2_i;
        $lectura->celda_p2_j=$request->celda_p2_j;
        $lectura->celda_p2_k=$request->celda_p2_k;
        $lectura->celda_p2_l=$request->celda_p2_l;
        $lectura->celda_p2_m=$request->celda_p2_m;
        $lectura->celda_p2_n=$request->celda_p2_n;
        $lectura->celda_p2_o=$request->celda_p2_o;
        $lectura->celda_p2_p=$request->celda_p2_p;
        $lectura->celda_p2_q=$request->celda_p2_q;
        $lectura->celda_p2_r=$request->celda_p2_r;
        $lectura->celda_p2_s=$request->celda_p2_s;
        $lectura->celda_p2_t=$request->celda_p2_t;
        $lectura->celda_p2_u=$request->celda_p2_u;
        $lectura->celda_p2_v=$request->celda_p2_v;
        $lectura->celda_p2_w=$request->celda_p2_w;
        $lectura->celda_p2_x=$request->celda_p2_x;
        $lectura->celda_p2_y=$request->celda_p2_y;
        $lectura->celda_p2_z=$request->celda_p2_z;
        $lectura->celda_p2_aa=$request->celda_p2_aa;
        $lectura->celda_p2_ab=$request->celda_p2_ab;
        $lectura->celda_p2_ac=$request->celda_p2_ac;
        $lectura->celda_p2_ad=$request->celda_p2_ad;
        $lectura->celda_p2_ae=$request->celda_p2_ae;
        $lectura->celda_p2_af=$request->celda_p2_af;
        $lectura->celda_p2_ag=$request->celda_p2_ag;
        $lectura->celda_p2_ah=$request->celda_p2_ah;
        $lectura->celda_p2_ai=$request->celda_p2_ai;
        $lectura->celda_p2_aj=$request->celda_p2_aj;
        $lectura->celda_p3_a=$request->celda_p3_a;
        $lectura->celda_p3_b=$request->celda_p3_b;
        $lectura->celda_p3_c=$request->celda_p3_c;
        $lectura->celda_p3_d=$request->celda_p3_d;
        $lectura->celda_p3_e=$request->celda_p3_e;
        $lectura->celda_p3_f=$request->celda_p3_f;
        $lectura->celda_p3_g=$request->celda_p3_g;
        $lectura->celda_p3_h=$request->celda_p3_h;
        $lectura->celda_p3_i=$request->celda_p3_i;
        $lectura->celda_p3_j=$request->celda_p3_j;
        $lectura->celda_p3_k=$request->celda_p3_k;
        $lectura->celda_p3_l=$request->celda_p3_l;
        $lectura->celda_p3_m=$request->celda_p3_m;
        $lectura->celda_p3_n=$request->celda_p3_n;
        $lectura->celda_p3_o=$request->celda_p3_o;
        $lectura->celda_p3_p=$request->celda_p3_p;
        $lectura->celda_p3_q=$request->celda_p3_q;
        $lectura->celda_p3_r=$request->celda_p3_r;
        $lectura->celda_p3_s=$request->celda_p3_s;
        $lectura->celda_p3_t=$request->celda_p3_t;
        $lectura->celda_p3_u=$request->celda_p3_u;
        $lectura->celda_p3_v=$request->celda_p3_v;
        $lectura->celda_p3_w=$request->celda_p3_w;
        $lectura->celda_p3_x=$request->celda_p3_x;
        $lectura->celda_p3_y=$request->celda_p3_y;
        $lectura->celda_p3_z=$request->celda_p3_z;
        $lectura->celda_p3_aa=$request->celda_p3_aa;
        $lectura->celda_p3_ab=$request->celda_p3_ab;
        $lectura->celda_p3_ac=$request->celda_p3_ac;
        $lectura->celda_p3_ad=$request->celda_p3_ad;
        $lectura->celda_p3_ae=$request->celda_p3_ae;
        $lectura->celda_p3_af=$request->celda_p3_af;
        $lectura->celda_p3_ag=$request->celda_p3_ag;
        $lectura->celda_p3_ah=$request->celda_p3_ah;
        $lectura->celda_p3_ai=$request->celda_p3_ai;
        $lectura->celda_p3_aj=$request->celda_p3_aj;
        $lectura->manzana=$request->manzana;
        $lectura->lote=$request->lote;
        $lectura->imagen='';
        $lectura->periodo_inicio=$request->periodo_inicio;
        $lectura->periodo_fin=$request->periodo_fin;
        $lectura->urbanizacion_id=$request->urbanizacion_id;
        $lectura->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
