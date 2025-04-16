<?php

namespace App\Http\Controllers\TaskManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TaskManagerSection;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    public function index()
    {
        // выводим разделы задач
        $tasks_sections = TaskManagerSection::All();

        return view('task_manager/tasks/sections', compact('tasks_sections'));
    }

    public function create()
    {
        $data = request()->validate([
            'title' => 'string',
        ]);

        TaskManagerSection::create($data);
        return redirect()->route('taskmanager.tasks.sections');
    }
}