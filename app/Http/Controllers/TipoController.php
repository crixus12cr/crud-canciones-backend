<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Tipo::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $tipo = Tipo::create([
                'nombre' => $request['nombre'],
                'estado' => true
            ]);

            return response()->json([
                'status'=>'OK',
                'data'=> $tipo,
                'message'=> 'tipo de cancion creado correctamente'
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
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
        try {

            $consulta= Tipo::find($id);
            if(!$consulta){
                return response()->json([
                    'status'=>'ERROR',
                    'message'=>'El tipo de cancion no fue encontrado'
                ]);
            }
            return response()->json($consulta);

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }
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
        try{
            $consulta = Tipo::where([
                ['id', $id]
            ])
            ->first();
            if(!$consulta){
                return response()->json([
                    'status'=> 'ERROR',
                    'message'=> 'No se puede encontrar el tipo de cancion'
                ]);
            }
            $consulta->update([

                'nombre' => $request['nombre'],
                'estado' => $request['estado']

            ]);
            return response()->json([
                'status' => 'OK',
                'message'=> 'Se edito el tipo de cancion correctamente',
                'registro'=> $consulta
            ]);
        }catch(QueryException $e){
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
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
        try{
            $consulta = Tipo::where('id',$id)->first();
            if(!$consulta){
                return response()->json([
                    'status'=>'ERROR',
                    'message'=>'No se encontro el registro'
                ]);
            }
            $consulta->update([
                'estado' => false,
            ]);
            $consulta->delete();
            return response()->json([
                'status' => 'OK',
                'message'=>'Se ha eliminado el tipo el tipo de cancion correctamente',
                'registro'=>$consulta
            ]);
        }catch(QueryException $e){
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }
    }
}
