<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject=Subject::all();
        return response()->json($subject);
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
            'subjectId'=>'required',
            'subjectName'=>'required|unique:subjects|max:25',
            'subjectCode'=>'required|unique:subjects|max:25'
        ]);

        //$data=array();
        //$data['subjectName']=$request->subjectName;
       // $data['subjectId']=$request->subjectId;
       // $data['subjectCode']=$request->subjectCode;
       // DB::table('subjects')->insert($data);
        Subject::create($request->all());
        return response('Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject=Subject::findorfail($id);
        return response()->json($subject);
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
        Subject::where('id',$id)->update($request->all());
        return response('Data Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::where('id',$id)->delete();
        return response('Data Successfully Deleted');
    }
}
