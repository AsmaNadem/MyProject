<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::all();

        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee=Employee::all();
        $project=Project::all();
        return view('tasks.create')
            ->with('employees',$employee)
            ->with('projects',$project);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        Task::create([
            'task_name'=>$request->task_name,
            'task_status'=>$request->task_status,
            'start_date'=>$request->start_date,
            'duration'=>$request->duration,
        ]);

//        return redirect()->back();
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $employee=Employee::all();
        $project=Project::all();
        return view('tasks.create')
            ->with('employees',$employee)
            ->with('projects',$project)
            ->with('task',$task);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
