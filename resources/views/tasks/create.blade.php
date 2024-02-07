@extends('layout')
@section('content')

    <h3 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Create Task</h3>

    <form class="mx-5" method="post" action="{{route('tasks.store')}}">
        @csrf

<div class="form-group">
    <label for="task_name" style="color: #3a3b45">Task Name:</label>
    <input type="text" value="{{old('task_name')}}" name="task_name" class="form-control @error('task_name') is-invalid @enderror" placeholder="Enter your name" id="task_name">

</div>
        @error('task_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="start_date" style="color: #3a3b45">Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{old('start_date')}}" class="form-control @error('start_date') is-invalid @enderror">

        </div>
        @error('start_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
        <label for="duration" style="color: #3a3b45">Duration:</label>
        <input type="duration" name="duration" id="duration" value="{{old('duration')}}"
               class="form-control @error('duration') is-invalid @enderror">

        </div>
        @error('duration')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="task_status" style="color: #3a3b45">Task Status:</label>
            <select class="form-control" name="task_status" id="task_status">
{{--                <option value="">Select task status</option>--}}
                <option value="Active" selected>Active</option>
                <option value="Non-active">Non-active</option>

            </select>
            @error('task_status')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror


<hr>

{{--            <div class="form-group">--}}

{{--                <label for="project_id" style="color: #3a3b45">Employee:</label>--}}
{{--                <select class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example" name="project_id" id="project_id">--}}
{{--                    <option selected value="">Select Employee</option>--}}
{{--                    @foreach($employees as $employee)--}}
{{--                        <option value="{{$employee->id}}">{{$employee->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}

{{--                <label for="employee_id" style="color: #3a3b45">Employee:</label>--}}
{{--                <select class="form-control select2 form-select-lg mb-3"  name="employee_id" aria-label=".form-select-lg example"  id="employee_id">--}}

{{--                    @foreach($employees as $employee)--}}
{{--                        <option value="{{$employee->id}}">{{$employee->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}


            <div class="form-group">

                <label for="project_id" style="color: #3a3b45">Project:</label>
                <select class="form-control select2 form-select-lg mb-3" multiple name="projects[]" aria-label=".form-select-lg example"  id="project_id">

                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
{{--        <div class="form-group custom-control custom-radio">--}}
{{--            <div class="">--}}
{{--            <label>Status:</label>--}}

{{--                <label  class=" mr-5" for="customRadio">Active </label>--}}

{{--            <input type="radio" class=" mr-5" id="customRadio" checked name="type" value="New">--}}

{{--                <label  class="" for="customRadio">Non-active</label>--}}


{{--            <input type="radio" class=" mx-5" id="customRadio2" name="type" value="old">--}}

{{--        </div>--}}
        </div>

{{--        <div class="form-group form-check">--}}
{{--            <label class="form-check-lable">--}}

{{--            <input name="status" @checked(old('status')=='on') class="form-check-input" type="checkbox">Status--}}
{{--            </label>--}}
{{--        </div>--}}

        <button class="btn btn-success">Create</button>


    </form>

@endsection
