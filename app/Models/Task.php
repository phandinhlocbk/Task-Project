<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllTasks($fillters = [])
    {
        $tasks = DB::table('tasks');

        if (!empty($fillters)) {
            $tasks1 = DB::table('tasks')->where(
                'status',
                '',
                '2'
            )->get();
        }

        $test = ['id',
        '=',
        '2', ];
        // dd($fillters);

        $tasks1 = DB::table('tasks')->where(
            $fillters
        )->get();

        // dd($tasks1);

        //$tasks = $tasks1->get();

        // dd($tasks);

        return $tasks1;
    }
}
