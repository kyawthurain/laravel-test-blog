<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


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
                'slug' => Str::slug($category),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Category::insert($categorySeed);
    }
}
