<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 21:30
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends BaseModel
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'carrera';

    protected $fillable = [
        'usuario_solicitante_id',
        'conductor_id',
        'latitud_origen',
        'longitud_origen',
        'latitud_destino',
        'longitud_destino',
        'origen',
        'destino',
        'monto_estimado',
        'estado'
    ];

    protected static function boot()
    {
        parent::boot();
    }

    public function solicitante(){
        return $this->belongsTo(User::class,'usuario_solicitante_id');
    }

    public function conductor(){
        return $this->belongsTo(Conductor::class);
    }
}