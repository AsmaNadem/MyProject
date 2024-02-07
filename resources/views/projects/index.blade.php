@extends('layout')

@section('content')

<h3 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Projects</h3>
@can('create-projects')
<a href="{{route('projects.create')}}" class="btn btn-secondary mb-5 mr-2 float-right">Create</a>
@endcan
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col" style="color: #3a3b45">#</th>
        <th scope="col" style="color: #3a3b45">Name</th>
        <th scope="col" style="color: #3a3b45">Logo</th>
        <th scope="col" style="color: #3a3b45">File path</th>
        <th scope="col" style="color: #3a3b45">Description</th>
        <th scope="col" style="color: #3a3b45">Link</th>

        <th scope="col" style="color: #3a3b45">Programming Language</th>

        <th scope="col" style="color: #3a3b45">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
    <tr>
        <th scope="row">1</th>
        <td>{{$project->name}}</td>
        <td><img width="100" src="{{url('storage/'.$project->logo)}}"></td>
        <td>{{$project->file_path}}</td>
        <td>{{$project->description}}</td>
        <td>{{$project->link}}</td>
{{--        <td>{{$project->programmingLanguages?->name??"not found"}}</td>--}}
{{--        <td>{{$project->programmingLanguage->name}}</td>--}}

        <td>@foreach($project->programmingLanguages as $language) {{$language->name}} @endforeach  </td>



        <td style="width:180px;">
            @can('update-projects')
            <a href="{{route('projects.edit',$project)}}">
                <span class="btn btn-outline-success btn-sm font-1 mx1">
                <span class="fas fa-wrench">Edit </span>
                    </span>
            </a>
            @endcan


@can('delete-projects')
        <form action="{{route('projects.destroy',$project)}}"
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


{{--        <td><button class="btn btn-danger">Delete</button></td>--}}

        </td>
    </tr>
    @endforeach

    </tbody>
</table>

@endsection
