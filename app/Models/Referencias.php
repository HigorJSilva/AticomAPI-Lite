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
        'modalidades'
    ];

    public function atividades(){
        return $this->hasMany(Atividades::class, 'referenciaId', 'id');
    }

    public function modalidades(){
        return $this->belongsTo(Modalidades::class, 'modalidadeId', 'id');
    }
}
