@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Update Employee</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('employees.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="first_name" id="first_name" value="{{old('first_name') ? : $employee->first_name}}">
                                <label for="first_name">First Name</label>
                                <span class="{{$errors->has('first_name') ? 'helper-text red-text' : ''}}">{{$errors->first('first_name')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="last_name" id="last_name" value="{{old('last_name') ? : $employee->last_name}}">
                                <label for="last_name">Last Name</label>
                                <span class="{{$errors->has('first_name') ? 'helper-text red-text' : ''}}">{{$errors->first('first_name')}}</span>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" value="{{old('email') ? : $employee->email}}">
                                <label for="email">Email</label>
                                <span class="{{$errors->has('email') ? 'helper-text red-text' : ''}}">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                            <i class="material-icons prefix">person_outline</i>
                                <input type="number" name="age" id="age" value="{{old('age') ? : $employee->age}}">
                                <label for="age">age</label>
                                <span class="{{$errors->has('age') ? 'helper-text red-text' : ''}}">{{$errors->has('age') ? $errors->first('age') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 m6 xl4">
                                <i class="material-icons prefix">contact_phone</i>
                                <input type="number" name="phone" id="phone" value="{{old('phone') ? : $employee->phone}}">
                                <label for="phone">Phone</label>
                                <span class="{{$errors->has('phone') ? 'helper-text red-text' : ''}}">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">add_location</i>
                                <textarea name="address" id="address" class="materialize-textarea" >{{Request::old('address') ? : $employee->address}}</textarea>
                                <label for="address">Address</label>
                                <span class="{{$errors->has('address') ? 'helper-text red-text' : ''}}">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">person_outline</i>
                                <select name="gender">
                                    <option value="" disabled>Choose a gender</option>
                                    <!--
                                        make the option active which matches the employee gender
                                    -->
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}" {{old('gender') ? 'selected' : '' }} {{ $employee->empGender==$gender ? 'selected' : '' }} >{{$gender->gender_name}}</option>
                                    @endforeach
                                </select>
                                <label>Gender</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">attach_money</i>
                                <select name="salary">
                                    <option value="" disabled>Choose a Salary</option>
                                    @foreach($salaries as $salary)
                                        <option value="{{$salary->id}}" {{old('salary') ? 'selected' : ''}} {{ $employee->empSalary==$salary ? 'selected' : '' }} >${{$salary->s_amount}}</option>
                                    @endforeach
                                </select>
                                <label>Salary</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">business</i>
                                <select name="department">
                                    <option value="" disabled>Choose a department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{old('department') ? 'selected' : ''}} {{ $employee->empDepartment==$department ? 'selected' : '' }} >{{$department->dept_name}}</option>
                                    @endforeach
                                </select>
                                <label>Department</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">grid_on</i>
                                <select name="state">
                                    <option value="" disabled >Choose a State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" {{ old('state') ? 'selected' : '' }} {{ $employee->empState==$state ? 'selected' : '' }} >{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                                <label>State</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">location_city</i>
                                <select name="city">
                                    <option value="" disabled>Choose a City</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ old('city') ? 'selected' : '' }} {{ $employee->empCity==$city ? 'selected' : '' }} >{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                                <label>City</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">location_on</i>
                                <select name="country">
                                    <option value="" disabled >Choose a Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{ $employee->empCountry==$country ? 'selected' : '' }}>{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                                <label>Country</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="join_date" id="join_date" class="datepicker" value="{{Request::old('join_date') ? : $employee->join_date}}">
                                <label for="join_date">date joined</label>
                                <span class="{{$errors->has('join_date') ? 'helper-text red-text' : ''}}">{{$errors->has('join_date') ? $errors->first('join_date') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="birth_date" id="birth_date" class="datepicker" value="{{Request::old('birth_date') ? : $employee->birth_date}}">
                                <label for="birth_date">Date of birth</label>
                                <span class="{{$errors->has('birth_date') ? 'helper-text red-text' : ''}}">{{$errors->has('birth_date') ? $errors->first('birth_date') : '' }}</span>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">business</i>
                                <select name="division">
                                    <option value="" disabled >Choose a Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}" {{ old('division') ? 'selected' : '' }} {{ $employee->empDivision==$division ? 'selected' : '' }} >{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                <label>Division</label>
                            </div>
                            <div class="file-field input-field col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2">
                                <div class="btn">
                                    <span>Picture</span>
                                    <input type="file" name="picture">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value="{{old('picture') ? : $employee->picture }}">
                                    <span class="{{$errors->has('picture') ? 'helper-text red-text' : ''}}">{{$errors->has('picture') ? $errors->first('picture') : ''}}</span>
                                </div>
                            </div>
                        </div>
                        @method('PUT')
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/employees">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection