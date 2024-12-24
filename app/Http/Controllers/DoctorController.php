<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Consultation;
use App\Models\ConsultationResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index() {
        // Jumlah semua data
        $konsultasi = Consultation::count();
        $artikel = Article::count();

        return view("doctor.dashboard", [
            "konsultasi" => $konsultasi,
            "artikel" => $artikel
        ]);
    }

    public function indexArticle() {
        // Mengambil data semua artikel
        $artikel = Article::all();

        foreach ($artikel as $article) {
            $article->format_tanggal = $article->date ? Carbon::parse($article->date)
                ->format("d F Y") : "";
        }

        return view("doctor.indexArticle",[
            "artikel" => $artikel
        ]);
    }

    public function createArticle() {
        return view("doctor.createArticle");
    }

    public function storeArticle(Request $request) {
        return redirect("doctor/article")->with('message', 'Article created successfully');
    }

    public function showArticle($id) {
        return view("doctor.showArticle");
    }

    public function editArticle($id)  {
        return view("doctor.showArticle");
    }

    public function updateArticle(Request $request, $id) {
        return redirect("doctor/article")->with('message', 'Article update successfully');
    }

    public function destroyArticle($id) {
        return redirect("doctor/article")->with('message', 'Article delete successfully');
    }

    public function indexConsultation(){
    //     $konsultasi = Consultation::where('doctor_id', auth()->id())->with('user', 'child')->get();
    // return view('dokter.konsultasi.index', compact('konsultasi'));
    // sementara
        $consultations = Consultation::where('status', 'pending')->with('user', 'child')->get();
        return view("doctor.indexConsultation",compact('consultations'));
    }

    public function showConsultation() {
        return view("doctor.showConsultation");
    }

    public function sendResponse(Request $request, $consultation_id){
        $request->validate([
            'respon' => 'required|string|max:2000',
        ]);

        $consultation = Consultation::findOrFail($consultation_id);

        // Simpan respon dokter
        ConsultationResponse::create([
            'consultation_id' => $consultation->id,
            'doctor_id' => Auth::guard("doctor"), // User yang berperan sebagai dokter
            'respon' => $request->respon,
        ]);

        // Update status konsultasi menjadi "responded"
        $consultation->update(['status' => 'responded']);

        return back()->with('success', 'Respon berhasil dikirim.');
    }

    public function profileDoctor() {
        return view("doctor.profileDoctor");
    }
}