extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Update Salary</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('salaries.update',$salary->id)}}" method="POST">
                            <div class="input-field no-margin">
                                <i style="font-size:20px;">₹</i>
                                <input type="text" name="s_amount" id="s_amount" value="{{Request::old('s_amount') ? : $salary->s_amount}}">
                                <label for="s_amount">Salary Amount</label>
                                <span class="{{$errors->has('s_amount') ? 'helper-text red-text' : ''}}">{{$errors->first('s_amount')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/salaries">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection:                                                                                                                                                                                                    
