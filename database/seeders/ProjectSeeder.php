<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $categories = Category::all()->pluck('id');
        for ($i=0; $i < 250; $i++) {
            $newProject = new Project();
            $newProject->category_id = $faker->randomElement($categories);
            $newProject->title = $faker->realText(40);
            $newProject->author = $faker->name();
            $newProject->content = $faker->realText(1000);
            $newProject->date = $faker->dateTimeThisYear();
            $newProject->image = $faker->imageUrl(400,250,'posts');
            $newProject->save();
        }
    }
}