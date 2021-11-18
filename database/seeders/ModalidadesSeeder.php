<?php

namespace Database\Seeders;


class ModalidadesSeeder extends SeederBase
{
    protected $table = 'modalidades';
    protected $data = [
        ['id'=> '1', 'nome' => 'Módulo 1', 'cargaHorariaMax' => '70', 'cargaHorariaMin'=> '30'],
        ['id'=> '2', 'nome' => 'Módulo 2', 'cargaHorariaMax' => '50', 'cargaHorariaMin'=> '15'],
        ['id'=> '3', 'nome' => 'Módulo 3', 'cargaHorariaMax' => '50', 'cargaHorariaMin'=> '15'],
    ];
}
