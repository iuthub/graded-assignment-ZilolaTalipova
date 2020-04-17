<?php

use Illuminate\Database\Seeder;
use App\Task;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tasks = new Task([
      'user_id' => 1,
      'task'=>'Do Project'
    ]);
    $tasks->save();

    $tasks = new Task([
      'user_id' => 1,
      'task'=>'Cook meal'
    ]);
    $tasks->save();


    }
}
