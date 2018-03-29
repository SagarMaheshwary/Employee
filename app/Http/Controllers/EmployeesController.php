<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\Department;
use App\Country;
use App\City;
use App\Salary;
use App\Division;
use App\State;
use App\Gender;
use DB;

class EmployeesController extends Controller
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
        $employees = Employee::Paginate(4);
        return view('employee.index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         *  Get Departments so we can show department
         *  name on the department dropdown in the view
         */
        $departments = Department::orderBy('dept_name','asc')->get();
        /**
         *  this and other objects works the same as department
         */
        $countries = Country::orderBy('country_name','asc')->get();
        $cities = City::orderBy('city_name','asc')->get();
        $states = State::orderBy('state_name','asc')->get();
        $salaries = Salary::orderBy('s_amount','asc')->get();
        $divisions = Division::orderBy('division_name','asc')->get();
        $genders = Gender::orderBy('gender_name','asc')->get();
        /**
         *  return the view with an array of all these objects
         */
        return view('employee.create')->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders
        ]);
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
         *  validateRequest is a method defined in this controller
         *  which will validate  the form. we have created 
         *  it so we can reuse it in the update method with 
         *  different parameters.
         */
        $this->validateRequest($request,null);
        
        /**
         *  Note!
         *  before using storage we need to link it to 
         *  the public folder by typing the command,
         *  php artisan storage:link  
         */

        /**
         * 
         *  Handle the image file upload which will be stored
         *  in storage/app/public/employee_images
         */
        $fileNameToStore = $this->handleImageUpload($request);

        /**
         *  Create new object of Employee
         */
        $employee = new Employee();
        
        /**
         *  setEmployee is also a method of this controller
         *  which i have created, so i can use it for update 
         *  method.
         */
        $this->setEmployee($employee,$request,$fileNameToStore);
        
        return redirect('/employees')->with('info','New Employee has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show')->with('employee',$employee);
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
         *  this is same as create but with an existing
         *  employee
         */
        $departments  = Department::orderBy('dept_name','asc')->get();
        $countries    = Country::orderBy('country_name','asc')->get();
        $cities       = City::orderBy('city_name','asc')->get();
        $states       = State::orderBy('state_name','asc')->get();
        $salaries     = Salary::orderBy('s_amount','asc')->get();
        $divisions    = Division::orderBy('division_name','asc')->get();
        $genders      = Gender::orderBy('gender_name','asc')->get();

        $employee = Employee::find($id);
        return view('employee.edit')->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders,
            'employee'     => $employee
        ]);
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

        $this->validateRequest($request,$id);
        $employee = Employee::find($id);
        $old_picture = $employee->picture;
        if($request->hasFile('picture')){
            //Upload the image
            $fileNameToStore = $this->handleImageUpload($request);
            //Delete the previous image
            Storage::delete('public/employee_images/'.$employee->picture);
        }else{
            $fileNameToStore = '';
        }
        
        /**
         *  updating an existing employee with setEmployee
         *  method
         */
        $this->setEmployee($employee,$request,$fileNameToStore);
        return redirect('/employees')->with('info','Selected Employee has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Storage::delete('public/employee_images/'.$employee->picture);
        return redirect('/employees')->with('info','Selected Employee has been deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search'   => 'required|min:1',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $employees = Employee::where($option, 'LIKE' , '%'.$str.'%')->Paginate(4);
        return view('employee.index')->with(['employees' => $employees , 'search' => true ]);
    }

    /**
     * This method is used for validating the form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    private function validateRequest($request,$id){
        /**
         *  specifying the validation rules 
         */
        /**
         *  Below in Picture validation rules we are first checking
         *  that if there is an image, if not then don't apply the
         *  validation rules. the reason we are doing this is because
         *  if we are updating an employee but not updating the image. 
         */
        return $this->validate($request,[
            'first_name'     =>  'required|min:3|max:50',
            'last_name'      =>  'required|min:3|max:50',
            'age'            =>  'required|min:2|max:2',
            'address'        =>  'required|min:10|max:500',
            'phone'          =>  'required|max:13',
            'gender'         =>  'required',
            'department'     =>  'required',
            'division'       =>  'required',
            'salary'         =>  'required',
            'state'          =>  'required',
            'city'           =>  'required',
            'country'        =>  'required',
            'join_date'      =>  'required',
            'birth_date'     =>  'required',
            'email'          =>  'required|email|unique:employees,email,'.($id ? : '' ).'|max:250',
            'picture'        =>  ($request->hasFile('picture') ? 'required|image|max:1999' : '')
            /**
             *  if we are updating an employee but not changing the
             *  email then this will throw a validation error saying
             *  that email should be unique. that's why we need to specify
             *  the current employee to ignore the unique validation rule.
             *  Above in email rules , we are using a ternary operator simply
             *  saying that if we pass an id then it will ignore that employee
             *  (which we want in update) and if id's null then it will check
             *  every employee to be unique (which we want in create because
             *  every employee should have a unique email).
             *  check the documentation for more details, 
             *  https://laravel.com/docs/5.6/validation#rule-unique 
             */

            
        ]);
    }

    /**
     * Save a new resource or update an existing resource.
     *
     * @param  App\Employee $employee
     * @param  \Illuminate\Http\Request  $request
     * @param  string $fileNameToStore
     * @return Boolean
     */
    private function setEmployee(Employee $employee,Request $request,$fileNameToStore){
        $employee->first_name   = $request->input('first_name');
        $employee->last_name    = $request->input('last_name');
        $employee->email        = $request->input('email');
        $employee->age          = $request->input('age');
        $employee->address      = $request->input('address');
        $employee->phone        = $request->input('phone');
        //Format Date then insert it to the database
        $employee->join_date    = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('join_date'))));
        //Format Date then insert it to the database
        $employee->birth_date   = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('birth_date'))));
        $employee->gender_id    = $request->input('gender');
        $employee->division_id  = $request->input('division');
        $employee->salary_id    = $request->input('salary'); 
        $employee->dept_id      = $request->input('department');
        $employee->city_id      = $request->input('city');
        $employee->state_id     = $request->input('state');
        $employee->country_id   = $request->input('country');
        
        /**
         *  we are checking if there is an image
         *  because if we are updating an employee
         *  but not changing the employee image then
         *  it will save  '' (means null) to picture field and we don't
         *  want that. 
         */
        if($request->hasFile('picture')){
            $employee->picture = $fileNameToStore;
        }
        
        $employee->save();
    }

    /**
     * Handle image upload when creating a new resource
     * or updating an existing resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handleImageUpload(Request $request){
        if( $request->hasFile('picture') ){
            
            //get filename with extension
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            
            //get just filename
            $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            
            // get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            
            /**
             * filename to store
             * 
             *  we are appending timestamp to the file name
             *  and prepending it to the file extension just to
             *  make the file name unique.
             */
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //upload the image
            $path = $request->file('picture')->storeAs('public/employee_images',$fileNameToStore);
        }
        /**
         *  return the file name so we can add it to database.
         */
        return $fileNameToStore;
    }
}
