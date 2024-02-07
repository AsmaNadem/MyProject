<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','programming_language_id','project_id'];

    public function tasks()
    {
        return $this->belongsToMany(Task::class,'employee_tasks');
    }

    public function programmingLanguages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class,'employee_programming_languages');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,'employee_projects');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
