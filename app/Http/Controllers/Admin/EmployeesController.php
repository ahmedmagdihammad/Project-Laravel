<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Employe;
use App\Description;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employe::get();
        $description = Description::get();
        return view('admin.hrmanagement.Employee', compact('employees', 'description'));
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
        $employe = $this->validate(request(), [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'job' => 'required'
        ]);

        $employe = new Employe;
        $employe->name = $request->name;
        $employe->mobile = $request->mobile;
        $employe->email = $request->email;
        $employe->job = $request->job;
        $employe->save();
        $employe['employetitle'] = $employe->getDescription['title'];
        return response()->json($employe);
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
        $employe = $this->validate(request(), [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'job' => 'required'
        ]);
        
        $employe = Employe::find($request->id);
        $employe->name = $request->name;
        $employe->mobile = $request->mobile;
        $employe->email = $request->email;
        $employe->job = $request->job;
        $employe->save();
        $employe['employetitle'] = $employe->getDescription['title'];
        return response()->json($employe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employe = Employe::find($request->id)->delete();
        return response()->json();
    }
}
