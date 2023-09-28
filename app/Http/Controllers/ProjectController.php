<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Task;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects=Project::all();

        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee=Employee::all();
        $task=Task::all();
        $programmingLanguages=ProgrammingLanguage::all();
        return view('projects.create')
            ->with('programmingLanguages',$programmingLanguages)
            ->with('tasks',$task)
            ->with('employees',$employee);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
//
        Project::create([
            'name'=>$request->name,
            'logo'=>$request->logo,
            'description'=>$request->description,
            'link'=>$request->link,
        ]);

//        return redirect()->back();
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $employee=Employee::all();
        $task=Task::all();
        $programmingLanguages=ProgrammingLanguage::all();
        return view('projects.edit')
            ->with('programmingLanguages',$programmingLanguages)
            ->with('employees',$employee)
            ->with('tasks',$task)
            ->with('projects',$project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
