@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Add Department</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('departments.store')}}" method="POST">
                            <div class="input-field">
                                <input type="text" name="dept_name" id="dept_name" class="validate">
                                <label for="dept_name">Department Name</label>
                                <span class="{{$errors->has('dept_name') ? 'helper-text red-text' : '' }}">{{$errors->first('dept_name')}}</span>
                            </div>
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a href="/departments">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection