<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskManagerSection extends Model
{
    use SoftDeletes;

    protected $table = 'taskmanager_sections'; // привязать к таблице
    protected $guarded = false; // разрешить любой запрос на добавление в БД
}
