@extends('layout')
@section('content')

    <h4 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Update Programming Language</h4>

    <form class="mx-5" method="post" action="{{route('programmingLanguages.update',$programmingLanguage)}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name" style="color: #3a3b45">Name</label>
            <input type="text" value="{{old('name',$programmingLanguage)}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" id="name">

        </div>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="image" style="color: #3a3b45">Image</label>
            <input type="file" value="{{old('programmingLanguage',$programmingLanguage)}}" name="programmingLanguage" class="form-control @error('programmingLanguage') is-invalid @enderror" placeholder="Update image" id="programmingLanguage">


        </div>
        @error('programmingLanguage')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <button class="btn btn-success">Update</button>


    </form>

@endsection
