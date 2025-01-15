<?php
/**
 * Created by PhpStorm.
 * User: desarrollador
 * Date: 16/12/24
 * Time: 13:33
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comision extends BaseModel
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'comision';

    protected $fillable = [
        'conductor_id',
        'fecha_inicio',
        'fecha_fin',
        'monto',
    ];

    public function conductor(){
        return $this->belongsTo(Conductor::class);
    }

    public function getFechaInicioAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('America/La_Paz')->format('d/m/Y');
    }

    public function getFechaFinAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('America/La_Paz')->format('d/m/Y');
    }
}