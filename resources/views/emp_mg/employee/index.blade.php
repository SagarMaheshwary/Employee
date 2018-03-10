@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="grey-text text-darken-1">Manage Employees</h4>
            <!-- Show All Employee List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Employee List</h5>
                    <!-- Table that shows Employee List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-1">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Division</th>
                                <th>Join Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are any employee to render in view -->
                            @if($employees->count())
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->id}}</td>
                                        <td>
                                        <img class="emp-img" src="{{asset('storage/employee_images/'.$employee->picture)}}">
                                        </td>
                                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                        <td>{{$employee->empDepartment->dept_name}}</td>
                                        <td>{{$employee->empDivision->division_name}}</td>
                                        <td>{{$employee->join_date}}</td>
                                        <td>
                                        <a href="{{route('employees.show',$employee->id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">list</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <!-- if there are no employees then show this message -->
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">No Employees have been created yet!</h6></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- employees Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$employees->links('vendor.pagination.default',['paginator' => $employees])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
<!-- This is the button that is located at the right bottom, that navigates us to employees.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('employees.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection