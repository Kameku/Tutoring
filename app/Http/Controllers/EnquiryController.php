<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Http\Requests\EnquiryRequest;
use App\Mail\confirmationEnquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {
        $enquirys = Enquiry::all();
        return view('enquiry.index')->with([
            'enquirys' => $enquirys,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnquiryRequest $request)
    {
        Enquiry::create($request->all());
        // Enquiry::create(request()->all());
        $enquirys = Enquiry::all();
        $idLinkEnrolment = ($enquirys->last()->id);
        $linkEnrolment = url('enrolment.create/'.$idLinkEnrolment);
        $infoMsg = request()->all();
        Mail::to(request()->parent_email)->queue(new confirmationEnquiryMail($infoMsg, $linkEnrolment));
        return redirect()->route('welcome.index')
            ->withSuccess('Your inquiry was generated correctly, an advisor will contact you soon, in your email we will send the enrollment link, so you can complete the registration');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        $today = date('Y-m-d'); //me genera la fecha actual
        return view('enquiry.show')->with([
            'enquiry' => $enquiry,
            'today' => $today,// envio la fecha a la vista de show, paraa usarla en otros atibutos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
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
    public function update(Enquiry $enquiry)
    {

        $enquiry->update(request()->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {   

        $enquiry->delete(); 
        return redirect()->back();
       
    }
}
