<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentsController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *  We are using Eloquent ORM for database handling.
         *  DB library can also be used, check the docs for more
         *  information.
         */
        
        /**
         *  it's retrieving all rows from departments table.
         *  we can also use 'All' instead of paginate which will return
         *  all rows from departments table.
         */
        
        $departments = Department::orderBy('dept_name','asc')->Paginate(4);
        
        /**
         *  we can also do orderBy('dept_name,'desc') which means it'll return
         *  rows in descending order.
         */

        /**
         *  returning the view with data which is $departments.
         *  if we are returning an array than we'll use,
         *  return view('myview')->with($array);
         */

        return view('sys_mg.departments.index')->with('departments',$departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         *  this will simply return the create view which is
         *  just a form for creating a new department
         */

        return view('sys_mg.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  using laravel's pre-build validation class. 
         *  it's first argument will be Request which is $request
         *  and second argument will be an array which will specify
         *  the validation rules.
         *  format is,
         *  'form field name' => 'rule'
         *  unique:departments means it should be unique to dept_name
         *  in departments table (note that input name and column name 
         *  should be same)
         */
        
        $this->validate($request,[
            'dept_name' => 'required|min:4|unique:departments'
        ]);

        /**
         *  create new Department.
         *  add value(s) to it's fields.
         *  and save (store it to the database).
         */
        
        $department = new Department();
        $department->dept_name = $request->input('dept_name');
        $department->save();
        
        /**
         *  redirect us to the /departments route with a message.
         *  this message will make a toast that we have created in
         *  inc/alert view which is included in layouts/app view.
         *  see the inc/alert view
         */
        
         return redirect('/departments')->with('info','department has been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         *  you can use this method if you wanna diplay a
         *  single department(resource) in a different view.
         */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        /**
         *  find a department(resource) by it's id which
         *  is coming from our route.
         */
        
         $department = Department::find($id);
        
         /**
         *  return the view with the specified resource.
         */
        
         return view('sys_mg.departments.edit')->with('department',$department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dept_name' => 'required|unique:departments,dept_name,'.$id.'|min:4'
        ]);
        
        /**
         *  it's the same as creating a new resource,
         *  but we are modifying an existing resource
         *  so first we'll find it by it's id then, save it. 
         */
        
        $department = Department::Find($id);
        $department->dept_name = $request->input('dept_name');
        $department->save();

        /**
         *  redirecting with a message.
         */
        return redirect('/departments')->with('info','Selected Department has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         *  find the specified resource and delete it.
         *  then redirect us with a message.
         */
        $department = Department::find($id);
        $department->delete();
        return redirect('/departments')->with('info','Selected Department has been Deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $departments = Department::where( 'dept_name' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('dept_name','asc')
            ->paginate(4);
        return view('sys_mg.departments.index')->with([ 'departments' => $departments ,'search' => true ]);
    }
}
