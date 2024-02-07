{{--@extends('layout')--}}
{{--@section('content')--}}

{{--    <h2>Update Task</h2>--}}

{{--    <form class="mx-5" method="post" action="{{route('tasks.update',$task)}}">--}}
{{--        @csrf--}}
{{--        @method('put')--}}

{{--        <div class="form-group">--}}
{{--            <label for="task_name">Task Name</label>--}}
{{--            <input type="text" value="{{old('task_name',$task)}}" name="task_name" class="form-control @error('task_name') is-invalid @enderror" placeholder="Enter your name" id="task_name">--}}

{{--        </div>--}}
{{--        @error('task_name')--}}
{{--        <div class="alert alert-danger">{{$message}}</div>--}}
{{--        @enderror--}}


{{--        <div class="form-group">--}}
{{--            <label for="task_status" style="color: #3a3b45">Task Status:</label>--}}
{{--            <select class="form-control" name="task_status" id="task_status">{{old('task_status',$task)}}--}}
{{--                --}}{{--                <option value="">Select task status</option>--}}
{{--                <option value="">Active</option>--}}
{{--                <option value="">Non-active</option>--}}

{{--            </select>--}}

{{--            @error('task_status')--}}
{{--            <div class="alert alert-danger">{{$message}}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="Date" style="color: #3a3b45">Date:</label>--}}
{{--            <input type="date" value="{{old('start_date',$task)}}" class="form-control form-check @error('Date') is-invalid @enderror"  name="Date" id="Date">--}}

{{--        </div>--}}
{{--        @error('start_date')--}}
{{--        <div class="alert alert-danger">{{$message}}</div>--}}
{{--        @enderror--}}



{{--        <div class="form-group">--}}
{{--            <label for="duration">Duration</label>--}}
{{--            <input type="number" value="{{old('duration',$task)}}" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Update Duration" id="duration">--}}

{{--        </div>--}}
{{--        @error('duration')--}}
{{--        <div class="alert alert-danger">{{$message}}</div>--}}
{{--        @enderror--}}


{{--        <button class="btn btn-success">Update</button>--}}


{{--    </form>--}}

{{--@endsection--}}
@extends('layout')
@section('content')

    <h3 class="ml-5 mb-3 " style="color: #3a3b45">Edit Task</h3>

    <form class="mx-5" method="post" action="{{route('tasks.update',$task)}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="task_name" style="color: #3a3b45">Task Name:</label>
            <input type="text" value="{{old('task_name',$task)}}" name="task_name" class="form-control @error('task_name') is-invalid @enderror" placeholder="Enter your name" id="task_name">

        </div>
        @error('task_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="task_status" style="color: #3a3b45">Task status:</label>
            <input type="text" value="{{old('task_status',$task)}}" class="form-control form-check @error('task_status') is-invalid @enderror"  name="task_status" id="task_status">

        </div>
        @error('task_status')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror



        <div class="form-group">
            <label for="start_date" style="color: #3a3b45">Date:</label>
            <input type="date" value="{{old('start_date',$task)}}" class="form-control form-check @error('start_date') is-invalid @enderror"  name="start_date" id="start_date">

        </div>
        @error('start_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <div class="form-group">
            <label for="duration" style="color: #3a3b45">Duration:</label>
            <input type="number" value="{{old('duration',$task)}}" class="form-control form-check @error('duration') is-invalid @enderror"  name="duration" id="duration">

        </div>
        @error('duration')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


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



        <button class="btn btn-success">Update</button>


    </form>

@endsection
