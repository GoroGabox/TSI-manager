<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estudiantes')->insert([
            ["rut" => "10932457-4", "nombre" => "Bruce", "apellido" => "Challinor", "email" => "example@usm.cl"],
            ["rut" => "56789123-1", "nombre" => "Alice", "apellido" => "Smith", "email" => "alice@example.com"],
            ["rut" => "98765432-0", "nombre" => "John", "apellido" => "Doe", "email" => "john@example.com"],
            ["rut" => "74125896-3", "nombre" => "Emma", "apellido" => "Johnson", "email" => "emma@example.com"],
            ["rut" => "36985214-2", "nombre" => "Michael", "apellido" => "Williams", "email" => "michael@example.com"],
            ["rut" => "95175362-9", "nombre" => "Olivia", "apellido" => "Brown", "email" => "olivia@example.com"],
            ["rut" => "24681357-5", "nombre" => "James", "apellido" => "Davis", "email" => "james@example.com"],
            ["rut" => "80808080-8", "nombre" => "Sophia", "apellido" => "Miller", "email" => "sophia@example.com"],
            ["rut" => "12345678-6", "nombre" => "Liam", "apellido" => "Wilson", "email" => "liam@example.com"],
            ["rut" => "11111111-1", "nombre" => "Ava", "apellido" => "Taylor", "email" => "ava@example.com"],
        ]);
    }
}