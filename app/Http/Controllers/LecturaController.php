<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use App\Models\Celda;
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
    public function buscar(Request $request)
    {
        //
        try {
            $lectura=Lectura::with('celdas')
            ->where('urbanizacion_id',$request->urbanizacion)
            ->where('manzana',strtoupper($request->manzana))
            ->where('lote',strtoupper($request->lote))
            ->where('periodo_inicio',$request->periodo_inicio)
            ->where('periodo_fin',$request->periodo_fin)
            ->get()->first();
            $lecturaAnterior=Lectura::with('celdas')
            ->where('urbanizacion_id',$request->urbanizacion)
            ->where('manzana',strtoupper($request->manzana))
            ->where('lote',strtoupper($request->lote))
            ->where('periodo_inicio',$request->periodo_inicio-2)
            ->where('periodo_fin',$request->periodo_fin-2)
            ->get()->first();
            $rpt=0;
            if($lectura)
                $rpt=1;
            if(!$lectura&&$lecturaAnterior)
                $rpt=2;
            return Response()->json(['rpt'=>$rpt,'lectura'=>$lectura,'lecturaAnterior'=>$lecturaAnterior]);

        } catch (\Throwable $th) {
            return Response()->json(['rpt'=>$th,'lectura'=>null,'lecturaAnterior'=>null]);

        }

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
        try {
            //code...
            $lectura=null;
            if($request->id==0){
                $lectura= Lectura::where('urbanizacion_id',$request->urbanizacion_id)
                            ->where('manzana',$request->manzana)
                            ->where('lote',$request->lote)
                            ->where('periodo_inicio',$request->periodo_inicio)
                            ->where('periodo_fin',$request->periodo_fin)->get()->first();
                if($lectura){
                $celdas1=Celda::where('lectura_id',$lectura->id)->delete();
                }
                elseif(!$lectura)
                    $lectura=new Lectura();

            }
            elseif($request->id>0)
                $lectura= Lectura::find($request->id);

            $lectura->manzana=$request->manzana;
            $lectura->lote=$request->lote;
            $lectura->imagen='';
            $lectura->periodo_inicio=$request->periodo_inicio;
            $lectura->periodo_fin=$request->periodo_fin;
            $lectura->urbanizacion_id=$request->urbanizacion_id;
            $lectura->codigo=substr($request->periodo_inicio, 2, 4).substr($request->periodo_fin, 2, 4).$request->urbanizacion_id.$request->manzana.$request->lote;
            $lectura->save();

            if($request->id>0){
                $celdas=Celda::where('lectura_id',$request->id)->delete();
            }
            foreach ($request->celdas as $key => $celda) {
                # code...
                $celdita= new Celda();
                $celdita->nombre=$celda['nombre'];
                $celdita->celda_a=$celda['celda_a']?$celda['celda_a']:'';
                $celdita->celda_b=$celda['celda_b']?$celda['celda_b']:'';
                $celdita->celda_c=$celda['celda_c']?$celda['celda_c']:'';
                $celdita->celda_d=$celda['celda_d']?$celda['celda_d']:'';
                $celdita->celda_e=$celda['celda_e']?$celda['celda_e']:'';
                $celdita->celda_f=$celda['celda_f']?$celda['celda_f']:'';
                $celdita->celda_g=$celda['celda_g']?$celda['celda_g']:'';
                $celdita->celda_h=$celda['celda_h']?$celda['celda_h']:'';
                $celdita->celda_i=$celda['celda_i']?$celda['celda_i']:'';
                $celdita->celda_j=$celda['celda_j']?$celda['celda_j']:'';
                $celdita->celda_k=$celda['celda_k']?$celda['celda_k']:'';
                $celdita->celda_l=$celda['celda_l']?$celda['celda_l']:'';
                $celdita->celda_m=$celda['celda_m']?$celda['celda_m']:'';
                $celdita->celda_n=$celda['celda_n']?$celda['celda_n']:'';
                $celdita->celda_o=$celda['celda_o']?$celda['celda_o']:'';
                $celdita->celda_p=$celda['celda_p']?$celda['celda_p']:'';
                $celdita->celda_q=$celda['celda_q']?$celda['celda_q']:'';
                $celdita->celda_r=$celda['celda_r']?$celda['celda_r']:'';
                $celdita->celda_s=$celda['celda_s']?$celda['celda_s']:'';
                $celdita->celda_t=$celda['celda_t']?$celda['celda_t']:'';
                $celdita->celda_u=$celda['celda_u']?$celda['celda_u']:'';
                $celdita->celda_v=$celda['celda_v']?$celda['celda_v']:'';
                $celdita->celda_w=$celda['celda_w']?$celda['celda_w']:'';
                $celdita->celda_x=$celda['celda_x']?$celda['celda_x']:'';
                $celdita->celda_y=$celda['celda_y']?$celda['celda_y']:'';
                $celdita->celda_z=$celda['celda_z']?$celda['celda_z']:'';
                $celdita->celda_aa=$celda['celda_aa']?$celda['celda_aa']:'';
                $celdita->celda_ab=$celda['celda_ab']?$celda['celda_ab']:'';
                $celdita->celda_ac=$celda['celda_ac']?$celda['celda_ac']:'';
                $celdita->celda_ad=$celda['celda_ad']?$celda['celda_ad']:'';
                $celdita->celda_ae=$celda['celda_ae']?$celda['celda_ae']:'';
                $celdita->celda_af=$celda['celda_af']?$celda['celda_af']:'';
                $celdita->celda_ag=$celda['celda_ag']?$celda['celda_ag']:'';
                $celdita->celda_ah=$celda['celda_ah']?$celda['celda_ah']:'';
                $celdita->celda_ai=$celda['celda_ai']?$celda['celda_ai']:'';
                $celdita->celda_aj=$celda['celda_aj']?$celda['celda_aj']:'';
                $celdita->lectura_id=$lectura->id;
                $celdita->save();
            }
            return '1';
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }

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
