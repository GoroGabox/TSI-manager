<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estudiantesRut = [
            "10932457-4",
            "56789123-1",
            "98765432-0",
            "74125896-3",
            "36985214-2",
            "95175362-9",
            "24681357-5",
            "80808080-8",
            "12345678-6",
            "11111111-1"
        ];

        foreach ($estudiantesRut as $rut) {
            for ($i = 0; $i < 3; $i++) {
                DB::table('propuestas')->insert([
                    'fecha' => now(),
                    'documento' => 'documento',
                    'estado' => 0,
                    'estudiante_rut' => $rut
                ]);
            }
        }
    }
}
