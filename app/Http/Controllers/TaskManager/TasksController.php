<?php

namespace App\Http\Controllers\TaskManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TaskManagerSection;
use App\Models\TaskManagerTasks;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index()
    {
        // выводим разделы задач
        $tasks_sections = TaskManagerSection::All();

        // выводим задачи
        $tasks = TaskManagerTasks::All();

        return view('task_manager/tasks/index', compact('tasks_sections', 'tasks'));
    }

    public function create()
    {
        $data = request()->validate([
            'title' => 'string',
            'deadline' => 'string',
        ]);

        $newDateFormat = date("Y-m-d", strtotime($data['deadline']));

        $newDate = ([
            'title' => $data['title'],
            'deadline' => $newDateFormat
        ]);

        TaskManagerTasks::create($newDate);
        return redirect()->route('taskmanager.tasks');
    }

    public function update_completed(TaskManagerTasks $task)
    {
        $data = request()->validate([
            'completed' => 'string',
        ]);

        //dd($task->completed);

        if ($task->completed == 0)
        {
            DB::table('taskmanager_tasks')
                ->where('id', '=', $task->id)
                ->update(['completed' => 1]);
        } else {
            DB::table('taskmanager_tasks')
                ->where('id', '=', $task->id)
                ->update(['completed' => 0]);
        }

        //$task->update($data);
        

        // dd(request()->request->all());
        return redirect()->route('taskmanager.tasks');
    }
}