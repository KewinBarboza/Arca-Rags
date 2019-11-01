<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // if($request->ajax()){
        //     return Productos::where('id', auth()->id())->get();
        // }else{
        //     return view('home');
        // }
        
        return Productos::with(['categoria','imagen'])->get();
    }

    public function show($id){

        if (request()->wantsJson()) {
            $producto = Productos::find($id)->with(['categoria','imagen'])->get();
           
            return $producto;
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
