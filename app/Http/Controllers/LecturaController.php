<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use App\Models\Celda;
use App\Models\Espacio;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

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

            $lectura->manzana=strtoupper($request->manzana);
            $lectura->lote=strtoupper($request->lote);
            $lectura->imagen='';
            $lectura->periodo_inicio=$request->periodo_inicio;
            $lectura->periodo_fin=$request->periodo_fin;
            $lectura->urbanizacion_id=$request->urbanizacion_id;
            $lectura->codigo=strtoupper($request->urbanizacion_id.$request->manzana.$request->lote);
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
            // guardamos el pdf con las lectura
            $espacio=Espacio::all();
            $espacios=[];
            foreach ($espacio as $key => $value) {
                # code...
                $espacios[$value->id]=$value->color;
            }
            // return $espacios;
            $pdf_doc = \PDF::loadView('export_pdf', ['espacios'=>$espacios,'lectura'=>$lectura]);
            // return $pdf_doc->download('pdf.pdf');
            $filename='lectura_'.$lectura->id.'.pdf';
            // Storage::put($filename, $pdf_doc->output());

            Storage::disk('lecturas')->put($filename,$pdf_doc->output());
            //guardamos en formato jpej
            $pathToPdf=Storage::disk('lecturas')->path('/').$filename;
            $pathToWhereImageShouldBeStored=Storage::disk('lecturas')->path('/').'lectura_'.$lectura->id;
            $pdf = new \Spatie\PdfToImage\Pdf($pathToPdf);
            $pdf->setOutputFormat('jpeg')
                ->saveImage($pathToWhereImageShouldBeStored);

            $img = Image::make($pathToWhereImageShouldBeStored.'.jpeg');
            // crop image
            $img->crop(1000, 400, 50, 80);
            // $img->resize(230, 125);
            $img->save($pathToWhereImageShouldBeStored.'.jpeg');
            Storage::disk('lecturas')->delete($filename);
            $lectura->imagen='lectura_'.$lectura->id.'.jpeg';
            $lectura->save();
            return response()->json(['messaje'=>'1','codigo'=>$lectura->codigo]) ;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }

    }
    public function reporte_lecturas_api(){
        $lecturas=Lectura::with('urbanizacion','celdas')->get();
        $espacios=Espacio::get();
        // return $espacios;
        // return $lecturas;
        // $arreglo=Array('Urbanizacion','Manzana','Lote','Codigo','Año','Sala/comedor','Cocina','Dormitorio','Baño','Otro(techado)');
        foreach ($lecturas as $key => $lectura) {
            $arreglo['urbanizacion'][]=$lectura->urbanizacion->nombre;
            $arreglo['manzana'][]=$lectura->manzana;
            $arreglo['lote'][]=$lectura->lote;
            $arreglo['codigo'][]=$lectura->codigo;
            $arreglo['anio'][]=$lectura->periodo_inicio.'-'.$lectura->periodo_fin;
            foreach ($espacios as $key2 => $espacio) {
                $salsa_comedor='';
                foreach ($lectura->celdas as $key1 => $celda) {
                    // return  strval($espacio->id);
                $salsa_comedor.=$celda->celda_a==$espacio->id?'P'.($key1+1).'_celdaA,':'';
                $salsa_comedor.=$celda->celda_b==$espacio->id?'P'.($key1+1).'_celdaB,':'';
                $salsa_comedor.=$celda->celda_c==$espacio->id?'P'.($key1+1).'_celdaC,':'';
                $salsa_comedor.=$celda->celda_d==$espacio->id?'P'.($key1+1).'_celdaD,':'';
                $salsa_comedor.=$celda->celda_e==$espacio->id?'P'.($key1+1).'_celdaE,':'';
                $salsa_comedor.=$celda->celda_f==$espacio->id?'P'.($key1+1).'_celdaF,':'';
                $salsa_comedor.=$celda->celda_g==$espacio->id?'P'.($key1+1).'_celdaG,':'';
                $salsa_comedor.=$celda->celda_h==$espacio->id?'P'.($key1+1).'_celdaH,':'';
                $salsa_comedor.=$celda->celda_i==$espacio->id?'P'.($key1+1).'_celdaI,':'';
                $salsa_comedor.=$celda->celda_j==$espacio->id?'P'.($key1+1).'_celdaJ,':'';
                $salsa_comedor.=$celda->celda_k==$espacio->id?'P'.($key1+1).'_celdaK,':'';
                $salsa_comedor.=$celda->celda_l==$espacio->id?'P'.($key1+1).'_celdaL,':'';
                $salsa_comedor.=$celda->celda_m==$espacio->id?'P'.($key1+1).'_celdaM,':'';
                $salsa_comedor.=$celda->celda_n==$espacio->id?'P'.($key1+1).'_celdaN,':'';
                $salsa_comedor.=$celda->celda_o==$espacio->id?'P'.($key1+1).'_celdaO,':'';
                $salsa_comedor.=$celda->celda_p==$espacio->id?'P'.($key1+1).'_celdaP,':'';
                $salsa_comedor.=$celda->celda_q==$espacio->id?'P'.($key1+1).'_celdaQ,':'';
                $salsa_comedor.=$celda->celda_r==$espacio->id?'P'.($key1+1).'_celdaR,':'';
                $salsa_comedor.=$celda->celda_s==$espacio->id?'P'.($key1+1).'_celdaS,':'';
                $salsa_comedor.=$celda->celda_t==$espacio->id?'P'.($key1+1).'_celdaT,':'';
                $salsa_comedor.=$celda->celda_u==$espacio->id?'P'.($key1+1).'_celdaU,':'';
                $salsa_comedor.=$celda->celda_v==$espacio->id?'P'.($key1+1).'_celdaV,':'';
                $salsa_comedor.=$celda->celda_w==$espacio->id?'P'.($key1+1).'_celdaW,':'';
                $salsa_comedor.=$celda->celda_x==$espacio->id?'P'.($key1+1).'_celdaX,':'';
                $salsa_comedor.=$celda->celda_y==$espacio->id?'P'.($key1+1).'_celdaY,':'';
                $salsa_comedor.=$celda->celda_z==$espacio->id?'P'.($key1+1).'_celdaZ,':'';
                $salsa_comedor.=$celda->celda_aa==$espacio->id?'P'.($key1+1).'_celdaAA,':'';
                $salsa_comedor.=$celda->celda_ab==$espacio->id?'P'.($key1+1).'_celdaAB,':'';
                $salsa_comedor.=$celda->celda_ac==$espacio->id?'P'.($key1+1).'_celdaAC,':'';
                $salsa_comedor.=$celda->celda_ad==$espacio->id?'P'.($key1+1).'_celdaAD,':'';
                $salsa_comedor.=$celda->celda_ae==$espacio->id?'P'.($key1+1).'_celdaAE,':'';
                $salsa_comedor.=$celda->celda_af==$espacio->id?'P'.($key1+1).'_celdaAF,':'';
                $salsa_comedor.=$celda->celda_ag==$espacio->id?'P'.($key1+1).'_celdaAG,':'';
                $salsa_comedor.=$celda->celda_ah==$espacio->id?'P'.($key1+1).'_celdaAH,':'';
                $salsa_comedor.=$celda->celda_ai==$espacio->id?'P'.($key1+1).'_celdaAI,':'';
                $salsa_comedor.=$celda->celda_aj==$espacio->id?'P'.($key1+1).'_celdaAJ,':'';
                }
                $arreglo[strval($espacio->id)][]=$salsa_comedor;
            }


        }
        return json_encode($arreglo);
        // return $arreglo;
    }
    public function reporte_lecturas_api_anios(){
        $lecturas=Lectura::get()->groupBy('periodo_fin');
        // $lecturas=Lectura::get();
    // return $lecturas;

        $arreglo=[];
        foreach ($lecturas as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if(array_key_exists($key,$arreglo)){
                    $arreglo[$key][$value1->codigo]=$value1->id;
                }
                else{
                    $arreglo[$key]= array($value1->codigo=>$value1->id);

                }
            }

        }
        ksort($arreglo);
        $arregloSort=[];
        $casas=Lectura::select('codigo')->distinct()->get();
        //return $casas;
        foreach ($casas as $key2 => $casa) {
            foreach ($arreglo as $key => $value) {

                if(!array_key_exists($casa->codigo,$value)){

                    $arreglo[$key][$casa->codigo]='';
                }
                // ksort($value);
                // $arregloSort[$key]=$value;
            }
        }
        foreach ($arreglo as $key => $value) {
            ksort($value);
            $arregloSort[$key]=$value;
        }

        return $arregloSort;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reporte_lecturas()
    {
        //

        return view('show');
    }
    public function reporte_lecturas_anios()
    {
        //

        return view('show-anios');
    }
    public function reporte_lecturas_anios_imagen($id)
    {
        $lectura=Lectura::find($id);
        $file = Storage::disk('lecturas')->get($lectura->imagen);
        return response($file, 200);
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
