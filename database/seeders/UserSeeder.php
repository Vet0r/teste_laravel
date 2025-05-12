<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Evento;


class UserSeeder extends Seeder
{
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

        $organizador1 = User::create([
            'name' => 'Organizador Um',
            'email' => 'organizador1@example.com',
            'password' => bcrypt('password'),
            'tipo' => 'organizador',
        ]);

        $organizador2 = User::create([
            'name' => 'Organizador Dois',
            'email' => 'organizador2@example.com',
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

        Evento::create([
            'titulo' => 'Tech Summit Brasil',
            'descricao' => 'O maior encontro de inovação e tecnologia do país.',
            'categoria' => 'Tecnologia',
            'data' => now()->addDays(10),
            'localizacao' => 'São Paulo',
            'capacidade' => 100,
            'preco' => 50.00,
            'organizador_id' => $organizador1->id,
            'imagem' => '/eventos/01JTXP86108WJBP059ERNSZYBF.webp',
        ]);
        Evento::create([
            'titulo' => 'Futuro Digital Expo',
            'descricao' => 'Exposição de tendências digitais e startups.',
            'categoria' => 'Tecnologia',
            'data' => now()->addDays(15),
            'localizacao' => 'Campinas',
            'capacidade' => 120,
            'preco' => 60.00,
            'organizador_id' => $organizador2->id,
            'imagem' => '/eventos/01JV0Q1DXFH8GEZQJTPK8QE92J.jpg',
        ]);

        Evento::create([
            'titulo' => 'Bienal das Cores',
            'descricao' => 'Mostra de arte contemporânea com artistas nacionais.',
            'categoria' => 'Artes',
            'data' => now()->addDays(20),
            'localizacao' => 'Rio de Janeiro',
            'capacidade' => 200,
            'preco' => 30.00,
            'organizador_id' => $organizador1->id,
            'imagem' => '/eventos/01JV0Q2S2GPZG6D9R1MJR4NTNE.webp',
        ]);
        Evento::create([
            'titulo' => 'Encontro de Escultores',
            'descricao' => 'Workshop e exposição de esculturas urbanas.',
            'categoria' => 'Artes',
            'data' => now()->addDays(25),
            'localizacao' => 'Niterói',
            'capacidade' => 180,
            'preco' => 35.00,
            'organizador_id' => $organizador2->id,
            'imagem' => '/eventos/01JV0Q3VW4E7J2CZE3E9NAY5DY.jpg',
        ]);

        Evento::create([
            'titulo' => 'Festival Som das Ruas',
            'descricao' => 'Festival de música independente e cultura urbana.',
            'categoria' => 'Música',
            'data' => now()->addDays(30),
            'localizacao' => 'Belo Horizonte',
            'capacidade' => 150,
            'preco' => 40.00,
            'organizador_id' => $organizador1->id,
            'imagem' => '/eventos/01JV0Q6B2349BR0AY34TP999WH.png',
        ]);
        Evento::create([
            'titulo' => 'Noite do Jazz & Blues',
            'descricao' => 'Uma noite especial com grandes nomes do jazz e blues.',
            'categoria' => 'Música',
            'data' => now()->addDays(35),
            'localizacao' => 'Uberlândia',
            'capacidade' => 160,
            'preco' => 45.00,
            'organizador_id' => $organizador2->id,
            'imagem' => '/eventos/01JV0Q7RJRA06P8SFG78ZPBAYE.jpeg',
        ]);

        Evento::create([
            'titulo' => 'Sabores do Brasil',
            'descricao' => 'Festival gastronômico com pratos típicos de todas as regiões.',
            'categoria' => 'Comida',
            'data' => now()->addDays(40),
            'localizacao' => 'Salvador',
            'capacidade' => 250,
            'preco' => 25.00,
            'organizador_id' => $organizador1->id,
            'imagem' => '/eventos/01JV0Q8TTYRD63KR9Q91H1FXHS.webp',
        ]);
        Evento::create([
            'titulo' => 'Feira Gourmet de Verão',
            'descricao' => 'Degustação de comidas artesanais e food trucks.',
            'categoria' => 'Comida',
            'data' => now()->addDays(45),
            'localizacao' => 'Recife',
            'capacidade' => 220,
            'preco' => 28.00,
            'organizador_id' => $organizador2->id,
            'imagem' => '/eventos/01JV0QABG03E5HH3GDJ5TZTJ2A.jpg',
        ]);

        Evento::create([
            'titulo' => 'Conexão Empreendedora',
            'descricao' => 'Networking e palestras para novos negócios.',
            'categoria' => 'Negócios',
            'data' => now()->addDays(50),
            'localizacao' => 'Curitiba',
            'capacidade' => 300,
            'preco' => 80.00,
            'organizador_id' => $organizador1->id,
            'imagem' => '/eventos/01JV0QCBEV6KHJRA2T5E4ZYE3V.png',
        ]);
        Evento::create([
            'titulo' => 'Summit de Startups',
            'descricao' => 'Encontro de investidores e startups inovadoras.',
            'categoria' => 'Negócios',
            'data' => now()->addDays(55),
            'localizacao' => 'Porto Alegre',
            'capacidade' => 320,
            'preco' => 85.00,
            'organizador_id' => $organizador2->id,
            'imagem' => '/eventos/01JV0QDFQ8EGQ6H3CCFDJWTWPC.jpeg',
        ]);
    }
}
