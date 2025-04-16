<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskManagerTasks extends Model
{
    use SoftDeletes;

    protected $table = 'taskmanager_tasks'; // привязать к таблице
    protected $guarded = ['completed']; // разрешить любой запрос на добавление в БД
}
