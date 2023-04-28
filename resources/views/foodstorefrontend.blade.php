@extends('layouts.frontend')
@section('content')

    <!-- Resturant section-->
    <section id="resturant">
        <div class="container px-12">
                    {!! Form::open(['method'=>'POST']) !!}
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
                            {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

            <div class="row gx-5">
                <div class="h2 fs-1 mb-4">Category</div>
                <div id="searchbar" class="container px-12"></div>
                <div id="reactresturant" class="container px-12"></div>
            </div>
        </div>
    </section>   
@endsection
