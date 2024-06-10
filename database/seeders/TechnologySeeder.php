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
        $technologies = ['css','js','vue','sql','php','laravel'];

        foreach($technologies as $technology_name){
            $new_tecnology = new Technology();
            $new_tecnology->name = $technology_name;
            $new_tecnology->slug = Str::slug($technology_name);
            $new_tecnology->save();
        }


    }
}
