<?php

namespace App\Http\Controllers;

use App\Exports\QosExport;
use App\Models\Qos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class QosController extends Controller
{
    public function index()
    {
        $qosData = Qos::all();

        return view('pages.qos', compact('qosData'));
    }

    public function create()
    {
        return view('pages.create-qos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'availability' => 'required',
            'packet_loss' => 'required',
            'throughput' => 'required',
            'latency' => 'required',
            'jitter' => 'required',
            'pm' => 'required',
            'ttr' => 'required',
            'nilai_availability' => 'required',
            'nilai_packet_loss' => 'required',
            'nilai_throughput' => 'required',
            'nilai_latency' => 'required',
            'nilai_jitter' => 'required',
            'nilai_pm' => 'required',
            'nilai_ttr' => 'required',
            'qos_file' => 'required|file|mimes:xlsx'
        ]);

        $qos = new QoS();
        $qos->availability = $request->input('availability');
        $qos->packet_loss = $request->input('packet_loss');
        $qos->throughput = $request->input('throughput');
        $qos->latency = $request->input('latency');
        $qos->jitter = $request->input('jitter');
        $qos->pm = $request->input('pm');
        $qos->ttr = $request->input('ttr');
        $qos->nilai_availability = $request->input('nilai_availability');
        $qos->nilai_packet_loss = $request->input('nilai_packet_loss');
        $qos->nilai_throughput = $request->input('nilai_throughput');
        $qos->nilai_latency = $request->input('nilai_latency');
        $qos->nilai_jitter = $request->input('nilai_jitter');
        $qos->nilai_pm = $request->input('nilai_pm');
        $qos->nilai_ttr = $request->input('nilai_ttr');

        if ($request->hasFile('qos_file')) {
            $file = $request->file('qos_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('app/qos'), $fileName);
            $qos->qos_file = $fileName;
        }

        $qos->save();

        return redirect()->route('qos.index')->with('success', 'QoS data has been created successfully.');
    }

    public function download($id)
    {
        $qosData = Qos::findOrFail($id);
        $filePath = public_path('app/qos/' . $qosData->qos_file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'File not found.');
    }

    public function destroy($id)
    {
        $qosData = Qos::findOrFail($id);
        $filePath = public_path('app/qos/' . $qosData->qos_file);

        if (file_exists($filePath)) {
            Storage::delete($filePath);
        }

        $qosData->delete();

        return redirect()->back()->with('success', 'QoS data has been deleted successfully.');
    }
}