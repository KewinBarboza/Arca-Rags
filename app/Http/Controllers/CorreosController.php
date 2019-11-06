<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class CorreosController extends Controller
{
    public function correoContacto(Request $request){
        
        $subject = request()->asunto;
        $for = "rags.aarca@gmail.com";
        Mail::send('email',request()->all(), function($msj) use($subject,$for){
            $msj->from(request()->correo,request()->nombre);
            $msj->subject($subject);
            $msj->to($for);
        });
        
        return response()->json(['correo enviado']);
    }

    public function correoCotizacion(Request $request){
        
        return response()->json([request()->all()]);
    }
}
