@extends('layout')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                  action="{{($type=="create")?route('custom-notifications.store'):route('custom-notifications.update',$customNotification)}}">
                @csrf
                @if($type!="create")
                    @method("PUT")
                @endif
                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle" style="color: #3a3b45"></span>
                            @if($type=="create")
                                Add new notification
                            @else
                                Edit
                            @endif
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">
                        <div class="col-12 p-2">
                            <div class="col-12"  style="color: #3a3b45">Title:</div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title" required maxlength="190" class="form-control"
                                       value="{{($type=="create")?old('title'):$customNotification->title}}">
                            </div>
                        </div>

                        <div class="col-12 p-2">
                            <div class="col-12" style="color: #3a3b45">Target group:</div>
                            <div class="col-12 pt-3">
                                <select name="target" class="form-control">
                                    @php($types=['all','employees','admins'])
                                    @foreach($types as $q_type)
                                        <option
                                            @if($type=="create" and $q_type == old('target')  )
                                                selected
                                            @elseif(isset($customNotification) and $customNotification->target== $q_type) selected
                                            @endif
                                            {{($type=="create")?old('name'):$customNotification->target}}
                                            value="{{$q_type}}">{{$q_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 p-2">
                            <div class="col-12" style="color: #3a3b45">Logo:</div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            @if($type!="create")
                                <div class="col-12 pt-3">
                                    <img src="{{$customNotification->image()}}" style="width:100px">
                                </div>
                            @endif
                            <div class="col-12 pt-3">
                            </div>
                        </div>
                        <div class="col-12  p-2">
                            <div class="col-12" style="color: #3a3b45">Description:</div>
                            <div class="col-12 pt-3">
                                <textarea name="description" class="form-control">{{($type=="create")?old('name'):$customNotification->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
