
@extends('layout')

@section('content')


    <h3 style="color: #3a3b45" class="ml-3"> Users</h3>

    <a href="{{route('users.create')}}" class="btn btn-secondary mr-2 ml-2 mb-5 mt-2"> Create</a>
    <a href="{{route('users.export')}}" class="btn btn-secondary mb-5 mr-2 mt-2"> Export to excel </a>
    <button type="button" class="btn btn-secondary mb-5 mr-2 mt-2"
            data-toggle="modal" data-target="#exampleModal">import</button>
    @csrf
    <table class="table table-striped" id="taskTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Phone</th>
            <th>CV</th>
            <th>Image</th>

            <th>actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="col-12 p-3">
        {{--            {!! $users->render() !!}--}}
    </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
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
                      enctype="multipart/form-data"
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


            var dataTable = $('#taskTable').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [5,10, 25, 50, 100],
                ajax: {
                    url: "{{route('users.index')}}", // Replace with the actual API URL
                    type: 'get',
                    data: function(d) {
                        d.id = $('#idFilter').val();
                        d.name = $('#nameFilter').val();
                        d.role = $('#roleFilter').val();
                        d.email = $('#emailFilter').val();
                        d.phone = $('#phoneFilter').val();
                        d.CV = $('#CVFilter').val();
                        d.image = $('#imageFilter').val();
                        d.action = $('#actionFilter').val();

                    }
                },

                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'role' },
                    { data: 'email' },
                    { data: 'phone' },
                    { data: 'CV' },
                    { data: 'image' },
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
