<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('permission:create-projects', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-projects', ['only' => ['edit', 'store']]);
        $this->middleware('permission:delete-projects', ['only' => ['destroy']]);

    }

    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        $task = Task::all();
        $programmingLanguages = ProgrammingLanguage::all();
        return view('projects.create')
            ->with('programmingLanguages', $programmingLanguages)
            ->with('tasks', $task)
            ->with('employees', $employee);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $bath= $request->file('logo')->store('projects');
      $pro =  Project::create([
            'name' => $request->name,
            'logo' => $bath,
            'description' => $request->description,
            'link' => $request->link,
            'file_path' => $request->file_path,
            'programming_language_id' => $request->programming_language_id,
        ]);

        $pro->programmingLanguages()->sync($request->programming_languages);

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
        $employee = Employee::all();
        $task = Task::all();
        $programmingLanguages = ProgrammingLanguage::all();
        return view('projects.edit')
            ->with('programmingLanguages', $programmingLanguages)
            ->with('employees', $employee)
            ->with('tasks', $task)
            ->with('projects', $project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $bath = $project->logo;
        if($request->hasFile('logo'))
        {
            $bath=$request->file('logo')->store('projects');
            Storage::delete($project->image);
        }
        $project->update([
            'name'=>$request->name,
            'logo'=>$bath,
            'description'=>$request->description,
            'link'=>$request->link,
            'file_path'=>$request->file_path,
        ]);
        toastr()->success('Record updated successfully');
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
//        if($project->employees->count()==0)
//        {
//            Storage::delete($project->logo);
//            $project->delete();
//
//        }
//        toastr()->success('Record deleted successfully');
//        return redirect(route('projects.index'));
//    }
        $project->delete();

        toastr()->success("Record deleted successfully");
        return redirect()->back();

    }
}
