<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\User;
use \App\Models\Evento;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'tipo' => 'administrador',
            ]
        );
        User::create([
            'name' => 'Organizador',
            'email' => 'organizador@example.com',
            'password' => bcrypt('password'),
            'tipo' => 'organizador',
        ]);

        User::create([
            'name' => 'Inscrito Um',
            'email' => 'inscrito1@example.com',
            'password' => bcrypt('password'),
            'tipo' => 'inscrito',
        ]);

        User::create([
            'name' => 'Inscrito Dois',
            'email' => 'inscrito2@example.com',
            'password' => bcrypt('password'),
            'tipo' => 'inscrito',
        ]);

        $organizador = User::where('email', 'organizador@example.com')->first();

        Evento::create([
            'titulo' => 'Evento de Tecnologia',
            'descricao' => 'Um evento sobre tecnologia.',
            'categoria' => 'Tecnologia',
            'imagem' => 'eventos/01JTXP86108WJBP059ERNSZYBF.webp',
            'data' => now()->addDays(10),
            'localizacao' => 'São Paulo',
            'capacidade' => 100,
            'preco' => 50.00,
            'organizador_id' => $organizador->id,
        ]);

        Evento::create([
            'titulo' => 'Festival de Cultura',
            'descricao' => 'Celebração da cultura local.',
            'categoria' => 'Artes',
            'imagem' => 'eventos/evento_futebol.webp',
            'data' => now()->addDays(20),
            'localizacao' => 'Rio de Janeiro',
            'capacidade' => 200,
            'preco' => 30.00,
            'organizador_id' => $organizador->id,
        ]);

        Evento::create([
            'titulo' => 'Show de Música',
            'descricao' => 'Concerto ao vivo com várias bandas.',
            'categoria' => 'Música',
            'imagem' => 'eventos/evento_rockInRio.jpg',
            'data' => now()->addDays(30),
            'localizacao' => 'Belo Horizonte',
            'capacidade' => 150,
            'preco' => 40.00,
            'organizador_id' => $organizador->id,
        ]);
    }
}
