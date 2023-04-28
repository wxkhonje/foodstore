@extends('layouts.backend')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Business</h1>

        <div>
            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="row">
                <div class="form-group col-sm">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('category', 'Category', ['class'=>'control']); !!}
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
            </div>

            <div class="row">
                <div class="form-group col-sm">
                    {!! Form::label('contactperson', 'Contact Person') !!}
                    {!! Form::text('contactperson'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description'); !!}
                </div>                
                <div class="form-group col-sm">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('cellnumber', 'Cellnumber') !!}
                    {!! Form::text('cellnumber'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('PhysicalAddress', 'Physical Address') !!}
                    {!! Form::text('PhysicalAddress'); !!}
                </div>               
                <div class="form-group col-sm">
                    {!! Form::label('longitude', 'Longitude') !!}
                    {!! Form::text('longitude'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('latitude', 'Latitude') !!}
                    {!! Form::text('latitude'); !!}
                </div>                      
                <div class="form-group col-sm">
                    {!! Form::label('location', 'Location') !!}
                    {!! Form::select('location',[
                                                'Blantyre'=>'Blantyre',
                                                'Lilongwe'=>'Lilongwe',
                                                'Mzuzu'=>'Mzuzu',
                                                'Zomba'=>'Zomba'
                                                ], 'Blantyre'); !!}
                </div>                   
                <div class="form-group col-sm">
                    {!! Form::label('facebookhandle', 'Facebook Handle') !!}
                    {!! Form::text('facebookhandle'); !!}
                </div>                             
                <div class="form-group col-sm">
                    {!! Form::label('instagramhandle', 'Instagram Handle') !!}
                    {!! Form::text('instagramhandle'); !!}
                </div>                     
                <div class="form-group col-sm">
                    {!! Form::label('image', 'Business Image') !!}
                    {!! Form::file('image'); !!}
                </div>                       
                <div class="col-sm">
                    {!! Form::submit('Save') !!}
                </div>
            </div>
            {!! Form::close() !!}
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
                            @foreach($business as $biz)
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
                    {{$business->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
