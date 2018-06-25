@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
        <div class="col m6 offset-m3 l6 offset-l3 xl4 offset-xl4 s10 offset-s1 card card-login z-depth-4">
                <div class="card-title card-title-login gradient-bg lighten-2 white-text">
                    <h5 class="center flow-text">Reset Password</h5>
                </div>
                <div class="card-content">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-field">
                            <input type="email" name="email" id="email" value="{{old('email')}}">
                            <label for="email">Email</label>
                            @if($errors->has('email'))
                                <span class="helper-text red-text">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" id="password" value="{{old('password')}}">
                            <label for="password">Password</label>
                            @if($errors->has('password'))
                                <span class="helper-text red-text">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="password" name="password_confirmation" id="password-confirm" value="{{old('password-confirm')}}">
                            <label for="password-confirm">Confirm Password</label>
                            @if($errors->has('password-confirm'))
                                <span class="helper-text red-text">{{$errors->first('password-confirm')}}</span>
                            @endif
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn col s12 m12 l12 xl12 gradient-bg">Reset Password</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
