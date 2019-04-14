<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Payment;
use App\Student;
use App\Offer;
use App\Branch;

class PaymentController extends Controller
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
        $payments = Payment::get();
        $students = Student::get();
        $offers = Offer::get();
    
        return view('admin.payment', compact('payments','offers', 'students'));
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
        $payment= new Payment();
        $payment->student = $request->student;
        $payment->offer = $request->offer;
        $payment->amount = $request->amount;
        $payment->branch = $request->branch;

        $payment->save();
        $payment['studentfullname'] = $payment->getStudent['fullname'];
        $payment['offertitle'] = $payment->getOffer['title'];
        $payment['branchname'] = $payment->getBranch['name'];
        return response()->json($payment);
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
        $payment = Payment::find($request->id);
        $payment->student = $request->student;
        $payment->offer = $request->offer;
        $payment->amount = $request->amount;

        $payment->save();
        $payment['studentfullname'] = $payment->getStudent['fullname'];
        $payment['offertitle'] = $payment->getOffer['title'];
        $payment['branchname'] = $payment->getBranch['name'];
        return response()->json($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
