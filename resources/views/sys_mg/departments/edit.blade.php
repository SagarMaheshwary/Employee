@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Update Department</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('departments.update',$department->id)}}" method="POST">
                            <!--
                                in value attribute of dept_name input, we are checking
                                if it has a value that we have submitted previously, else set
                                value to actual value that we are getting from $department.
                            -->
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                                <input type="text" name="dept_name" id="dept_name" value="{{Request::old('dept_name') ? : $department->dept_name}}">
                                <label for="dept_name">Department Name</label>
                                <span class="{{$errors->has('dept_name') ? 'helper-text red-text' : ''}}">{{$errors->first('dept_name')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/departments">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection