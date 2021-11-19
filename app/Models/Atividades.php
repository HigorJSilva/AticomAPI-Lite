<?php

namespace App\Models;


class Atividades extends ModelBase
{
    protected $table = 'atividades';

    protected $fillable = [
        'descricao',
        'certificado',
        'alunoId',
        'referenciaId',
        'presencial',
        'horasCertificado',
        'horasConsideradas',
        'feedback'
    ];

    protected $with =[
        'referencias',
        'aluno'
    ];

    public function referencias(){
        return $this->belongsTo(Referencias::class, 'referenciaId', 'id');
    }

    public function aluno(){
        return $this->belongsTo(User::class, 'alunoId', 'id');
    }
}
