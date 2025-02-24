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
        return view('document-request'); // Updated path
    }

    public function barangayClearance()
    {
        return view('document_forms.barangay-clearance'); // Updated path
    }

    public function certificateOfResidency()
    {
        return view('document_forms.certificate-of-residency'); // Updated path
    }

    public function indigencyCertificate()
    {
        return view('document_forms.indigency-certificate'); // Updated path
    }

    public function barangayID()
    {
        return view('document_forms.barangay-id'); // Updated path
    }

    public function businessPermit()
    {
        return view('document_forms.business-permit'); // Updated path
    }

    public function cedula()
    {
        return view('document_forms.cedula'); // Updated path
    }
}