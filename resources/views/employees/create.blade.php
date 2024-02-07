@extends('layout')
@section('content')

    <h3 class="ml-5 mb-3 " style="color: #3a3b45">Assign to Employee:</h3>
    <a href="{{route('employees.index')}}" class="btn btn-secondary float-right mb-1  mr-5">Back</a>
    <form class="mx-5" method="post" action="{{route('employees.store')}}">
        @csrf

    <div class="form-group">
        <label for="employee_name" style="color: #3a3b45">Employee Name:</label>
        <input type="text" value="{{old('name')}}" name="employee_name" class="form-control  mb-2 @error('employee_name') is-invalid @enderror" placeholder="Enter your name" id="employee_name">


        @error('employee_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


            <label for="employee_CV" style="color: #3a3b45">Employee CV:</label>

            <input type="file" name="employee_CV" accept="application/pdf" value="{{old('employee_CV')}}" class="form-control form-check mt-1 mb-2 @error('employee_CV') is-invalid @enderror">

        @error('employee_CV')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="employee_number" style="color: #3a3b45">Employee Number:</label>
            <input type="employee_number" value="{{old('employee_number')}}" name="employee_number" class="form-control mt-1 mb-2 @error('employee_number') is-invalid @enderror" placeholder="Enter your number" id="employee_number">

        </div>
        @error('employee_number')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="employee_date" style="color: #3a3b45">Date:</label>
            <input type="date" value="{{old('employee_date')}}" name="employee_date" class="form-control mt-1 mb-2 @error('employee_date') is-invalid @enderror"  id="employee_date">

        </div>

        <div class="form-group">

            <label for="user_id" style="color: #3a3b45">Employee name:</label>
            <select class="form-control select2 form-select-lg mb-3" name="user_id" aria-label=".form-select-lg example"  id="user_id">
                <option selected value=""  disabled>Select user:</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}"
                        @selected(old('user_id',$user??"") == $user->id)>{{$user->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">

            <label for="programming_language_id" style="color: #3a3b45">Programming Language:</label>
            <select class="form-control select2" multiple name="programming_languages[]" id="programming_language_id">
                @foreach($programmingLanguages as $programmingLanguage)
                    <option value="{{$programmingLanguage->id}}"
                        @selected(is_array(old('programming_languages')) and in_array($programmingLanguage->id,old('programming_languages')))>{{$programmingLanguage->name}}</option>
                @endforeach
            </select>
            @error('programming_language_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

<div class="form-group">

    <label for="project_id" style="color: #3a3b45">Project:</label>
    <select class="form-control select2 form-select-lg mb-3" multiple name="projects[]" aria-label=".form-select-lg example"  id="project_id">
        @foreach($projects as $project)
            <option value="{{$project->id}}"

                @selected(is_array(old('projects')) and in_array($project->id,old('projects'))) >{{$project->name}}</option>
        @endforeach
        </select>
    @error('project_id')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>

        <label for="task_id" style="color: #3a3b45">Tasks:</label>
        <select class="form-control select2 form-select-lg mb-3" multiple name="tasks[]" aria-label=".form-select-lg example"  id="task_id">
            @foreach($tasks as $task)
                <option value="{{$task->id}}"

                    @selected(is_array(old('tasks')) and in_array($task->id,old('tasks'))) >{{$task->task_name}}</option>
            @endforeach
        </select>
        @error('task_id')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

<hr>



        <button class="btn btn-success">Create</button>


    </form>

@endsection
