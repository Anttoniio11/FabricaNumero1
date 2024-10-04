<?php

namespace Database\Seeders;

use App\Models\TipoTransaccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoTransaccion::create([
            'tipo_transaccion' => 'EGRESOS',
        ]);

        TipoTransaccion::create([
            'tipo_transaccion' => 'INGRESOS',
        ]);
    }
}
