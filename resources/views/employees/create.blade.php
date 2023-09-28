@extends('layout')
@section('content')

    <h3 class="ml-5 mb-3 " style="color: #3a3b45">Create Employee</h3>
    <a href="{{route('employees.index')}}" class="btn btn-secondary float-right mb-1  mr-5">Back</a>
    <form class="mx-5" method="post" action="{{route('employees.store')}}">
        @csrf

    <div class="form-group">
        <label for="name" style="color: #3a3b45">Employee Name:</label>
        <input type="text" value="{{old('name')}}" name="name" class="form-control  mb-2 @error('name') is-invalid @enderror" placeholder="Enter your name" id="name">


        @error('employee_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


            <label for="description" style="color: #3a3b45">Employee CV:</label>

            <input type="file" name="cv" value="{{old('cv')}}" class="form-control form-check mt-1 mb-2 @error('cv') is-invalid @enderror">

        @error('employee_CV')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="name" style="color: #3a3b45">Employee Number:</label>
            <input type="number" value="{{old('number')}}" name="number" class="form-control mt-1 mb-2 @error('number') is-invalid @enderror" placeholder="Enter your number" id="number">

        </div>
        @error('employee_number')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="name" style="color: #3a3b45">Date:</label>
            <input type="date" value="{{old('date')}}" name="date" class="form-control mt-1 mb-2 @error('date') is-invalid @enderror"  id="date">

        </div>

        <div class="form-group">

            <label for="programming_language_id" style="color: #3a3b45">Programming Language:</label>
            <select class="form-select" name="programming_language_id" id="programming_language_id">
                <option selected value="1">Select programming Language</option>
                @foreach($programmingLanguages as $programmingLanguage)
                    <option value="{{$programmingLanguage->id}}">{{$programmingLanguage->name}}</option>
                @endforeach
            </select>
        </div>

<div class="form-group">

    <label for="project_id" style="color: #3a3b45">Project:</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="project_id" id="project_id">
            <option selected value="">Select project</option>
        @foreach($projects as $project)
            <option value="{{$project->id}}">{{$project->name}}</option>
        @endforeach
        </select>
</div>



        <div class="form-group">

            <label for="task_id" style="color: #3a3b45">Tasks:</label>
            <select class="form-select" name="task_id" id="task_id">
                <option selected value="1">Select task</option>
                @foreach($tasks as $task)
                    <option value="{{$task->id}}">{{$task->name}}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">create</button>
        </div>

    </form>

@endsection
