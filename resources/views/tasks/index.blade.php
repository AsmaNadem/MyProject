@extends('layout')

@section('content')

<h2 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Tasks</h2>

<a href="{{route('tasks.create')}}" class="btn btn-secondary float-right mb-5  mr-5">Create</a>

<table class="table caption-top">

    <thead>
    <tr>
        <th scope="col" style="color: #3a3b45">#</th>
        <th scope="col" style="color: #3a3b45">Task Name</th>
        <th scope="col" style="color: #3a3b45">Task Status</th>
        <th scope="col" style="color: #3a3b45">Date</th>
        <th scope="col" style="color: #3a3b45">Duration</th>
        <th scope="col" style="color: #3a3b45">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
    <tr>
        <th scope="row">1</th>
        <td>{{$task->name}}</td>
        <td>{{$task->descripton}}</td>
        <td>{{$task->type}}</td>
        <td>{{$task->status}}</td>


        <td style="width:180px;">
            <a href="{{route('tasks.edit',$task)}}">
                <span class="btn btn-outline-success btn-sm font-1 mx1">
                <span class="fas fa-wrench"></span>Edit
                    </span>
            </a>
        </td>
        <td>
        <form action="{{route('tasks.destroy',$task)}}"
             class="d-inline-block" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm font-1 mx1"
            onclick="var result = confirm('Are you sure to delete this record?')

            if(result){}else{event.preventDefault()}">
                <span class="fas fa-trash">Delete</span>
            </button>
        </form>
{{--        <td><button class="btn btn-danger">Delete</button></td>--}}

        </td>
    </tr>
    @endforeach

    </tbody>
</table>

@endsection
