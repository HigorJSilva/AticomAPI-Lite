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
        $teste = $this->hasMany(Referencias::class, 'modalidadeId', 'id');
        return  $teste;
    }
}
