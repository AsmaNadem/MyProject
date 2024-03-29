<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at'];


    public function tasks()
    {
        return $this->belongsToMany(Task::class,'project_tasks');
    }

    public function programmingLanguages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class,'project_programming_languages');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_projects');
    }
}
