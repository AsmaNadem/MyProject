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
            <input type="date" value="{{old('Date',$employee)}}" class="form-control form-check @error('Date') is-invalid @enderror"  name="Date" id="Date">

        </div>
        @error('employee_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <button class="btn btn-success">Update</button>


    </form>

@endsection
