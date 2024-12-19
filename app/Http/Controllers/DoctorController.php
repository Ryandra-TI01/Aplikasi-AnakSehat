<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\ConsultationResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view("doctor.dashboard");
    }
    public function indexArticle()
    {
        return view("doctor.indexArticle");
    }
    public function showArticle(string $id)
    {
        return view("doctor.showArticle");
    }
    public function indexConsultation(){
    //     $konsultasi = Consultation::where('doctor_id', auth()->id())->with('user', 'child')->get();
    // return view('dokter.konsultasi.index', compact('konsultasi'));
    // sementara
        $consultations = Consultation::where('status', 'pending')->with('user', 'child')->get();
        return view("doctor.indexConsultation",compact('consultations'));
    }
    public function showConsultation(string $id){
        return view("doctor.showConsultation");
    }
    public function sendResponse(Request $request, $consultation_id)
{
    $request->validate([
        'respon' => 'required|string|max:2000',
    ]);

    $consultation = Consultation::findOrFail($consultation_id);

    // Simpan respon dokter
    ConsultationResponse::create([
        'consultation_id' => $consultation->id,
        'doctor_id' => auth()->id(), // User yang berperan sebagai dokter
        'respon' => $request->respon,
    ]);

    // Update status konsultasi menjadi "responded"
    $consultation->update(['status' => 'responded']);

    return back()->with('success', 'Respon berhasil dikirim.');
}

    public function profileDoctor(){
        return view("doctor.profileDoctor");
    }
}