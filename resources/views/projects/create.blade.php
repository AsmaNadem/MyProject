@extends('layout')
@section('content')

    <h3 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Create Project</h3>

    <form class="mx-5" method="post"
          enctype="multipart/form-data" action="{{route('projects.store')}}">
        @csrf
        <div class="form-group mt-5">
            <label for="name" style="color: #3a3b45">Name:</label>

            <input type="text" value="{{old('name')}}" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter your name" id="name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="logo" style="color: #3a3b45">Logo:</label>
            <input type="file" value="{{old('logo')}}" accept="image/*"
                   name="logo" class="form-control @error('logo') is-invalid @enderror"
                   id="logo">


            @error('logo')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="file_path" style="color: #3a3b45">File path:</label>
            <input type="file" value="{{old('file_path')}}" name="file_path" class="form-control @error('file_path') is-invalid @enderror" placeholder="Path" id="file_path">

        </div>
        @error('file_path')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <div class="form-group">
            <label for="description" style="color: #3a3b45">Description:</label>
            <textarea class="form-control form-check @error('description') is-invalid @enderror"  name="description" id="description">{{old('description')}}</textarea>

        </div>
        @error('description')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="link" style="color: #3a3b45">Link:</label>
            <input type="url" value="{{old('link')}}" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="URL" id="link">

        </div>
        @error('link')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror




        <div class="form-group">

            <label for="programming_language_id" style="color: #3a3b45">Programming Language:</label>
            <select class="form-control select2" multiple name="programming_languages[]" id="programming_language_id">
                <option selected value=""  disabled>Select programming Language</option>
                @foreach($programmingLanguages as $programmingLanguage)
                    <option value="{{$programmingLanguage->id}}">{{$programmingLanguage->name}}</option>
                @endforeach
            </select>
        </div>




        {{--        <div class="form-group">--}}

{{--            <label for="task_id" style="color: #3a3b45">Tasks:</label>--}}
{{--            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="task_id" id="task_id">--}}
{{--                <option selected value="">Select Task</option>--}}
{{--                @foreach($tasks as $task)--}}
{{--                    <option  value="{{$task->id}}">{{$task->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}

{{--            <label for="task_id" style="color: #3a3b45">Tasks:</label>--}}
{{--            <select class="form-select" name="task_id" id="task_id">--}}
{{--                <option selected value="1">Select task</option>--}}
{{--                @foreach($tasks as $task)--}}
{{--                    <option value="{{$task->id}}">{{$task->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
            <button class="btn btn-success">Create</button>


    </form>

@endsection
