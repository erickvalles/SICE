<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $timestamps = false;
    protected $table = "persona";
    protected $primaryKey = "codigo";
    public $incrementing = false;

    protected $fillable = [
        'codigo',
        'apaterno',
        'amaterno',
        'nombre',
        'tipo',
        'fotografia',
        'fec_nac',
        'sexo'
    ];

    public function setApaternoAttribute($value)
    {
        return $this->attributes['apaterno'] = strtoupper($value);
    }

    public function setAmaternoAttribute($value)
    {
        return $this->attributes['amaterno'] = strtoupper($value);
    }

    public function setNombreAttribute($value)
    {
        return $this->attributes['nombre'] = strtoupper($value);
    }

    public function setFecnacAttribute($value)
    {
        return $this->attributes['fec_nac'] = Carbon::make($value)->format('Y-m-d');
    }

    public function getApaternoAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function getAmaternoAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function getNombreAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function getFecnacAttribute($value)
    {
        return Carbon::make($value)->format('d/m/Y');
    }

    public function getFullNameAttribute()
    {
        return $this->apaterno.' '.$this->amaterno.' '.$this->nombre;
    }

    public function personalData()
    {
        return $this->hasOne(PersonalData::class, 'persona_codigo', 'codigo');
    }

    public static function getTipos()
    {
        return [
            '' => 'Seleccione una opción...',
            '1' => 'Estudiante',
            '2' => 'Académico',
            '3' => 'Administrativo'
        ];
    }

    public static function getSexos()
    {
        return [
            '' => 'Seleccione una opción...',
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer',
        ];
    }

    public function getTipoName()
    {
        switch ($this->tipo) {
            case '1':
                return 'Estudiante';
                break;
            case '2':
                return 'Académico';
                break;
            case '3':
                return 'Administrativo';
                break;
            default:
                return 'Tipo no definido';
        }
    }
}
