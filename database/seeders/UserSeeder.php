<?php

namespace Database\Seeders;


class UserSeeder extends SeederBase
{
    protected $table = 'users';
    protected $data = [
        [ 'nome' => 'Higor Silva','email' => 'higor@gmail.com', 'senha' => '123456', 
            'cpf' => '31507726058', 'matrizId' => 1, 'role' => true, 'isPendente' => true, 'isCompleto' => true
        ]
    ];
}
