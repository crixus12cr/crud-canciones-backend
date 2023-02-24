<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cancion::with('categoria')->get());
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

            $tipo = Cancion::create([
                'nombre' => $request['nombre'],
                'estado' => true,
                'categoria_id' => $request['categoria_id']
            ]);

            return response()->json([
                'status'=>'OK',
                'data'=> $tipo,
                'message'=> 'Cancion creada correctamente'
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

            $consulta = Cancion::find($id);
            if(!$consulta){
                return response()->json([
                    'status'=>'ERROR',
                    'message'=>'La cancion no fue encontrada'
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
            $consulta = Cancion::where([
                ['id', $id]
            ])
            ->first();
            if(!$consulta){
                return response()->json([
                    'status'=> 'ERROR',
                    'message'=> 'No se puede encontrar la cancion'
                ]);
            }
            $consulta->update([

                'nombre' => $request['nombre'],
                'estado' => $request['estado'],
                'categoria_id' => $request['categoria_id']

            ]);
            return response()->json([
                'status' => 'OK',
                'message'=> 'Se edito la cancion correctamente',
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
            $consulta = Cancion::where('id',$id)->first();
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
                'message'=>'Se ha eliminado la cancion correctamente',
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
