<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new ConsoleOutput();
        $c = 0;
        while ($c < 200){
            Post::factory(1000)->create(['approved'=>true]);
            $output->writeln('created 1000. Pass: ' . $c);
            $c++;
        }


    }
}
