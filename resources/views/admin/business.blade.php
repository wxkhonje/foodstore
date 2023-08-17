@extends('layouts.backend')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Business</h1>

        <div>
            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-1">
                    {{ Form::label('name', 'Name', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
                    {{ Form::text('name', '', ['class' => 'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Business name']) }}
                </div>

                <div class="form-group md:col-span-1">
                    {!! Form::label('category', 'Category', ['class'=>'font-bold']); !!}
                    {!! Form::select('category', $categoryoptions, 'null', 
                                                 ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6']); !!}
                </div>

                <div class="form-group md:col-span-1">
                    {!! Form::label('contactperson', 'Contact Person', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) !!}
                    {!! Form::text('contactperson', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>
                <div class="form-group md:col-span-1">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description','', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                
                <div class="form-group md:col-span-1">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email','', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>
                <div class="form-group md:col-span-1">
                    {!! Form::label('cellnumber', 'Cellnumber') !!}
                    {!! Form::text('cellnumber', '', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>                                  
                <div class="form-group md:col-span-1">
                    {!! Form::label('location', 'Location') !!}
                    {!! Form::select('location',[
                                                'Blantyre'=>'Blantyre',
                                                'Lilongwe'=>'Lilongwe',
                                                'Mzuzu'=>'Mzuzu',
                                                'Zomba'=>'Zomba'
                                                ], 'Blantyre', ['class'=>'block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6', 'placeholder' => 'Enter Contact name']); !!}
                </div>        
                <div class="form-group md:col-span-1">
                    {!! Form::label('image', 'Business Image') !!}
                    {!! Form::file('image'); !!}
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
                                <td><span class="text-green-600 font-bold">{{$biz->name}}</span></td>
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
