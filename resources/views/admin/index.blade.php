@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Admin Management</h4>
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
                                        <div class="row">
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