<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
//'task_name');
//            $table->string('task_status');
//            $table->string('start_date');
//            $table->string('duration');
//            $table->foreignId('project_id')->constrained();
//            $table->foreignId('employee_id'

    protected $fillable=['task_name','task_status','start_date','duration','project_id','employee_id'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_tasks');
    }


    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tasks');
    }


}
