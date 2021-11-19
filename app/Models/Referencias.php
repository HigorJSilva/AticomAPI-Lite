<?php

namespace App\Models;


class Referencias extends ModelBase
{
    protected $table = 'referencias';

    protected $fillable = [
        'descricao',
        'modalidadeId',
    ];

    protected $with = [
        'modalidade'
    ];

    public function atividades(){
        return $this->hasMany(Atividades::class, 'referenciaId', 'id');
    }

    public function modalidade(){
        return $this->belongsTo(Modalidades::class, 'modalidadeId', 'id');
    }
}
