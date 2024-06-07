<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

use function Laravel\Prompts\text;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //DB::table('types')->truncate();

        $types = ['FrontEnd','BackEnd','FullStack','Design','DevOps'];

        foreach($types as $type){
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($type);
            $new_type->description = $faker->text();
            $new_type->save();
        }
    }
}
