<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelTasks extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'level_tasks'; // привязать к таблице
    protected $guarded = false; // разрешить любой запрос на добавление в БД

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // public function user_level_tasks()
    // {
    //     return $this->belongsTo(User::class, 'level_tasks_bind_users', 'user_id', 'level_task_id');
    // }

    // public function user_level_tasks()
    // {
    //     return $this->belongsToMany(User::class, 'level_tasks_bind_users', 'user_id', 'level_task_id');
    // }
}
