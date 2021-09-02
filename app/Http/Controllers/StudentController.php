<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /* Load all data */
    public function index() 
    {
        $data = Student::all();
        return view('student.index', [
            'all_data' => $data
        ]);
    }

    /* Add new data */
    public function create()
    {
        return view('student.create');
    }

    /* Edit data */
    public function edit($id)
    {
        $data = Student::find($id);
        return view('student.edit', [
            'edit_data' => $data
        ]);
    }

    /* Update data */
    public function update(Request $request, $id)
    {
        // $this -> validation($request);
        
        $update_data = Student::find($id);
        $unique_photo_name_update = $update_data -> photo;

        if($request -> hasFile('photo')) {
            unlink("media/student_img/".$unique_photo_name_update);
            $img = $request -> file('photo');
            $unique_photo_name_update = md5(time().rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/student_img'), $unique_photo_name_update);
        }

        $update_data -> name = $request -> name;
        $update_data -> email = $request -> email;
        $update_data -> uname = $request -> uname;
        $update_data -> cell = $request -> cell;
        $update_data -> photo = $unique_photo_name_update;

        $update_data -> update();
        return back() -> with('success', $request -> name . ', your information updated !');
        
    }

    /* Show data */
    public function show($id)
    {
        $data = Student::find($id);
        return view('student.show', [
            'user_data' => $data
        ]);
    }
    
    /* Store data */
    public function store(Request $request)
    {
        $this -> validation($request);

        $unique_photo_name_create ='';
        if($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $unique_photo_name_create = md5(time().rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/student_img'), $unique_photo_name_create);
        } else {
            $unique_photo_name_create = md5(time().rand()) . "png";
            copy("media/asset_img/default.png", "media/student_img/".$unique_photo_name_create); 
        }

        Student::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'uname' => $request -> uname,
            'cell' => $request -> cell,
            'photo' => $unique_photo_name_create
        ]);

        return back() -> with('success','Thank you '. $request -> name . ', you are registered !');
    }

    /* Delete data */
    public function destroy($id)
    {
        $delete_data = Student::find($id);
        $delete_data -> delete();
        return back() -> with('success','Data has been deleted !');
    }

    // Trash 
    public function trash()
    {
        $data = Student::onlyTrashed()-> get();
        return view('student.trash',[
            'all_data' => $data
        ]);
    }

    // Restore All
    public function restoreAll()
    {
        Student::onlyTrashed()->restore();

        return back() -> with('info', 'All Data Restored !');
    }

    // Delete All
    public function deleteAll()
    {
        $students = Student::onlyTrashed()->get();

        foreach($students as $student) {
            $student_photo = $student->photo;
            unlink("media/student_img/".$student_photo);
        }

        Student::onlyTrashed()->forceDelete();

        return back() -> with('danger', 'All Data Removed Permanently !!');
    }

    // Restore
    public function restore($id)
    {
        Student::onlyTrashed()
                ->where("id", $id)    
                ->restore();

        return back() -> with('info', 'Data restored !');
    }
    
    // Delete From Trash
    public function deleteFromTrash($id)
    {
        $student = Student::onlyTrashed()
                ->where('id', $id)
                ->get();

        unlink("media/student_img/".$student[0]->photo);

        Student::onlyTrashed()
               ->where("id", $id)
               ->forceDelete();

        return back() -> with('danger', 'Data Remmoved Permanently !!');
    }

        //  Validation method

        public function validation($request)
        {
            $this -> validate($request, [
                'name' => ['required'],
                'email' => ['required', 'unique:students', 'email'],
                'cell' => ['required', 'unique:students', 'numeric', 'starts_with:01, 8801'],
                'uname' => ['required', 'min:5', 'max:10', 'unique:students']
            ],[
                'email.email' => "Please enter valid email address",
                'cell.numeric' => "Please enter valid cell number",
                // 'uname.max:10' => "The username must be no more than 10 charachters"
            ]);
        }
}
