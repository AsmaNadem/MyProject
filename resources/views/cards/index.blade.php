
@extends('layout')

@section('content')


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cards</h1>
        </div>

        <div class="row">


            @foreach($d as $i=> $item)
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2"

                        @style(['background-color:white'=>$item['price']>=40,
            ])
                    >

                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        {{$item['name']}}
                                        {{($loop->iteration)}}


                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${{$item['price']}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Earnings (Annual) Card Example -->

        </div>



    </div>


@endsection
