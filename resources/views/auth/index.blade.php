@extends('layouts.auth')
@section('content')
<section>
    <div class="container row">
        <div class="col m6 offset-m3 l6 offset-l3 xl4 offset-xl4 s10 offset-s1 card card-login z-depth-4">
            <div class="card-title card-title-login gradient-bg lighten-2 white-text">
                <h5 class="center flow-text">Login to EMS</h5>
            </div>
            <div class="card-content">
                <form action="{{ route('auth.authenticate') }}" method="POST">
                    <div class="input-field">
                        <i class="material-icons prefix">mail</i>
                        <input type="email" name="email" id="email" class="validate" value="{{ old('email') ? : '' }}">
                        <label for="email">Email</label>
                        <span class="{{$errors->has('email') ? 'helper-text red-text' : '' }}">{{$errors->has('email') ? $errors->first('email') : '' }}</span>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="password" id="password">
                        <label for="password">Password</label>
                        <span class="{{$errors->has('password') ? 'helper-text red-text' : '' }}">{{$errors->has('password') ? $errors->first('password') : '' }}</span>
                    </div>
                    @csrf()
                    <p>
                        <label for="remember">
                            <input type="checkbox" id="remember" name="remember" />
                            <span>Remember Me</span>
                        </label>
                    </p>
                    <a href="{{route('password.request')}}" class="right">Forgot Password</a>
                    <br>
                    <div class="card-action">
                        <button class="btn col s12 m12 l12 xl12 waves-effect waves-light gradient-bg" type="submit" name="submit">Login</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection