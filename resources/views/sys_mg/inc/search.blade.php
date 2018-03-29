{{-- Search --}}
<div class="row mb-0">
    <ul class="collapsible">
        <li>
            <div class="collapsible-header">
                <i class="material-icons">search</i>
                Search {{$title}}(s)
            </div>
            <div class="collapsible-body">
                <div class="row mb-0">
                    <form action="{{route($route)}}" method="POST">
                        @csrf()
                        <div class="input-field col s12 m8 offset-m1 l8 offset-l1 xl7 offset-xl1 mb-0 mt-0">
                            @if(isset($type))
                                <input id="search" type="number" name="search" >
                            @else
                                <input id="search" type="text" name="search" >
                            @endif
                            <label for="search">{{$title}} Name</label>
                            <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">
                                {{$errors->has('search') ? $errors->first('search') : '' }}
                            </span>
                        </div>
                        <button type="submit" class="btn waves-effect waves-light mt-5 col s6 offset-s3 m2 l2">Search</button>
                    </form>
                </div>
            </div>
        </li>
    </ul>
</div>
{{-- Search END --}}