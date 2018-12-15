<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
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
         *  It works the same as employeescontroller
         *  please see the comments for explaination
         *  on what's going on here.
         */
        
        $admins = Admin::Paginate(4);
        return view('admin.index')->with('admins',$admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $this->validateRequest($request,NULL);
        $fileNameToStore = $this->handleImageUpload($request);
        $this->setAdmin($request ,$admin, $fileNameToStore);
        return redirect('/admins')->with('info','New Admin has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit')->with('admin',$admin);
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
        
        $admin = Admin::find($id);
        
        if($request->hasFile('picture')){

            $fileNameToStore = $this->handleImageUpload($request);
            Storage::delete('public/admins/'.$admin->picture);
        }else{
            $fileNameToStore = '';
        }
        
        $this->setAdmin($request, $admin ,$fileNameToStore);
        return redirect('/admins')->with('info','selected admin has been updated');
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
         *  Check if the admin is not the
         *  current authenticated user
         */
        if($id == Auth::user()->id){
            //redirect to admins route
            return redirect('/admins')->with('info','Authenticated Admin cannot be deleted!');
        }
        
        $admin = Admin::find($id);

        //delete the admin picture
        Storage::delete('public/admins/'.$admin->picture);
        $admin->delete();
        return redirect('/admins')->with('info','selected admin has been deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required',
            'options' => 'required',
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $admins = Admin::where( $option , 'LIKE' , '%'.$str.'%' )
            ->orderBy($option,'asc')
            ->paginate(4);
        return view('admin.index')->with([ 'admins' => $admins ,'search' => true ]);
    }

    /**
     *  Validate all the inputs
     */
    private function validateRequest(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'   =>  'required|min:3',
            'last_name'    =>  'required|min:3',
            //if we are updating admin but not changing password.
            'password'     =>  ''.( $id ? 'nullable|min:7' : 'required|min:7' ),
            'username'     =>  'required|unique:admins,username,'.($id ? : '' ).'|min:3',
            'email'        =>  'required|email|unique:admins,email,'.($id ? : '' ).'|min:7',
            'picture'      =>  ''.($request->hasFile('picture')  ? 'required|image|max:1999' : '')
        ]);
    }

    /**
     * Add or update an admin
     */
    private function setAdmin(Request $request , Admin $admin , $fileNameToStore){
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        if($request->input('password') != NULL){
            $admin->password = bcrypt($request->input('password'));
        }
        if($request->hasFile('picture')){
            $admin->picture = $fileNameToStore;
        }
        $admin->save();
    }

    /**
     *  Handle Image Upload
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
            $path = $request->file('picture')->storeAs('public/admins' , $fileNameToStore);
        }
        /**
         *  return the file name so we can add it to database.
         */
        return $fileNameToStore;
    }
}
