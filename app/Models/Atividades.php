<?php

namespace App\Models;


class Atividades extends ModelBase
{
    protected $table = 'atividades';

    protected $fillable = [
        'descricao',
        'certificado',
        'modalidade',
        'referenciaId',
        'presencial',
        'horasCertificado',
        'horasConsideradas',
        'feedback'
    ];

    protected $with =[
        'referencias'
    ];

    public function referencias(){
        return $this->belongsTo(Referencias::class, 'referenciaId', 'id');
    }
}
