@extends('layout')

@section('content')

<h3 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Assigned to employees</h3>
@can('create-employees')
<a href="{{route('employees.create')}}" class="btn btn-secondary float-right mb-5  mr-5">Create</a>

@endcan
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col" style="color: #3a3b45">#</th>
        <th scope="col" style="color: #3a3b45">Employee Name</th>
        <th scope="col" style="color: #3a3b45">Employee CV</th>
        <th scope="col" style="color: #3a3b45">Employee Number</th>
        <th scope="col" style="color: #3a3b45">Date</th>
        <th scope="col" style="color: #3a3b45">Employee name</th>
        <th scope="col" style="color: #3a3b45">Programming Languages</th>
        <th scope="col" style="color: #3a3b45">Projects</th>
        <th scope="col" style="color: #3a3b45">Tasks</th>
        <th scope="col" style="color: #3a3b45">Action</th>
        <th></th>
        <th></th>
<th></th>
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
        <td>{{$employee->user?->name??"not found"}}</td>
        <td>@foreach($employee->programmingLanguages as $lang) {{$lang->name}} @endforeach  </td>
        <td>@foreach($employee->projects as $lang) {{$lang->name}} @endforeach  </td>
        <td>@foreach($employee->tasks as $lang) {{$lang->name}} @endforeach  </td>
        <td>{{$employee->project?->name??"not Found"}}</td>


        <td style="width:180px;">
            @can('update-employees')
            <a href="{{route('employees.edit',$employee)}}">

                <span class="btn btn-outline-success btn-sm font-1 mx1">
                <span class="fas fa-wrench"></span>Edit
                    </span>
            </a>
            @endcan
        </td>
        <td>
                @can('delete-employees')
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
                @endcan

        </td>
    </tr>
    @endforeach

    </tbody>
</table>

@endsection
