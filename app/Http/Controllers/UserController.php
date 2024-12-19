<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildHealthData;
use App\Models\Consultation;
use App\Models\Doctor;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view("user.home");
    }
    public function profileAnak(){
        return view("user.profileAnak");
    }
    public function article(){
        return view("user.article");
    }
    public function profilePengguna(){
        return view("user.profilePengguna");
    }
    public function detailArticle($id){
        return view("user.detailArticle");
    }
    // method untuk konsultasi
    public function doctor(){
        $doctors = Doctor::where('status', 'Sudah Terverifikasi')->get();
        return view("user.doctor",compact('doctors'));
    }
    public function detailDoctor($id){
        $doctor = Doctor::where('id',$id)->where('status', 'Sudah Terverifikasi')->firstOrFail();
        return view("user.detailDoctor",compact('doctor'));
    }
    // public function consultation(){
    //     $consultations = Consultation::where('user_id', 1)->with('child')->get();
    //     return view("user.seeResponse",compact('consultations'));
    // }
    public function sendConsultation(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'doctor_id' => 'required|exists:doctors,id',
            'pesan' => 'required|string|max:1000',
        ]);

        Consultation::create([
            'user_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'child_id' => $request->child_id,
            'pesan' => $request->pesan,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Konsultasi berhasil dikirim.');
    }
    public function seeResponse()
    {
        $consultation = Consultation::where('user_id', 1)
            ->where('status', 'responded')
            ->with('child', 'doctor')
            ->get();

        return view('user.seeResponse', compact('consultation'));
    }
    // method akhir konsultasi
    // method untuk status gizi
    public function detailChild($child_id) {
        $child = Child::findOrFail($child_id);
        return view('user.detailChild', compact('child'));
    }
    public function calculateNutritionStatus($tinggi, $berat, $bulan)
    {
        if ($bulan <= 24) { // Anak usia 0-2 tahun
            if ($tinggi < 70 && $berat < 7) {
                return 'Stunting';
            } elseif ($berat > 12) {
                return 'Overweight';
            } else {
                return 'Normal';
            }
        } else { // Anak di atas 2 tahun
            if ($tinggi < 80 && $berat < 10) {
                return 'Stunting';
            } elseif ($berat > 15) {
                return 'Overweight';
            } else {
                return 'Normal';
            }
        }
    }
    public function simpanPerkembangan(Request $request, $child_id)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:60', // Maksimal 5 tahun
            'tinggi' => 'required|numeric|min:30',
            'berat' => 'required|numeric|min:2',
        ]);

        $child = Child::findOrFail($child_id);
        // $bulan = now()->diffInMonths($child->tanggal_lahir);

        // Hitung status gizi
        $status_gizi = $this->calculateNutritionStatus($request->tinggi, $request->berat, $request->bulan);

        // Simpan data perkembangan
        $perkembangan = ChildHealthData::create([
            'child_id' => $child_id,
            'bulan' => $request->bulan,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'status_gizi' => $status_gizi,
        ]);

        return redirect()->back()->with('success', 'Data perkembangan anak berhasil disimpan!');
    }
    // method akhir status gizi



}
