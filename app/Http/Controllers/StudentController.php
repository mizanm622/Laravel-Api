<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\Builder\Stub;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=Student::all();
        return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'classId'=>'required',
            'sessionId'=>'required',
            'name'=>'required|unique:students|max:25',
            'phone'=>'required|unique:students|max:25',
            'email'=>'required|unique:students|max:25',


        ]);
        $data=array();
        $data['classId']=$request->classId;
        $data['sessionId']=$request->sessionId;
        $data['name']=$request->name;
        $data['address']=$request->address;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['photo']=$request->photo;
        $data['gender']=$request->gender;
        $data['password']=Hash::make($request->password);

        DB::table('students')->insert($data);
        //Student::create($request->all());
        return response('Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $student=Student::findorfail($id);
       return response()->json($student);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Student::where('id',$id)->update($request->all());
        return response('Data Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $img=Student::where('id',$id)->first();
        $img_path=$img->photo;
        unlink($img_path); //delete image from folder
        Student::where('id',$id)->delete();
        return response('Data Successfully Deleted');
    }
}
