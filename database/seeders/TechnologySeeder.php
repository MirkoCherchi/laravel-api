<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'PHP', 'Vite', 'VueJS', 'JavaScript', 'Laravel', 'Sass', 'Bootstrap'];

        foreach ($technologies as $technology) {
            $new_technologies = new Technology();
            $new_technologies->title = $technology;
            $new_technologies->slug = Str::of($technology)->slug('-');

            $new_technologies->save();
        }
    }
}
