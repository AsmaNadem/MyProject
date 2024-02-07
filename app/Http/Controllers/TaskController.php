<?php

namespace App\Http\Controllers;

use App\Exports\TasksExport;
use App\Imports\TasksImport;
use App\Models\Employee;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function export()
    {
        return Excel::download((new TasksExport), 'tasks.xlsx');
    }

    public function import()
    {
        Excel::import((new TasksImport), 'tasks.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function __construct()
    {
        $this->middleware('permission:create-tasks', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-tasks', ['only' => ['edit', 'store']]);
        $this->middleware('permission:delete-tasks', ['only' => ['destroy']]);

    }

    public function index()
    {
        if (\request()->ajax()) {
            $tasks = Task::all();

            $projects=Project::all();
            return datatables()->collection(Task::all())->toJson();
            return datatables()->collection(Project::all())->toJson();
        }
        else
            return view('tasks.index');

    }
//        $tasks=Task::all();
//
//        return view('tasks.index',compact('tasks'));


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
       $t= Task::create([
            'task_name'=>$request->task_name,
            'task_status'=>$request->task_status,
            'start_date'=>$request->start_date,
            'duration'=>$request->duration,
            'project_id'=>$request->project_id,
            'employee_id'=>$request->employee_id,
        ]);
        $t->projects()->sync($request->projects);
//        $t->employee()->sync($request->employee);


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
        $task->update([
            'task_name'=>$request->task_name,
           'task_status'=>$request->task_status,
            'start_date'=>$request->start_date,
            'duration'=>$request->duration,
            'project_id'=>$request->project_id
        ]);
        toastr()->success('Record updated successfully');
        return redirect(route('tasks.index')) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        toastr()->success("Record deleted successfully");
                return redirect()->back();
    }
}
