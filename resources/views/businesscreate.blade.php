@extends('layouts.app')

@section('content')
    Welcome to creating new Business
    <form action="/addbusiness" method="post">
        @csrf
        <label for="businessname">Business Name</label>
        <input type="text" name="businessname"><br \>

        <label for="businesstype">Business Type</label>
        <input type="text" name="businesstype"><br \>

        <label for="businesslocation">Business Location</label>
        <input type="text" name="businesslocation"><br \>

        <label for="businessphysicallocation">Business Physical Address</label>
        <input type="text" name="businessphysicallocation"><br \>
        <button>Submit</button>
    </form>
@endsection
