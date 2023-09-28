@extends('layout')
@section('content')

    <h2>Update Task</h2>

    <form class="mx-5" method="post" action="{{route('tasks.update',$task)}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" value="{{old('task_name',$task)}}" name="task_name" class="form-control @error('task_name') is-invalid @enderror" placeholder="Enter your name" id="task_name">

        </div>
        @error('task_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <div class="form-group">
            <label for="task_status" style="color: #3a3b45">Task Status:</label>
            <select class="form-control" name="task_status" id="task_status" value="{{old('task_status',$task)}}" >
                {{--                <option value="">Select task status</option>--}}
                <option value="">Active</option>
                <option value="">Non-active</option>

            </select>

            @error('task_status')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Date" style="color: #3a3b45">Date:</label>
            <input type="date" value="{{old('Date',$employee)}}" class="form-control form-check @error('Date') is-invalid @enderror"  name="Date" id="Date">

        </div>
        @error('start_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror



        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="number" value="{{old('duration',$task)}}" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Update Duration" id="duration">

        </div>
        @error('duration')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <button class="btn btn-primary">Update</button>


    </form>

@endsection
