@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Admin Management</h4>
    
    {{-- Search --}}
    <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Admin
                </div>
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('admins.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search Admin</label>
                                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                            </div>
                            <div class="input-field col s12 m6 l4 xl4">
                                <select name="options" id="options">
                                    <option value="first_name">First Name</option>
                                    <option value="last_name">Last Name</option>
                                    <option value="username">Username</option>
                                    <option value="email">Email</option>
                                </select>
                                <label for="options">Search by:</label>
                            </div>
                            <br>
                            <button type="submit" class="btn waves-effect waves-light col s6 offset-s3 m4 offset-m4 l2 xl2">Search</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    {{-- Search END --}}
    
    <div class="row">
        <!-- Show All Admins List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Admins List</h5>
                    <!-- Table that shows Admins List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($admins->count())
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>
                                            <img class="emp-img" src="{{asset('storage/admins/'.$admin->picture)}}">
                                        </td>
                                        <td>{{$admin->first_name}} {{$admin->last_name}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            <div class="row mb-0">
                                                <div class="col">
                                                    <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('admins.destroy',$admin->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    {{-- if there are no admins then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">No Admins Found!</h6></td>
                                    </tr>
                                @endif
                                {{-- If we are searching then show this link --}}
                                @if(isset($search))
                                    <tr>
                                        <td colspan="4">
                                            <a href="/admins" class="right">Show All</a>
                                        </td>
                                    </tr>
                                @endif
                        </tbody>
                    </table>
                    <!-- Admins Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$admins->links('vendor.pagination.default',['paginator' => $admins])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to admins.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('admins.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection