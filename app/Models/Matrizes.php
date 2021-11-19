<?php

namespace App\Models;


class Matrizes extends ModelBase
{
    protected $table = 'users';

    protected $fillable = [
        'ano',
        'cargaHoraria',
    ];

    public function users(){
        return $this->hasMany(User::class, 'id');
    }
    
}
