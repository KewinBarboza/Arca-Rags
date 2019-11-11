<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Response;
use App\Productos;
use App\Imagen;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->wantsJson()) {
            $productos =  Productos::latest('id')->with(['categoria','imagen'])->paginate(8);
            return Response::json($productos);
            // return Productos::latest('id')->with(['categoria','imagen'])->get();
        }else{
            return view('home');
        }
    }

    public function show($id){

        if (request()->wantsJson()) {

            $producto = Productos::where('id',$id)->with(['categoria','imagen'])->get();
            return $producto;
            
        }
    }

    public function obtenerProductos(Request $request){

        return Productos::latest('id')->with(['categoria','imagen'])->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre' => 'required|max:255',
            'modelo' => 'required|max:255',
            'talla' => 'required|max:255',
            'tela' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'categoria' => 'required|max:255',
        ]);

        $productos = new Productos();
        $productos->nombre = $request->nombre;
        $productos->modelo = $request->modelo;
        $productos->talla = $request->talla;
        $productos->tela = $request->tela;
        $productos->descripcion = $request->descripcion;
        $productos->id_categoria = $request->categoria;
        $productos->save();
        
        return $productos;
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
        $this->validate(request(),[
            'nombre' => 'required|max:255',
            'modelo' => 'required|max:255',
            'talla' => 'required|max:255',
            'tela' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'categoria' => 'required|max:255',
        ]);
        
        $productos = Productos::find($id);

        $productos->nombre = $request->nombre;
        $productos->modelo = $request->modelo;
        $productos->talla = $request->talla;
        $productos->tela = $request->tela;
        $productos->descripcion = $request->descripcion;
        $productos->id_categoria = $request->categoria;
        $productos->save();

        return $productos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();

        return 'producto eliminado con éxito';
    }
}
