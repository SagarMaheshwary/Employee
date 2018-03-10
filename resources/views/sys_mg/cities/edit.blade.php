@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Update City</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('cities.update',$city->id)}}" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">location_city</i>    
                                <input type="text" name="city_name" id="city_name" value="{{Request::old('city_name') ? : $city->city_name}}">
                                <label for="city_name">City Name</label>
                                <span class="{{$errors->has('city_name') ? 'helper-text red-text' : ''}}">{{$errors->first('city_name')}}</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_lock</i>
                                <input type="number" name="zip_code" id="zip_code" class="validate" value="{{Request::old('zip_code') ? : $city->zip_code}}">
                                <label for="zip_code">Zip Code</label>
                                <span class="{{$errors->has('zip_code') ? 'helper-text red-text' : '' }}">{{$errors->first('zip_code')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/cities">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection