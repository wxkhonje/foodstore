@extends('layouts.backend')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Location</h1>

        <div>
            {!! Form::open(['method'=>'POST', 'route'=>'savelocation']) !!}
            <div class="row">
                <div class="form-group col-sm">
                    {!! Form::label('district', 'District') !!}
                    {!! Form::text('district'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('region', 'Region', ['class'=>'control']); !!}
                    {!! Form::select('region', [
                                                    'north' => 'North',
                                                    'central' => 'Central',
                                                    'south'=>'South',
                                                 ], 'South'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('country', 'Country') !!}
                    {!! Form::text('country','Malawi'); !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('mainlanguage', 'Main Language') !!}
                    {!! Form::text('mainlanguage'); !!}
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
                <h6 class="m-0 font-weight-bold text-primary">Location</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>district</th>
                            <th>region</th>
                            <th>country</th>
                            <th>Main language</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>district</th>
                            <th>region</th>
                            <th>country</th>
                            <th>Main language</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>{{$location->district}}</td>
                                <td>{{$location->region}}</td>
                                <td>{{$location->country}}</td>
                                <td>{{$location->mainlanguage}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$locations->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
