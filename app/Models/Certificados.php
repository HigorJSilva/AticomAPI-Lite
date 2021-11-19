<?php

namespace App\Models;


class Certificados extends ModelBase
{
    protected $table = 'certificados';

    protected $fillable = [
        'alunoId',
        'atividadeId',
        'caminho'
    ];

    protected $with =[
        'atividade',
        'aluno'
    ];

    public function atividade(){
        return $this->belongsTo(Atividades::class, 'atividadeId', 'id');
    }

    public function aluno(){
        return $this->belongsTo(User::class, 'alunoId', 'id');
    }
}
