<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tasks');
    }


}
