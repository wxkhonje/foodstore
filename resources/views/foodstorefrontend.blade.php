@extends('layouts.frontend')
@section('content')

    <!-- Resturant section-->
    <section id="resturant">
        <div class="container px-12">
                    {{ Form::open(array('url' => '/foodstore')) }}
                    <div class="row">
                        <div class="form-group col-sm">
                            {!! Form::label('title', 'Category', ['class'=>'control']); !!}
                            {!! Form::select('category', [
                                                            'Foodtruck' => 'Foodtruck',
                                                            'TakeAway' => 'TakeAway',
                                                            'Resturant'=>'Resturant',
                                                            'Cafes'=>'Cafes',
                                                            'Bakeries'=>'Bakeries',
                                                            'SweetShops'=>'SweetShops',
                                                            'BeverageShops'=>'BeverageShops',
                                                            'Bars'=>'Bars',
                                                            'IceCreamShops'=>'IceCreamShops',
                                                            'StreetFoods'=>'StreetFoods',
                                                            'DessertShops'=>'DessertShops'
                                                         ], 'Resturant'); !!}
                        </div>
                        <div class="form-group col-sm">
                            {!! Form::label('number', 'Price Range MK', ['class'=>'control']) !!}
                            {!! Form::selectRange('number', 10.00, 200.00, ['class'=>'control']); !!}
                        </div>
                        <div class="form-group col-sm">
                            {!! Form::label('location', 'Location', ['class'=>'control']) !!}
                            {!! Form::select('location', $location, null, ['placeholder' => 'Select a Location', 'class'=>'form-control']) !!}
                        </div>
                        <!--<div class="form-group col-sm">
                            {!! Form::label('Date', 'Date', ['class'=>'control']) !!}
                            {!! Form::date('name', \Carbon\Carbon::now(), ['class'=>'control']); !!}
                        </div>-->
                        <div class="col-sm">
                            <button class="btn btn-primary rounded-pill px-3 mb-2">
                            <span class="align-items-center">
                                <i class="bi-search-text-fill me-2"></i>
                                <span class="small">{!! Form::submit('Search') !!}</span>
                            </span>
                            </button>                              
                        </div>
                    </div>
                    {!! Form::close() !!}

            <div class="row gx-5">
                <div class="h2 fs-1 mb-4">Category</div>
                <div id="searchbar" class="container px-12"></div>
                <div id="reactresturant" class="container px-12"></div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Food Business</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($businesses as $biz)
                                    <tr>
                                    <td>{{$biz->name}}</td>
                                    <td>{{$biz->category}}</td>
                                    <td>{{$biz->contactperson}}</td>
                                    <td>{{$biz->email}}</td>
                                    <td>{{$biz->cellnumber}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>            
        </div>
    </section>   
@endsection
