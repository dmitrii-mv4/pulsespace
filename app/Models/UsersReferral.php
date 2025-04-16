<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersReferral extends Model
{
    use SoftDeletes;

    protected $guarded = ['code'];

    protected $fillable = [
        'code', 
        'user_id', 
        'parent_id',
        'count_visit'
    ];
}
