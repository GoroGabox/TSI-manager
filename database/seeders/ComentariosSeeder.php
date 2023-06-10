<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = [
            ["rut" => "10932457-4", "nombre" => "Bruce", "apellido" => "Challinor"],
            ["rut" => "56789123-1", "nombre" => "Alice", "apellido" => "Smith"],
            ["rut" => "98765432-0", "nombre" => "John", "apellido" => "Doe"],
            ["rut" => "74125896-3", "nombre" => "Emma", "apellido" => "Johnson"],
            ["rut" => "36985214-2", "nombre" => "Michael", "apellido" => "Williams"],
            ["rut" => "95175362-9", "nombre" => "Olivia", "apellido" => "Brown"],
            ["rut" => "24681357-5", "nombre" => "James", "apellido" => "Davis"],
            ["rut" => "80808080-8", "nombre" => "Sophia", "apellido" => "Miller"],
            ["rut" => "12345678-6", "nombre" => "Liam", "apellido" => "Wilson"],
            ["rut" => "11111111-1", "nombre" => "Ava", "apellido" => "Taylor"],
        ];

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

        foreach ($profesores as $profesor) {
            foreach ($estudiantesRut as $rut) {
                DB::table('propuestas')->insert([
                    'propuesta_id' => uniqid(),
                    'profesor_rut' => $profesor['rut'],
                    'fecha' => now()->format('Y-m-d'),
                    'hora' => now()->format('H:i:s'),
                    'comentario' => 'Comentario de ejemplo'
                ]);
            }
        }
    }
}
