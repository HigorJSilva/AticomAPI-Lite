<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBase extends Model
{
    public $guardFromUpdate = [
        'id',
    ];

    public $hidden= [
        "created_at",
        "updated_at",
    ];

    public $queryFilters = [
        'and' => [
        ],
    ];
}
