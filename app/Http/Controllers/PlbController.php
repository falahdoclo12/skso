<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class PlbController extends Controller
{
    public function index()
    {
        return view('pages.plb');
    }

    public function savePdf(Request $request)
    {
        // Retrieve the data and file name from the request
        $data = $request->input('data');
        $fileName = $request->input('fileName');

        // Generate the PDF using a PDF generation library
        $pdf = PDF::loadView('pdf-template', ['data' => $data]);

        // Save the PDF to the storage
        $pdf->save(storage_path('app/public/' . $fileName . '.pdf'));

        // Return the response with success status and file name
        return response()->json(['success' => true, 'fileName' => $fileName]);
    }

    public function previewPdf($fileName)
    {
        $filePath = public_path('pdfs/') . $fileName;

        if (!file_exists($filePath)) {
            abort(404);
        }

        //generate a temporary link to the PDF file for previewing
        $tempLink = asset('pdfs/' . $fileName);

        return view('hasil-plb', compact('tempLink'));
    }
}