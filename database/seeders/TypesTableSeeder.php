<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Frontend', 'Backend', 'Full Stack'];

        foreach ($types as $type) {
            $new_types = new Type();
            $new_types->title = $type;
            $new_types->slug = Str::of($type)->slug('-');

            $new_types->save();
        }
    }
}
