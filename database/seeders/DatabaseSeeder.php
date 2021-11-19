<?php

namespace Database\Seeders;

use App\Models\Matrizes;
use App\Models\Modalidades;
use Database\Seeders\SeederBase;

class DatabaseSeeder extends SeederBase
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ModalidadesSeeder::class,
            ReferenciasSeeder::class,
            AtividadesSeeder::class,
            MatrizesSeeder::class,
        ]);
    }
}
