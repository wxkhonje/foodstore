@extends('layouts.backend')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Business Address Details</h1>

        <div>

        <form method="POST" action="{{ route('businessaddress.update', $businessaddress->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="PostAddress">Postal Address</label>
                <input type="text" name="PostAddress" id="PostAddress" value="{{ $businessaddress->PostAddress }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="PhysicalAddress">Physical Address</label>
                <input type="text" name="PhysicalAddress" id="PhysicalAddress" value="{{ $businessaddress->PhysicalAddress }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="Longitude">Longitude</label>
                <input type="text" name="Longitude" id="Longitude" value="{{ $businessaddress->longitude }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" id="latitude" value="{{ $businessaddress->latitude }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" name="region" id="region" value="{{ $businessaddress->region }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="district">District</label>
                <input type="text" name="district" id="district" value="{{ $businessaddress->district }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" value="{{ $businessaddress->country }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="mainlanguage">Language</label>
                <input type="text" name="mainlanguage" id="mainlanguage" value="{{ $businessaddress->mainlanguage }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="googlepin">Google Pin</label>
                <input type="text" name="googlepin" id="googlepin" value="{{ $businessaddress->googlepin }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="Street">Street</label>
                <input type="text" name="Street" id="Street" value="{{ $businessaddress->Street }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="instagramhandle">Instagram Handle</label>
                <input type="text" name="instagramhandle" id="instagramhandle" value="{{ $businessaddress->instagramhandle }}" class="form-control">
            </div>           

            <div class="form-group">
                <label for="facebookhandle">Facebook Handle</label>
                <input type="text" name="facebookhandle" id="facebookhandle" value="{{ $businessaddress->facebookhandle }}" class="form-control">
            </div>
            <!-- Add more input fields for other fields you want to update -->
            <button type="submit">Update</button>
        </form>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection