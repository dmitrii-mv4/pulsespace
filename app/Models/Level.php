<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'levels'; // привязать к таблице
    protected $guarded = false; // разрешить любой запрос на добавление в БД

    public function users()
    {
        return $this->hasMany(User::class, 'id_level', 'id');
    }

    public function level_tasks()
    {
        return $this->belongsToMany(LevelTasks::class, 'level_bind_tasks', 'level_id', 'level_task_id')->withPivot('completion');
    }

    public function tasks()
    {
        return $this->hasMany(LevelTasks::class);
    }
}
