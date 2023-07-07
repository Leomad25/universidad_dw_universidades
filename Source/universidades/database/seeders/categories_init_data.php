<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class categories_init_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $standard = Category::create([
            'name'=>'Estandar',
            'inherit'=>null
        ]);
        $audience = Category::create([
            'name'=>'Auditorio',
            'inherit'=>null
        ]);
        $videoConference = Category::create([
            'name'=>'Videoconferencia',
            'inherit'=>null
        ]);
        // subCategories
        Category::create([
            'name'=>'Sencillo',
            'inherit'=> $standard->id
        ]);
        Category::create([
            'name'=>'Amoblado',
            'inherit'=> $standard->id
        ]);
        Category::create([
            'name'=>'Mediano',
            'inherit'=> $audience->id
        ]);
        Category::create([
            'name'=>'Grande',
            'inherit'=> $audience->id
        ]);
        Category::create([
            'name'=>'Sencillo',
            'inherit'=> $videoConference->id
        ]);
        Category::create([
            'name'=>'Amoblado',
            'inherit'=> $videoConference->id
        ]);
        Category::create([
            'name'=>'Mediano',
            'inherit'=> $videoConference->id
        ]);
    }
}
