<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Productos;
use App\Imagen;

class ImagenController extends Controller
{

    public function index(Request $request){
        return Imagen::all();
    }

    public function store(Request $request){

        $this->validate(request(),[
            'imagen' => 'required|image|max:2048'
        ]);

        if(request()->file('imagen')){
            $path = Storage::disk('public')->put('imagen',request()->file('imagen'));
            $urlImagen = $path;
        }
        
        $imagen = new Imagen();
        $imagen->url = $urlImagen;
        $imagen->id_producto =  $request->id_producto;
        $imagen->estado = true;
        $imagen->save();

        return $imagen;
    }

    public function destroy($id){
        
        $imagen = Imagen::find($id);
        Storage::disk('public')->delete($imagen->url);
        $imagen->delete();

        return $imagen;
    }
}
