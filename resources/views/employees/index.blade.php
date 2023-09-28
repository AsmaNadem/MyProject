@extends('layout')

@section('content')

<h3 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Employees</h3>

<a href="{{route('employees.create')}}" class="btn btn-secondary float-right mb-5  mr-5">Create</a>


<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col" style="color: #3a3b45">#</th>
        <th scope="col" style="color: #3a3b45">Employee Name</th>
        <th scope="col" style="color: #3a3b45">Employee CV</th>
        <th scope="col" style="color: #3a3b45">Employee Number</th>
        <th scope="col" style="color: #3a3b45">Date</th>
        <th scope="col" style="color: #3a3b45">Project</th>
        <th scope="col" style="color: #3a3b45">Task</th>
        <th scope="col" style="color: #3a3b45">Programming Language</th>
        <th scope="col" style="color: #3a3b45">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
    <tr>
        <th scope="row">1</th>
        <td>{{$employee->employee_name}}</td>
        <td>{{$employee->employee_CV}}</td>
        <td>{{$employee->employee_number}}</td>
        <td>{{$employee->employee_date}}</td>

        <td style="width:180px;">
            <a href="{{route('employees.edit',$employee)}}">
                <span class="btn btn-outline-success btn-sm font-1 mx1">
                <span class="fas fa-wrench"></span>Edit
                    </span>
            </a>
{{--        </td>--}}
{{--        <td>--}}
        <form action="{{route('employees.destroy',$employee)}}"
             class="d-inline-block" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm font-1 mx1"
            onclick="var result = confirm('Are you sure to delete this record?')

            if(result){}else{event.preventDefault()}">
                <span class="fas fa-trash">Delete</span>
            </button>
        </form>


        </td>
    </tr>
    @endforeach

    </tbody>
</table>

@endsection
