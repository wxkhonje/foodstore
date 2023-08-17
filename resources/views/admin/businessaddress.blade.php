@extends('layouts.backend')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Business Address Details</h1>

        <div>
            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                <div class="form-group md:col-span-1">
                    {!! Form::label('business', 'Business Name', ['class'=>'font-bold']); !!}
                    {!! Form::select('business', $businessoptions, 'null', 
                                                 ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6']); !!}
                </div>

                <div class="form-group md:col-span-1">
                    {!! Form::label('postalAddress', 'Postal Address', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) !!}
                    {!! Form::text('postalAddress', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>
                <div class="form-group md:col-span-1">
                    {!! Form::label('physicalAddress', 'Physical Address') !!}
                    {!! Form::text('physicalAddress','', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                
                <div class="form-group md:col-span-1">
                    {!! Form::label('longitude', 'Longitude') !!}
                    {!! Form::text('longitude','', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>
                <div class="form-group md:col-span-1">
                    {!! Form::label('latitude', 'Latitude') !!}
                    {!! Form::text('latitude', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>
                <div class="form-group md:col-span-1">
                    {!! Form::label('region', 'Region') !!}
                    {!! Form::text('region', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>     
                <div class="form-group md:col-span-1">
                    {!! Form::label('district', 'District') !!}
                    {!! Form::text('district', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                            
                <div class="form-group md:col-span-1">
                    {!! Form::label('country', 'Country') !!}
                    {!! Form::text('country', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                            
                <div class="form-group md:col-span-1">
                    {!! Form::label('mainlanguage', 'Language') !!}
                    {!! Form::text('mainlanguage', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>               
                <div class="form-group md:col-span-1">
                    {!! Form::label('street', 'Street') !!}
                    {!! Form::text('street', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>               
                <div class="form-group md:col-span-1">
                    {!! Form::label('googlepin', 'Google pin') !!}
                    {!! Form::text('googlepin', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                       
                <div class="form-group md:col-span-1">
                    {!! Form::label('instagramhandle', 'Instagram Handle') !!}
                    {!! Form::text('instagramhandle', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                       
                <div class="form-group md:col-span-1">
                    {!! Form::label('facebookhandle', 'Facebook Handle') !!}
                    {!! Form::text('facebookhandle', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                       
                <div class="md:col-span-1">
                    {!! Form::submit('Save', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-emerald-500']) !!}
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
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Edit</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($businessaddresses as $bizAddress)
                                <tr>
                                <td><span class="text-green-600 font-bold">{{$bizAddress->PostAddress}}</span></td>
                                <td>{{$bizAddress->PostAddress}}</td>
                                <td>{{$bizAddress->PostAddress}}</td>
                                <td>{{$bizAddress->PostAddress}}</td>
                                <td>{{$bizAddress->PostAddress}}</td>
                                <td><a href="{{ route('businessaddress.edit', $bizAddress->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
