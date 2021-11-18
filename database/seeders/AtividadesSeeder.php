<?php

namespace Database\Seeders;


class AtividadesSeeder extends SeederBase
{
    protected $table = 'atividades';
    protected $data = [
        ['id'=> '1', 'descricao' => 'Nacional: exceto as indicadas', 'certificado' => '1', 'referenciaId'=> '1', 'presencial' => true, 'horasCertificado' => 30, 'horasConsideradas'=> 30, 'feedback' => 'ta bastante errado tudo que você fez aí', ],
    ];
}
