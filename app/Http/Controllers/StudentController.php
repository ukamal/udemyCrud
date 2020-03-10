<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Students::paginate(5);

        return view('welcome',compact('students'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required'
        ]);

        $student = new Students;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->image = $request->image;
        $student->save();

        return redirect(route('home'))->with('successMsg','Student Added Successfully!');
    }
    
    public function edit($id){
        $students = Students::find($id);
        return view('edit',compact('students'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $student = Students::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return redirect(route('home'))->with('successMsg','Student Updated Successfully!');
    }

    public function delete($id){
        Students::find($id)->delete();
        return redirect(route('home'))->with('successMsg','Student Deleted Successfully!');
    }


}






