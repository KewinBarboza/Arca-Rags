<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use Illuminate\Support\Facades\Storage;
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
        
        return Productos::with('categoria')->get();
        // return Productos::orderBy('id','DESC')->paginate();
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
        $productos = Productos::find($id);

        $productos->nombre       = $request->nombre;
        $productos->modelo       = $request->modelo;
        $productos->talla        = $request->talla;
        $productos->tela         = $request->tela;
        $productos->descripcion  = $request->descripcion;
        $productos->id_categoria = $request->categoria;


        if ($request->imagen == $productos->imagen) {
            $productos->imagen = $request->imagen;

        }else {
            if($request->file('imagen')){
                $path = Storage::disk('public')->put('imagen', $request->file('imagen'));
                $urlImagen = asset($path);
            }

            if (is_file($productos->imagen)) {
                Storage::disk('public')->delete($productos->imagen);
            }

            $productos->imagen = $urlImagen;


        }

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

        if (is_file($producto->imagen)) {

            Storage::disk('public')->delete($producto->imagen);
            $producto->delete();
            return 'producto eliminado con éxito';
        }
        else
        {
            return 'este archivo no existe';
        }

    }
}
