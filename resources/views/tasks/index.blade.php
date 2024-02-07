@extends('layout')

@section('content')

<h2 class="ml-2 mb-3 mt-5" style="color: #3a3b45">Tasks</h2>
@can('access-tasks')
<a href="{{route('tasks.create')}}" class="btn btn-secondary mr-2 ml-2 mb-5 mt-2">Create</a>
<a href="{{route('tasks.export')}}" class="btn btn-secondary mb-5 mr-2 mt-2"> Export to excel </a>
<button type="button" class="btn btn-secondary mb-5 mr-2 mt-2"
        data-toggle="modal" data-target="#exampleModal">import</button>
@endcan
<table class="table table-striped"  id="tasksTable">

    <thead>
    <tr>
        <th scope="col" style="color: #3a3b45">#</th>
        <th scope="col" style="color: #3a3b45">Task Name</th>
        <th scope="col" style="color: #3a3b45">Task Status</th>
        <th scope="col" style="color: #3a3b45">Date</th>
        <th scope="col" style="color: #3a3b45">Duration</th>
        <th scope="col" style="color: #3a3b45">Project Name</th>
{{--        <th scope="col" style="color: #3a3b45">Employee Name</th>--}}
        <th scope="col" style="color: #3a3b45">Action</th>
    </tr>
    </thead>

    <tbody>
{{--    @foreach($tasks as $task)--}}
{{--    <tr>--}}
{{--        <th scope="row">1</th>--}}
{{--        <td>{{$task->task_name}}</td>--}}
{{--        <td>{{$task->task_status}}</td>--}}
{{--        <td>{{$task->start_date}}</td>--}}
{{--        <td>{{$task->duration}}</td>--}}
{{--        <td>{{$task->projects?->name??"not found"}}</td>--}}
{{--        <td>@foreach($task->projects as $tas) {{$tas->name}} @endforeach  </td>--}}
{{--        <td>@foreach($task->employee as $tas) {{$tas->name}} @endforeach  </td>--}}
{{--        <td>@foreach($task->employees as $tas) {{$tas->name}} @endforeach  </td>--}}



{{--        <td style="width:180px;">--}}
{{--            @can('update-tasks')--}}
{{--            <a href="{{route('tasks.edit',$task)}}">--}}
{{--                <span class="btn btn-outline-success btn-sm font-1 mx1">--}}
{{--                <span class="fas fa-wrench"></span>Edit--}}
{{--                    </span>--}}
{{--            </a>--}}
{{--            @endcan--}}
{{--@can('delete-tasks')--}}
{{--        <form action="{{route('tasks.destroy',$task)}}"--}}
{{--             class="d-inline-block" method="post">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button class="btn btn-outline-danger btn-sm font-1 mx1"--}}
{{--            onclick="var result = confirm('Are you sure to delete this record?')--}}

{{--            if(result){}else{event.preventDefault()}">--}}
{{--                <span class="fas fa-trash">Delete</span>--}}
{{--            </button>--}}
{{--        </form>--}}
{{--                @endcan--}}
{{--        <td><button class="btn btn-danger">Delete</button></td>--}}

{{--        </td>--}}
{{--    </tr>--}}
{{--    @endforeach--}}

    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #3a3b45">Import from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="mx-5" method="post"
                  enctype="multipart/form-data">
            {{--                      action="{{route('users.import')}}">--}}
            @csrf
            <div class="modal-body">


                <div class="form-group">
                    <label for="image" style="color: #3a3b45">Excel File</label>
                    <input type="file" required value="{{old('file')}}"
                           accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                           name="file" class="form-control @error('file') is-invalid @enderror"
                           id="image">
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: left;">Close</button>
                <button type="submit" class="btn btn-success" style="float: left; justify-content: left;">import</button>
            </div>
            </form>
        </div>
    </div>

@endsection

    @section('scripts')

        <script>
            $(document).ready(function() {


                var dataTable = $('#tasksTable').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [5,10, 25, 50, 100],
                    ajax: {
                        url: "{{route('tasks.index')}}", // Replace with the actual API URL
                        type: 'get',
                        data: function(d) {
                            d.id = $('#idFilter').val();
                            d.task_name = $('#task_nameFilter').val();
                            d.task_status = $('#task_statusFilter').val();
                            d.start_date = $('#start_dateFilter').val();
                            d.duration = $('#durationFilter').val();
                            d.project_id = $('#project_idFilter').val();
                            d.action = $('#actionFilter').val();

                        }
                    },

                    columns: [
                        { data: 'id' },
                        { data: 'task_name' },
                        { data: 'task_status' },
                        { data: 'start_date' },
                        { data: 'duration' },
                        { data: 'project_id' },
                        { data: 'action' },

                    ]
                });
                // dataTable.ajax.reload();
                // Trigger datatable reload on filter change
                $('.filter').on('change', function() {
                    dataTable.ajax.reload();
                });
            });
        </script>
@endsection
