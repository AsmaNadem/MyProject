@extends('layout')
@section('content')

    <h4 class="ml-3 mt-2">Create programming Languages </h4>

    <form class="mx-5" method="post"
          enctype="multipart/form-data" action="{{route('programmingLanguages.store')}}">
        @csrf
        <div class="form-group mt-5">
            <label for="name">Name</label>
            <input type="text" value="{{old('name')}}"
                   accept="image/*" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter programming language name" id="name">


            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" value="{{old('image')}}"
                   name="image" class="form-control @error('image') is-invalid @enderror"
                   id="image">


            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
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

        <button class="btn btn-success">Create</button>


    </form>

@endsection
