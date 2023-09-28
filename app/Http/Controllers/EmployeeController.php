<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Task;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::all();
//Employee::create([
//    'employee_name'=>'asma',
//    'employee_CV'=>'mine',
//    'employee_number'=>'7333',
//    'employee_date'=>'2010',
//
//
//    ]);
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects=Project::all();
        $programmingLanguages=ProgrammingLanguage::all();
        $tasks=Task::all();
        return view('employees.create')
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
