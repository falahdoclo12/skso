<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supervisor = User::inRandomOrder()->first();

        $project = new Project();
        $project->title = 'Sample Project';
        $project->description = 'This is a sample project.';
        $project->user_id = $supervisor->id;
        $project->save();
    }
}
