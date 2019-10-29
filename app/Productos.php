<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public function categoria(){
        return $this->belongsTo('App\Categorias','id_categoria');
    }

    public function imagen(){
        return $this->hasMany('App\Imagen','id_imagen');
    }
}
