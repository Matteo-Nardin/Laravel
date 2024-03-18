<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = 'INSERT INTO projects (name, description, user_id)
                VALUES (?,?,?)';
        $projects = [
                [
                'Linkedin Clone',
                'Crea un clone di linkedin funzionante utilizzando le API fornite',
                1
                ],
                [
                'Spotify Clone',
                'Crea un clone di Spotify funzionante che riproduca le canzoni fornite dalle API',
                1
                ],
                [
                'Netflix Clone',
                'Crea un clone di Netflix funzionante usando gli assets forniti',
                1
                ]
        ];

        // // Looping and Inserting Array's Users into User Table
        foreach($projects as $project){
            //Project::create($project);
        DB::insert($sql,($project));
        }
    }
}
