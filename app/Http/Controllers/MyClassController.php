<?php

namespace App\Http\Controllers;

use App\Models\myclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class=DB::table('classes')->get();
        return response()->json($class);

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
            'className'=>'required|unique:classes|max:25'
        ]);

        $data=array();
        $data['className']=$request->className;
        DB::table('classes')->insert($data);
        return response('Data Inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $show= DB::table('classes')->where('id',$id)->first();
        return response()->json($show);
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
        $data=array();
        $data['className']=$request->className;
        DB::table('classes')->where('id',$id)->update($data);
        return response('Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return response('Data deleted successfully');
    }
}
