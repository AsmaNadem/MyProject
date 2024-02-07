@extends('layout')
@section('content')

    <h3 class="ml-5 mb-3 " style="color: #3a3b45">Edit Employee</h3>

    <form class="mx-5" method="post" action="{{route('employees.update',$employee)}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="employee_name" style="color: #3a3b45">Employee Name:</label>
            <input type="text" value="{{old('employee_name',$employee)}}" name="employee_name" class="form-control @error('employee_name') is-invalid @enderror" placeholder="Enter your name" id="employee_name">

        </div>
        @error('employee_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="employee_CV" style="color: #3a3b45">Employee CV:</label>
            <input type="text" value="{{old('employee_CV',$employee)}}" class="form-control form-check @error('employee_CV') is-invalid @enderror"  name="employee_CV" id="employee_CV">

        </div>
        @error('employee_CV')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="employee_number" style="color: #3a3b45">Employee Number:</label>
            <input type="number" value="{{old('employee_number',$employee)}}" class="form-control form-check @error('employee_number') is-invalid @enderror"  name="employee_number" id="employee_number">

        </div>
        @error('employee_number')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="Date" style="color: #3a3b45">Date:</label>
            <input type="date" value="{{old('employee_date',$employee)}}" class="form-control form-check @error('Date') is-invalid @enderror"  name="Date" id="Date">

        </div>
        @error('employee_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">

            <label for="user_id" style="color: #3a3b45">user id:</label>
            <select class="form-control select2 form-select-lg mb-3" name="user_id" aria-label=".form-select-lg example"  id="user_id">
                <option selected value="{{old('user_id',$employee)}}"  disabled>Select user:</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}"
                            @if($employee->user_id == $user->id ) selected @endif
                        @selected(old('user_id',$employee->user_id??"") == $user->id)>{{$user->name}} {{$employee->user_id == $user->id}}</option>
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

        <button class="btn btn-success">Update</button>
        </div>

    </form>

@endsection

@section('scripts')
<script>

    $(document).ready(function () {
        $('#user_id').trigger('change');
        // $('#user_id').change();
    });
</script>
@endsection
