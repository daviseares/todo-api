<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Task::class)->create([
            'name'=>'Estudar PHP',
            'complete'=>false
        ]);
        factory(App\Models\Task::class)->create([
            'name'=>'Estudar Laravel',
            'complete'=>false
        ]);
        factory(App\Models\Task::class)->create([
            'name'=>'Estudar JavaScript',
            'complete'=>false
        ]);
    }
}
