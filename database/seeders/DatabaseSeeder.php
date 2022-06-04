<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Models\Study;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            SchoolSeeder::class,
            ClassroomSeeder::class,
            StudySeeder::class,
            // ModuleSeeder::class,
        ]);
        
        User::factory(2)->create();

        $users = User::all();

        $users[0]->assignRole('teacher');
        $users[1]->assignRole('student');
        
        $users[0]->teachs()->saveMany(Study::where('id', '<', '4')->get());
        ClassroomStudent::create([
            'user_id'       => $users[1]->id,
            'classroom_id'  => Classroom::limit(1)->first()->id,
        ]);
    }
}
