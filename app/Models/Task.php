<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Ces champs peuvent être remplis en masse (ex: via Task::create())
    protected $fillable = ['title', 'completed'];
}
