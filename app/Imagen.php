<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public function producto(){
        return $this->belongsTo('App\Productos','id_producto');
    }
}
