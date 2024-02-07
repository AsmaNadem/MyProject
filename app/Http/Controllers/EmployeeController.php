<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\GeneralNotification;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('permission:create-employees', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-employees', ['only' => ['edit', 'store']]);
        $this->middleware('permission:delete-employees', ['only' => ['destroy']]);

    }

    public function index()
    {

        auth()->user()->notify(
            new GeneralNotification([
                'content'=>'New employee is added',
                'action_url'=>route('employees.index'),
                'btn_text'=>"Display",
                'methods'=>['database'],
                'image'=>"",

            ])
        );

        $employees=Employee::all();

        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        $projects=Project::all();
        $programmingLanguages=ProgrammingLanguage::all();
        $tasks=Task::all();
        return view('employees.create')
            ->with('users',$users)
            ->with('projects',$projects)
            ->with('programmingLanguages',$programmingLanguages)
            ->with('tasks',$tasks);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create([
            'employee_name'=>$request->employee_name,
            'employee_CV'=>$request->employee_CV,
            'employee_number'=>$request->employee_number,
            'employee_date'=>$request->employee_date,
        ]);
//        return redirect()->back();
        return redirect(route('employees.index'));
//        return dd($request->all());
//       $emp= Employee::create([
//
//            'user_id'=>auth()->id(),
//            'programming_language_id'=>$request->programming_language_id,
//            'project_id'=>$request->project_id,
//            'task_id'=>$request->task_id,
//        ]);
////        $emp->user()->sync($request->users);
//       $emp->programmingLanguages()->sync($request->programming_languages);
//
//       $emp->projects()->sync($request->projects);
//       $emp->tasks()->sync($request->tasks);
//
////        return redirect()->back();
//        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $projects=Project::all();
        $programmingLanguages=ProgrammingLanguage::all();
        $tasks=Task::all();
        return view('employees.edit')
            ->with('projects',$projects)
            ->with('programmingLanguages',$programmingLanguages)
            ->with('tasks',$tasks)
            ->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update([

            'user_id'=>$request->user_id,
            'programming_language_id'=>$request->programming_language_id,
            'project_id'=>$request->project_id,
            'task_id'=>$request->task_id,
        ]);
        toastr()->success('Record updated successfully');
        return redirect(route('employees.index')) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        toastr()->success("Record deleted successfully");
        return redirect()->back();
    }
}
