<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        return view('staff.index',[
            'all_data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validation($request, "create");

        $unique_photo_name_create ='';

        if($request -> hasFile('photo')) {

            $img = $request -> file('photo');
            $unique_photo_name_create = md5(time().rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/staff_img'), $unique_photo_name_create);

        } else {
             $unique_photo_name_create = md5(time().rand()) . "png";
             copy("media/asset_img/default.png", "media/staff_img/".$unique_photo_name_create); 
        }

        Staff::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'uname' => $request -> uname,
            'cell' => $request -> cell,
            'photo' => $unique_photo_name_create
        ]);

        return back() -> with('success','Thank you '. $request -> name . ', you are registered !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Staff::find($id);
        return view('staff.show', [
            'user_data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Staff::find($id);
        return view('staff.edit', [
            'edit_data' => $data
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
        // $this -> validation($request); 

        $update_data = Staff::find($id);
        $unique_photo_name_update = $update_data -> photo;

        if($request -> hasFile('photo')) {
            unlink("media/staff_img/".$unique_photo_name_update);
            $img = $request -> file('photo');
            $unique_photo_name_update = md5(time().rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/staff_img'), $unique_photo_name_update);
        }

        $update_data -> name = $request -> name;
        $update_data -> email = $request -> email;
        $update_data -> uname = $request -> uname;
        $update_data -> cell = $request -> cell;
        $update_data -> photo = $unique_photo_name_update;

        $update_data -> update();
        return back() -> with('success', $request -> name . ', your information updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Staff::find($id);
        $delete_data -> delete();
        return back() -> with('success','DATA MOVED TO TRASH !!');
    }

    // Trash
    public function trash()
    {
        $data = Staff::onlyTrashed()-> get();
        return view('staff.trash',[
            'all_data' => $data
        ]);
    }

    // Restore All
    public function restoreAll()
    {
        Staff::onlyTrashed()->restore();

        return back() -> with('info', 'All Data Restored !');
    }

    // Delete All
    public function deleteAll()
    {
        $staff = Staff::onlyTrashed()->get();

        foreach($staff as $single_staff) {
            $staff_photo = $single_staff->photo;
            unlink("media/staff_img/".$staff_photo);
        }

        Staff::onlyTrashed()->forceDelete();
       
         return back() -> with('danger', 'All Data Removed Permanently !!');
    }

    // Restore
    public function restore($id)
    {
        Staff::onlyTrashed()
                ->where("id", $id)    
                ->restore();

        return back() -> with('info', 'Data restored !');
    }
    
    // Delete From Trash
    public function deleteFromTrash($id)
    {
        $staff = Staff::onlyTrashed()
                ->where('id', $id)
                ->get();

        unlink("media/staff_img/".$staff[0]->photo);
        

        Staff::onlyTrashed()
               ->where("id", $id)
               ->forceDelete();

        return back() -> with('danger', 'Data Remmoved Permanently !!');
    }

        //  Validation method

        public function validation($request, $validation_for = "create")
        {
           if( $validation_for == "create") {
            $this -> validate($request, [
                'name' => ['required'],
                'email' => ['required', 'unique:staff', 'email'],
                'cell' => ['required', 'unique:staff', 'numeric', 'starts_with:01, 8801'],
                'uname' => ['required', 'min:5', 'max:10', 'unique:staff']
            ],[
                'email.email' => "Please enter valid email address",
                'cell.numeric' => "Please enter valid cell number",
                // 'uname.max:10' => "The username must be no more than 10 charachters"
            ]);
           } else {
                $this -> validate($request, [
                    'name' => ['required'],
                    'email' => ['required',  'email'],
                    'cell' => ['required',  'numeric', 'starts_with:01, 8801'],
                    'uname' => ['required', 'min:5', 'max:10'] 
                ],[
                    'email.email' => "Please enter valid email address",
                    'cell.numeric' => "Please enter valid cell number",
                    // 'uname.max:10' => "The username must be no more than 10 charachters"
                ]);
           }
        }
}
