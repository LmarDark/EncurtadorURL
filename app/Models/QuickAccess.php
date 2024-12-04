<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickAccess extends Model
{
    protected $table = 'quickaccess';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'background',
        'img',
        'nome',
        'descricao',
        'uri',
        'redes',
        'labels',
        'created_at',
        'updated_at',
    ];

    /*protected $hidden = [
        'created_at',
        'updated_at',
    ];*/

    /**
     * Os tipos de atributos para casting.
     * 
     * EXEMPLO: echo $model->created_at->format('d/m/Y');
     * 
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
