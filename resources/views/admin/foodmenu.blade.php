@extends('layouts.backend')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add MENU</h1>

        <div>
            {!! Form::open(['method'=>'POST', 'route'=>'addmenu']) !!}
            <div class="row">
            <div class="form-group col-sm">
                    {!! Form::label('businessname', 'Business Name') !!}
                    {!! Form::select('business_id', $businesses, null); !!}
                </div>                
                <div class="form-group col-sm">
                    {!! Form::label('menuname', 'Menu Name') !!}
                    {!! Form::text('menuname'); !!}
                </div>                             
                <div class="form-group col-sm">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description'); !!}
                </div>             
                <div class="form-group col-sm">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price'); !!}
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
                <h6 class="m-0 font-weight-bold text-primary">MENU</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($Menus as $menu)
                                <tr>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->description}}</td>
                                <td>{{$menu->price}}</td>
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
