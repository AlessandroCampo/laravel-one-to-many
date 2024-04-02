<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('projects');
        foreach ($projects as $projectData) {
            Project::create([
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'stack' => $projectData['stack'],
                'thumb' => $projectData['thumb'],
            ]);
        }
    }
}
