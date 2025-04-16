<?php

namespace App\Http\Controllers\TaskManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TaskManagerSection;
use App\Models\TaskManagerTasks;
use Illuminate\Support\Facades\DB;

class TaskManagerController extends Controller
{
    public function index()
    {
        // выводим разделы задач
        $tasks_sections = TaskManagerSection::All();

        // выводим задачи
        $tasks = TaskManagerTasks::All();

        return view('task_manager/index', compact('tasks_sections', 'tasks'));
    }
}