<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquirys = Enquiry::all();
        // dd($enquirys); // Esta linea me permite inspeccionar el retorno de la variable
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
    public function store()
    {
        $enquiry = Enquiry::create(request()->all());
        $enquirys = Enquiry::all();
        return view('enquiry.index')->with([
            'enquirys' => $enquirys,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($enquiry)
    {
        $enquiry = Enquiry::findOrFail($enquiry);
        
        return view('enquiry.show')->with([
            'enquiry' => $enquiry,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($enquiry)
    {
        $enquiry = Enquiry::findOrFail($enquiry);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($enquiry)
    {
        $enquiry = Enquiry::findOrFail($enquiry);

        $enquiry->update(request()->all());
        // return redirect()->route('enquiry.show');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($enquiry)
    {   
        
        $enquiry = Enquiry::findOrFail($enquiry);
        $enquiry->delete(); 
        return redirect()->back();
       
    }
}
