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
        User::factory(10)->create();
        $output->writeln('users done');
        category::factory(3)->create();
        $output->writeln('categories done');
        post::factory(100)->create();
        $output->writeln('posts done');
        User::create([
           'name'=>'rico',
            'email'=>'ricoisdenaam@gmail.com',
            'password'=>'$2y$10$CYZA4NAeUVk3iX2gUwimSu/xzItuA.8S/RezcP7pv8IaQG.6ehFz.',
            'IsAdmin'=>true
        ]);
        $output->writeln('Ricos account done');
    }
}
