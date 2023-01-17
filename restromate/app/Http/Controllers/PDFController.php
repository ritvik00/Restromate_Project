<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generateInvoicePDF()
    {
        $pdf = PDF::loadView('myPDF');

        return $pdf->download('nicesnippets.pdf');
    }

    public function generateInvoicePDFview()
    {
        $pdf = PDF::loadView('myPDF');
        return $pdf->stream('nicesnippets.pdf');
    }

}
