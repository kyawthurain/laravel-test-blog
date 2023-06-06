<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Food','Sport','IT','International NEWS','Entertainment','Cartoon'];
        $categorySeed = [];
        foreach($categories as $category){
            $categorySeed[] = [
                'title' => $category,
                'user_id' => rand(1,11),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Category::insert($categorySeed);
    }
}