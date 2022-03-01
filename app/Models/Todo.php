<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable  = [
        'task_title',
        'scheduled_at'
    ];

    protected $table = 'todos';

    protected function getScheduledAtAttribute($scheduled_at)
    {
        return  Carbon::parse($scheduled_at);
    }
}
