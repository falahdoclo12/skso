<?php

namespace App\Http\Controllers;

use App\Models\Boq;
use App\Models\designators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoqController extends Controller
{
    public function index()
    {
        $boqs = Boq::all();
        return view('pages.boq', compact('boqs'));
    }

    public function create()
    {
        $designator = designators::all();
        return view('pages.create-boq', compact('designator'));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('/', 'public');

        $boq = new Boq();
        $boq->name = $fileName;
        $boq->path = $filePath;
        $boq->save();

        return redirect()->route('boq.index')->with('success', 'File uploaded successfully.');
    }

    public function download(Request $request)
    {
        // Retrieve the BOQ file path from the request
        $filePath = $request->input('boq_file');

        // Check if the BOQ file exists
        if (Storage::disk('public')->exists($filePath)) {
            // Get the full file path
            $fullFilePath = storage_path('app/public/' . $filePath);

            // Set the appropriate headers for file download
            $headers = [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . basename($fullFilePath) . '"',
            ];

            // Return the file download response
            return response()->download($fullFilePath, basename($fullFilePath), $headers);
        } else {
            return response('BOQ file not found', 404);
        }
    }

    public function destroy($id)
    {
        $boq = Boq::findOrFail($id);
        Storage::disk('public')->delete($boq->path);
        $boq->delete();

        return redirect()->route('boq.index')->with('success', 'File deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $boq = Boq::findOrFail($id);

        // Handle the update logic here

        return redirect()->route('boq.index')->with('success', 'File updated successfully.');
    }
}
