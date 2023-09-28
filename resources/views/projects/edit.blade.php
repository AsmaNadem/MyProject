@extends('layout')
@section('content')

    <h3>Update Project</h3>

    <form class="mx-5" method="post" action="{{route('projects.update',$project)}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{old('name',$project)}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Upate your name" id="name">

        </div>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" value="{{old('logo',$project)}}" name="logo" class="form-control @error('logo') is-invalid @enderror" placeholder="Update logo" id="name">

        </div>
        @error('logo')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control form-check @error('name') is-invalid @enderror"  name="description" id="description">{{old('description',$project)}}</textarea>

        </div>
        @error('description')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="link">Link:</label>
            <input type="url" value="{{old('link',$project)}}" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="Update link" id="link">

        </div>
        @error('logo')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <button class="btn btn-primary">Update</button>


    </form>

@endsection
