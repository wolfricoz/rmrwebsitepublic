<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\category;
use App\Models\post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $output = new ConsoleOutput();
        User::factory(100)->create();
        $output->writeln('users done');
        category::factory(10)->create();
        $output->writeln('categories done');
        post::factory(1000)->create();
        $output->writeln('posts done');
        User::create([
           'name'=>'admin',
            'dob'=>'1997-06-18',
            'email'=>'admin@admin.com',
            'password'=>'$2y$10$/0crM4s5NE1pQU3iKo1NbeCiKOu5Ey4fZgYKaSs3qR/muihI2qrtq',
            'IsAdmin'=>true
        ]);
//        password is admin123
        $output->writeln('Ricos account done');
    }
}
