<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use Illuminate\Support\Facades\Storage;

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
        
        return Productos::all();
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
        if($request->file('imagen')){
            $path = Storage::disk('public')->put('imagen', $request->file('imagen'));
            $urlImagen = asset($path);
        }
        // $imagen = request()->file('imagen');
        // $urlImagen = $imagen->store('imagen');

        $productos = new Productos();
        $productos->nombre = $request->nombre;
        $productos->modelo = $request->modelo;
        $productos->talla = $request->talla;
        $productos->tela = $request->tela;
        $productos->descripcion = $request->descripcion;
        $productos->id_categoria = $request->categoria;
        $productos->imagen = $urlImagen;
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
        // if($request->file('imagen')){
        //     $path = Storage::disk('public')->put('imagen', $request->file('imagen'));
        //     $urlImagen = asset($path);
        // }
        
        if ($request->hasFile('imagen')){
            $archivoFoto=$request->file('imagen');
            $nombreFoto=time().$archivoFoto->getClientOriginalName(); 
            $archivoFoto->move(public_path().'/images/', $nombreFoto);
          }
 

        $productos = Productos::find($id);
        $productos->nombre = 'hola';
        $productos->talla = 'prueba';
        $productos->tela = 'prueba';
        $productos->modelo = 'prueba';
        $productos->descripcion = 'prueba';
        $productos->id_categoria = '1';

        
        $productos->imagen = $nombreFoto;
        $productos->save();

        return ;
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
    }
}
