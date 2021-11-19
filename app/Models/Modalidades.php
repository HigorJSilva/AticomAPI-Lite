<?php

namespace App\Models;


class Modalidades extends ModelBase
{
    protected $table = 'Modalidades';

    protected $fillable = [
        'nome',
        'cargaHorariaMax',
        'cargaHorariaMin',
    ];

    public $guardFromUpdate = [
        'nome'
    ];

    public function referencias()
    {
        return  $this->hasMany(Referencias::class, 'modalidadeId', 'id');
    }
}
