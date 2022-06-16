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
                        <img class="card-img-top" src="img/BannerFoodTruck.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$resturant->name}}</h5>
                            <p class="card-header">{{$resturant->PhysicalAddress}}</p>
                            <p class="card-text">{{$resturant->location}}</p>
                            <a href="#" class="btn btn-primary">{{$resturant->id}}</a>
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
    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">The Best Food Ordering App</h1>
                        <p class="lead fw-normal text-muted mb-5">
                            FoodStore has an Innovative food ordering app available on iPhone and Android.
                            You can find nearby Restaurants and place order by viewing Restaurant Menu.
                            The App helps you to take you to the Restaurant you like to visit through GPS,
                            as well as share your experience by giving your own review and rating.
                        </p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                            <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Masthead device mockup feature-->
                    <div class="masthead-device-mockup">
                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle></svg
                        ><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg
                        ><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
                        <div class="device-wrapper">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                <div class="screen bg-black">
                                    <!-- PUT CONTENTS HERE:-->
                                    <!-- * * This can be a video, image, or just about anything else.-->
                                    <!-- * * Set the max width of your media to 100% and the height to-->
                                    <!-- * * 100% like the demo example below.-->
                                    <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="assets/img/demo-screen.mp4" type="video/mp4" /></video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Quote/testimonial aside-->
    <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="col-12 col-lg-5">
                        <h3 class="display-4 lh-1 text-white mb-4">Easily Find Food within your city</h3>
                    </div>
                </div>
            </div>
        </div>
    </aside>

@endsection
