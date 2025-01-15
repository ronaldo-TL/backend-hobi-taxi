<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 13:01
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conductor extends  BaseModel
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'conductor';

    protected $fillable = [
        'usuario_id',
        //'marca_id',
        'celular',
        'direccion_residencial',
        'marca',
        'modelo',
        'estado',
        'placa',
        'color',
        'ruta_imagen_foto',
        'ruta_imagen_licencia',
    ];

    protected static function boot()
    {
        parent::boot();
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

}