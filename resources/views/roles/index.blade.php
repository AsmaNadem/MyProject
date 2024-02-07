@extends('layout')


@section('content')
{{--    <div class="container-fluid bg-white">--}}
    <h3 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Roles</h3>
        <a href="{{route('roles.create')}}" class="btn btn-secondary mb-5 float-right mr-2">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="color: #3a3b45">#</th>
                <th style="color: #3a3b45">Name</th>
                <th style="color: #3a3b45">Users</th>
                <th style="color: #3a3b45">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->users()->count()}}</td>
                    <td style="width: 270px;">


                        <a href="{{route('roles.show',$role)}}">
								<span class="btn  btn-outline-success btn-sm ">
									<span class="fas fa-search ">Display</span>
								</span>
                        </a>

                        <a href="{{route('roles.edit',$role)}}">
								<span class="btn  btn-outline-success btn-sm ">
									<span class="fas fa-wrench ">Manage</span>
								</span>
                        </a>

                        <form method="POST" action="{{route('roles.destroy',$role)}}"
                              class="d-inline-block">@csrf @method("DELETE")
                            <button class="btn  btn-outline-danger btn-sm "
                                    onclick="var result = confirm('Are you sure to delete this record?');if(result){}else{event.preventDefault()}">
                                <span class="fas fa-trash ">Delete</span>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-12 p-3">
{{--            {!! $roles->render() !!}--}}
        </div>

@endsection
