@extends('layout')

@section('content')

    <h4 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Programming Languages</h4>

    <a href="{{route('programmingLanguages.create')}}" class="btn btn-secondary mb-5 mr-3 float-right">Create</a>

    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col" style="color: #3a3b45">#</th>
            <th scope="col" style="color: #3a3b45">Name</th>
            <th scope="col" style="color: #3a3b45">Image</th>
            <th scope="col" style="color: #3a3b45">Action</th>


        </tr>
        </thead>
        <tbody>
        @foreach($programmingLanguages as $programmingLanguage)
            <tr>

                <td>{{$programmingLanguage->id}}</td>
                <td>{{$programmingLanguage->name}}</td>
                <td><img src="{{url('storage/'.$programmingLanguage->image)}}"></td>



                <td style="width:180px;">
                    <a href="{{route('programmingLanguages.edit',$programmingLanguage)}}">
                <span class="btn btn-outline-success btn-sm font-1 mx1">
                <span class="fas fa-wrench"></span>Edit
                    </span>
                    </a>

                    <form action="{{route('programmingLanguages.destroy',$programmingLanguage)}}"
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
