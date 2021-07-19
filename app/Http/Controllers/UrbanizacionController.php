<?php

namespace App\Http\Controllers;

use App\Models\Urbanizacion;
use Illuminate\Http\Request;

class UrbanizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('urbanizacion.index');
    }
    public function index_api()
    {
        //
        return Urbanizacion::all();
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
        try {
            $nombre=strtoupper($request->nombre);
            $busqueda=Urbanizacion::where('nombre',$nombre)->get()->first();
            if($busqueda){
                return response()->json(['status'=>'-1','message'=>'Esta urbanización ya existe']);
            }
            $urb=new Urbanizacion();
            $urb->nombre=$nombre;
            if($urb->save())
                return response()->json(['status'=>1,'message'=>'Guardado con exito']);
            else
                return response()->json(['status'=>0,'message'=>'Erro al guardar']);

        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['status'=>0,'message'=>$th]);
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
        try {
            $nombre=strtoupper($request->nombre);
            $urb=Urbanizacion::findorfail($id);
            $urb->nombre=$nombre;
            if($urb->save())
                return response()->json(['status'=>1,'message'=>'Guardado con exito']);
            else
                return response()->json(['status'=>0,'message'=>'Erro al guardar']);

        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['status'=>0,'message'=>$th]);
        }
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
        try {
            $urb=Urbanizacion::findorfail($id);
            if($urb->delete())
                return response()->json(['status'=>1,'message'=>'Borrado con exito']);
            else
                return response()->json(['status'=>0,'message'=>'Erro al Borrar']);

        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['status'=>0,'message'=>$th]);
        }
    }
}
