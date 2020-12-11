<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
    
    public function enrolment()
    {
        
        $enquirys = Enquiry::all();
        return view('enquiry.enrolmentDetails')->with([
            'enquirys' => $enquirys,
        ]);
        
    }
   
    
}
