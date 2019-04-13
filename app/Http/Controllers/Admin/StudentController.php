<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Student;
use App\Branch;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$students = Student::get();
        $branches = Branch::get();
        return view('admin.student', compact('students', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'branch' => 'required',
        ]);

        if($request->fullname == "" && $request->email == "" && $request->mobile == "" && $request->brancnh == "")
        {
            return redirect()->back();
        } else {
            $student = new Student();
            $student->fullname = $request->fullname;
            $student->email = $request->email;
            $student->mobile = $request->mobile;
            $student->branch = $request->branch;

            $student->save();
            $student['branchname'] = $student->getBranch['name']; 

            return response()->json($student);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student = Student::find($request->id);
        $student->fullname = $request->fullname;
        $student->email = $request->email;
        $student->mobile = $request->mobile;
        $student->branch = $request->branch;
        $student->save();
        $student['branchname'] = $student->getBranch['name']; 
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = Student::find($request->id)->delete();
        return response()->json();
    }
}
