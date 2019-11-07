<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class CorreosController extends Controller
{
    public function correoContacto(Request $request){
        
        $subject = request()->asunto;
        $for = "nueva3922@gmail.com";
        Mail::send('correos.contacto',request()->all(), function($msj) use($subject,$for){
            $msj->from(request()->correo, request()->nombre);
            $msj->subject($subject);
            $msj->to($for);
        });
        
        return response()->json(['correo enviado']);

        // return response()->json([request()->asunto]);
    }

    public function correoCotizacion(Request $request){
        
        $subject = "cotización de producto";
        $for = "nueva3922@gmail.com";
        Mail::send('correos.cotizacion',request()->all(), function($msj) use($subject,$for){
            $msj->from(request()->correo, request()->nombre);
            $msj->subject($subject);
            $msj->to($for);
        });
        
        return response()->json(['correo enviado']);
    }
}
