<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    /**
     * Display the document request page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Return the view for the document request page
        return view('document-request'); // Blade file: resources/views/document-request.blade.php
    }

    public function barangayClearance()
    {
        return view('barangay-clearance');
    }

    public function certificateOfResidency()
    {
        return view('certificate-of-residency');
    }

    public function indigencyCertificate()
    {
        return view('indigency-certificate');
    }

    public function barangayID()
    {
        return view('barangay-id');
    }

    public function businessPermit()
    {
        return view('business-permit');
    }

    public function cedula()
    {
        return view('cedula');
    }

}
