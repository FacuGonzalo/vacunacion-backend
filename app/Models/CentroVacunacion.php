<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroVacunacion extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'center_name',
        'center_adress',
        'center_phone',
        'center_area',
        'center_timetable',
        'latitud',
        'longitud',
    ];

}
