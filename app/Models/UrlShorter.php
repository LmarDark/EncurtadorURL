<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShorter extends Model
{
    protected $table = 'urlshorter';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'url',
        'uri',
        'location',
        'created_at',
        'updated_at',
    ];

    /**
     * Os atributos que devem ser ocultados para arrays (por exemplo, ao converter para JSON).
     *
     * @var array
     */
    #protected $hidden = [
    	#'updated_at',
    #];

    /**
     * Os tipos de atributos para casting.
     *
     * EXEMPLO: echo $model->created_at->format('d/m/Y');
     * 
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];
}
