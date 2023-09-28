<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','user_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function programming_Languages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class,'employee_programming_languages');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,'employee_projects');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
