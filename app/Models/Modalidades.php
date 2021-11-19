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

    public function atividadesReferencia(){
        return $this->hasMany(Referencias::class, 'modalidadeId');
    }
}
