<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at'];

    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_programming_languages');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_programming_languages');
    }
}
