@extends('layout')

@section('content')
    <div class="container-fluid">
        <h3 style="color: #3a3b45"> create user</h3>

        <form class="mx-5"
              enctype="multipart/form-data"
              method="post" action="{{route('users.store')}}">
            @csrf
            @isset($user)

                <input type="hidden" name="id" value="{{$user->id}}">
            @endisset
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{old('name',$user??"")}}" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter name" id="name">

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{old('email',$user??"")}}" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Enter email" id="email">

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" value="{{old('password',$user??"")}}" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter password" id="password">

                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" value="{{old('phone',$user??"")}}" name="phone"
                       class="form-control @error('phone') is-invalid @enderror"
                       placeholder="Enter phone" id="phone">

                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <label for="CV" style="color: #3a3b45">Employee CV:</label>

            <input type="file" name="CV" accept="application/pdf" value="{{old('CV')}}" class="form-control form-check mt-1 mb-2 @error('CV') is-invalid @enderror">

            @error('CV')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="form-group">
                <label for="project_id"> role</label>
                <select class="form-control select2  @error('roles') is-invalid @enderror" name="roles"
                        id="project_id">
                    <option value="">select role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->name}}"

                        >{{$role->name}}</option>
                    @endforeach

                </select>
                @error('roles')
                {{--            <div class="alert alert-danger">{{ $message }}</div>--}}
                @enderror
            </div>




            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" value="{{old('image',$user??"")}}"
                       accept="image/*"
                       name="image" class="form-control @error('image') is-invalid @enderror"
                       id="image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @isset($user)
                    <img width="100" src="{{url('storage/'.$user->image)}}">
                @endisset
            </div>

            <div class="form-group form-check">
                <label class="form-check-label">
                    <input name="status"

                           @checked(old('status',$user??"") )

                           class="form-check-input" type="checkbox"> Status

                </label>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
