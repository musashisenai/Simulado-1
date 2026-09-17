<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@senai.br',
            'password' => Hash::make('123'),
        ]);

        //Produto
        Produto::create([
            'nome' => 'Tinta Azul',
            'obs' => 'Balde de tinta de cor azul, com textura suave, podendo ser aplicada em diversas superfícies',
            'valor' => 50.90,
            'qtd_estoque' => 0,
            'qtd_minima' => 5
        ]);

        Produto::create([
            'nome' => 'Tinta Verde',
            'obs' => 'Balde de tinta de cor Verde, com textura suave, podendo ser aplicada em diversas superfícies',
            'valor' => 50.90,
            'qtd_estoque' => 0,
            'qtd_minima' => 5
        ]);

        Produto::create([
            'nome' => 'Argamassa',
            'obs' => 'Balde de Argamassa, com textura suave, podendo ser aplicada em diversas superfícies',
            'valor' => 50.90,
            'qtd_estoque' => 0,
            'qtd_minima' => 5
        ]);
    }
}
