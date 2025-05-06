<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

use App\Models\LevelTasks;
use App\Models\LevelBindTask;
use App\Models\LevelTaskBindUser;
use App\Models\UsersReferral;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, MustVerifyEmailTrait;

    protected $guarded = []; // разрешить любой запрос на добавление в БД
    protected $casts = ['date_of_birth'];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function referrals_by()
    {
        return $this->hasMany(User::class, 'referred_by', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function user_level_tasks()
    {
        return $this->belongsToMany(LevelTasks::class, 'levelaccount_level_tasks_bind_users', 'user_id', 'level_task_id')->withPivot('done');
    }

    // public function level_tasks()
    // {
    //     return $this->belongsToMany(
    //         LevelTasks::class,       // Целевая модель
    //         'level_bind_tasks',      // Промежуточная таблица
    //         'level_id',              // Внешний ключ в level_bind_tasks (связан с users.level_id)
    //         'level_task_id',         // Внешний ключ в level_bind_tasks (связан с level_tasks.id)
    //         'level_id',              // Локальный ключ в users (users.level_id)
    //         'id'                     // Ключ в level_tasks (level_tasks.id)
    //     );
    // }

    public function level()
    {
        return $this->hasMany(Level::class, 'id_level', 'id');
    }
    
    // Получаем все задачи уровня пользователя и их прогресс
    public function levelBindTasks()
    {
        return $this->hasManyThrough(
            LevelBindTask::class,
            Level::class,
            'id',       // Ключ в таблице levels
            'level_id', // Ключ в таблице level_bind_tasks
            'level_id', // Локальный ключ в users (users.level_id)
            'id'        // Ключ в таблице levels
        );
    }

    public function taskProgress()
    {
        return $this->hasMany(LevelTaskBindUser::class);
    }

    public function referrals()
    {
        return $this->belongsToMany(
            User::class,       // Related model
            'users_referrals', // Pivot table
            'parent_id',       // Foreign key on pivot table (тот, кто пригласил)
            'user_id'          // Related key on pivot table (тот, кого пригласили)
        )->withTimestamps();
    }

    public function referralLink()
    {
        return $this->hasOne(UsersReferral::class, 'user_id');
    }
}
