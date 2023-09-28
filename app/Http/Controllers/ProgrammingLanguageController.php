<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProgrammingLanguage;
use App\Http\Requests\StoreProgrammingLanguageRequest;
use App\Http\Requests\UpdateProgrammingLanguageRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProgrammingLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmingLanguages =  ProgrammingLanguage::all();
        return view('programmingLanguages.index',compact('programmingLanguages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects=Project::all();
        $employees=Employee::all();

        return view('programmingLanguages.create')
            ->with('projects',$projects)
            ->with('employees',$employees);



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgrammingLanguageRequest $request)
    {
        $bath=$request->file('image')->store('programmingLanguages');
        ProgrammingLanguage::create([
            'name'=>$request->name,
            'image'=>$bath
        ]);
        return redirect(route('programmingLanguages.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgrammingLanguage $programmingLanguage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgrammingLanguage $programmingLanguage)
    {
//        $projects=Project::all();
//        $employees=Employee::all();
//
//        return view('programmingLanguages.edit')
//            ->with('projects',$projects)
//            ->with('employees',$employees)
//            ->with('programmingLanguages',$programmingLanguage);

        return view('programmingLanguages.edit')->with('programmingLanguage',$programmingLanguage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgrammingLanguageRequest $request, ProgrammingLanguage $programmingLanguage)
    {
        $bath = $programmingLanguage->image;
        if($request->hasFile('image'))
        {
            $bath=$request->file('image')->store('programmingLanguages');
            Storage::delete($programmingLanguage->image);

        }
        $programmingLanguage->update([
            'name'=>$request->name,
            'image'=>$bath
        ]);
        return redirect(route('programmingLanguages.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgrammingLanguage $programmingLanguage)
    {
        if($programmingLanguage->employees->count()==0)
        {
            Storage::delete($programmingLanguage->image);
            $programmingLanguage->delete();

        }
        return redirect(route('programmingLanguages.index'));
    }

}
