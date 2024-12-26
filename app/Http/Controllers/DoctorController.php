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
        $dokter = Auth::user();
        // Mengambil data semua artikel
        $artikel = Article::where('doctor_id', $dokter->id)->get();

        foreach ($artikel as $article) {
            $article->format_tanggal = $article->date ? Carbon::parse($article->date)
                ->format("d F Y") : "";
        }

        return view("doctor.indexArticle",[
            "artikel" => $artikel
        ]);
    }

    public function createArticle() {
        $penulis = Auth::user();
        return view("doctor.showArticle", [
            "penulis" => $penulis
        ]);
    }

    public function storeArticle(Request $request) {
        $dokter = Auth::user();

        $validasi = $request->validate([
            "title" => "required",
            "content" => "required",
            "date" => "required|date",
            "image" => "image|file|max:1024|nullable|mimes:jpg,png,jpeg"
        ]);

        if ($request->hasFile("image")) {
            $validasi['image'] = $request->file('image')->store('gambar-artikel');
        }
        
        Article::create([
            "doctor_id" => $dokter->id,
            "title" => $request->title,
            "content" => $request->content,
            "date" => $request->date,
            "image" => $validasi["image"]
        ]);

        return redirect("doctor/article")->with('message', 'Article created successfully');
    }

    public function showArticle($id) {
        $penulis = Auth::user();

        $artikel = Article::find($id);

        return view("doctor.showArticle", [
            "penulis" => $penulis,
            "artikel" => $artikel
        ]);
    }

    public function editArticle($id)  {
        $penulis = Auth::user();

        $artikel = Article::find($id);

        return view("doctor.showArticle", [
            "penulis" => $penulis,
            "artikel" => $artikel
        ]);
    }

    public function updateArticle(Request $request, $id) {
        $penulis = Auth::user();
        $artikel = Article::find($id);

        $validasi = $request->validate([
            "title" => "required",
            "content" => "required",
            "date" => "required|date",
            "image" => "image|file|max:1024|nullable|mimes:jpg,png,jpeg"
        ]);

        if ($request->hasFile("image")) {
            $validasi['image'] = $request->file('image')->store('gambar-artikel');
        }

        $artikel->update([
            "doctor_id" => $penulis->id,
            "title" => $request->title,
            "content" => $request->content,
            "date" => $request->date,
            "image" => $validasi["image"]
        ]);
        
        return redirect("doctor/article")->with('message', 'Article update successfully');
    }

    public function destroyArticle($id) {
        $article = Article::find($id);

        $article->delete();

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
}