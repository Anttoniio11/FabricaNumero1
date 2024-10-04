<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'motivo', 'fecha'];
    // , 'id_user', 'id_tipo_transaccion'


    public function tipoTransaccion(){
        return $this->belongsTo(TipoTransaccion::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
