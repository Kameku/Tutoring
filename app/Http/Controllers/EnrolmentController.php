<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Enquiry;
use App\Enrolment;
use Illuminate\Support\Facades\Storage;


class EnrolmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Enquiry $enquiry)
    {
        return view('enrolment.create')->with([
            'enquiry' => $enquiry,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enrolment = Enrolment::create(request()->all());
        // dd($request->interventions_attachmen_e1);
        // dd(!empty($request->interventions_attachmen_e1));

        if(!empty($request->interventions_attachmen_e1)){
            $reportE1 = $request->file('interventions_attachmen_e1')->store($request->parent_email, 'reports');
            $enrolment -> update([
                'interventions_attachmen_e1' => $reportE1,
                ]);
            };
    
        if(!empty($request->interventions_attachmen_e2)){
            $reportE2 = $request->file('interventions_attachmen_e2')->store($request->parent_email, 'reports');
            $enrolment -> update([
                'interventions_attachmen_e2' => $reportE2,
                ]);
            };
            
        if(!empty($request->interventions_attachmen_e3)){
            $reportE3 = $request->file('interventions_attachmen_e3')->store($request->parent_email, 'reports');
            $enrolment -> update([
                'interventions_attachmen_e3' => $reportE3,
                ]);
            }; 
                    
                    
        return view('welcome');
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
    public function edit()
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
    public function update(Request $request, $id)
    {
        //
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
