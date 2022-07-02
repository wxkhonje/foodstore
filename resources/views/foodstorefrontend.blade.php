@extends('layouts.frontend')
@section('content')
    <!-- Resturant section-->
    <section id="resturant">
        <div class="container px-12">
                    {!! Form::open(['method'=>'POST', 'route'=>'resturanttest']) !!}
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

                @foreach($resturants as $resturant)
                    <div class="card" style="width: 20rem; margin: 5px; padding: 0px">
                        <img class="card-img-top" src="{{ asset('images/'.$resturant->image_path) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$resturant->name}} - {{$resturant->location->district}}</h5>
                            <p class="card-header">{{$resturant->cellnumber}}</p>
                            <p class="card-text">{{$resturant->location->PhysicalAddress}}</p>
                            <a href="/Menu/{{$resturant->id}}" class="btn btn-primary">{{$resturant->name}} - Menu</a>
                            <span id="resturantdetails"></span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div>
            {{--$business->links()--}}
            <!--<a href="/addbusiness">Add Resturant</a>-->
            <!--<a href="/Menu">Menu</a>-->
        </div>
    </section>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Food Store Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="resturantdetails">
                </div>                                         
                Food Store Details will come here
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>    
@endsection
