<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Child;
use App\Models\ChildHealthData;
use App\Models\Consultation;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function testLogin(){
        return view("testLogin.testLogin");
    }
    public function testRegister(){
        return view("testLogin.testRegister");
    }



    public function home(){
        $user = Auth::user();
        // Ambil semua anak dari user yang login
        $children = Child::where('user_id', $user->id)
        ->with(['childHealthData' => function ($query) {
            $query->latest('bulan')->limit(1); // Hanya ambil data perkembangan terbaru
        }])->get();

        $articles = Article::with('doctor')->latest()->limit(4)->get();

        return view("user.home",compact('children','articles'));
    }
    public function storeChild(Request $request){
        $user = Auth::user();
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required|in:Laki-laki,Perempuan',
        ]);
        Child::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->back()->with('success', 'Anak berhasil ditambahkan!');
    }
    public function profileAnak(){
        $user = Auth::user();
        $children = Child::where('user_id', $user->id)
        ->with(['childHealthData' => function ($query) {
            $query->latest('bulan')->limit(1); // Hanya ambil data perkembangan terbaru
        }])->get();

        // percobaan
        return view("user.profileAnak",compact('children'));
    }
    public function article(){
        $articles = Article::with('doctor')->latest()->get();

        return view("user.article",compact('articles'));
    }
    public function profilePengguna(){
        return view("user.profilePengguna");
    }
    public function detailArticle($id){
        $data = Article::findOrFail($id);

        return view("user.detailArticle",compact('data'));
    }
    // method untuk konsultasi
    public function doctor(){
        $doctors = Doctor::where('status', 'Sudah Terverifikasi')->get();

        return view("user.doctor",compact('doctors'));
    }
    public function detailDoctor($id){
        $doctor = Doctor::where('id',$id)->where('status', 'Sudah Terverifikasi')->firstOrFail();

        $user = Auth::user();
        
        $child = Child::where('user_id', $user->id)->get();

        return view("user.doctorDetail",compact('doctor','child'));
    }
    public function sendConsultation(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'doctor_id' => 'required|exists:doctors,id',
            'pesan' => 'required|string|max:1000',
        ]);

        Consultation::create([
            'user_id' => $user->id ,
            'doctor_id' => $request->doctor_id,
            'child_id' => $request->child_id,
            'pesan' => $request->pesan,
            'status' => 'pending',
        ]);

        return redirect('/consultation')->with('success', 'Konsultasi berhasil dikirim.');
    }
    public function seeResponse()
    {
        $user = Auth::user();
        $consultation = Consultation::where('user_id',$user->id )
            ->with('child', 'doctor')
            ->get();

        return view('user.seeResponse', compact('consultation'));
    }
    public function detailChild($child_id) {
        $user = Auth::user();
        $child = Child::where("user_id", $user->id)->findOrFail($child_id);
        $childHealthData = $child->childHealthData()->orderBy('bulan', 'asc')->get();
        $latestChildHealthData = $child->childHealthData()->orderBy('bulan', 'desc')->first();
        
        return view('user.detailChild', compact( 'child','childHealthData', 'latestChildHealthData'));
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

        
        // Hitung status gizi
        $status_gizi = $this->calculateNutritionStatus($request->tinggi, $request->berat, $request->bulan);
        
        $child = Child::findOrFail($child_id);
        $child->update([
            'umur'=>$request->bulan
        ]);

        // Simpan data perkembangan
        ChildHealthData::create([
            'child_id' => $child_id,
            'bulan' => $request->bulan,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'status_gizi' => $status_gizi,
        ]);

        return redirect()->back()->with('success', 'Data perkembangan anak berhasil disimpan!');
    }

}
