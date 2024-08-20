<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $technologies = [
        [
            "name" => "PHP",
            "version" => 8.10
        ],
        [
            "name" => "Laravel",
            "version" => 10.03
        ],
        [
            "name" => "MySQL",
            "version" => 8.00
        ],
        [
            "name" => "PostgreSQL",
            "version" => 13.04
        ],
        [
            "name" => "JavaScript",
            "version" => 23.01
        ],
        [
            "name" => "React",
            "version" => 18.02
        ],
        [
            "name" => "Vue",
            "version" => 3.20
        ],
        [
            "name" => "Node.js",
            "version" => 20.05
        ],
        [
            "name" => "Docker",
            "version" => 23.03
        ],
        [
            "name" => "Kubernetes",
            "version" => 1.28
        ],
        [
            "name" => "Python",
            "version" => 3.11
        ],
        [
            "name" => "Django",
            "version" => 4.02
        ],
        [
            "name" => "Flask",
            "version" => 2.13
        ],
        [
            "name" => "Ruby",
            "version" => 3.20
        ],
        [
            "name" => "Rails",
            "version" => 7.05
        ],
        [
            "name" => "Java",
            "version" => 17.04
        ],
        [
            "name" => "Spring",
            "version" => 6.10
        ],
        [
            "name" => "Angular",
            "version" => 16.02
        ],
        [
            "name" => "TypeScript",
            "version" => 5.10
        ],
        [
            "name" => "Swift",
            "version" => 5.80
        ],
        ];

        foreach ($technologies as $tecnology) {
            Technology::create($tecnology);
        }

    }
}