<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Post;
use App\Models\RatingApp;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if (Auth::guard('web')->check()) {
            $foto = DB::table('masyarakat')
                ->join('pengaduan', 'masyarakat.nik', '=', 'pengaduan.nik')->get();
            $peng = Pengaduan::count();

            $pengblm = Pengaduan::where('status', '=', '0')
                ->count();
            $pengpros = Pengaduan::where('status', '=', 'proses')
                ->count();
            $pengsls = Pengaduan::where('status', '=', 'selesai')
                ->count();

            $allkomen = RatingApp::count();

            $komentidakpuas = RatingApp::where('rating', '=', 'Tidak_Puas')
                ->count();
            $puas = RatingApp::where('rating', '=', 'Puas')
                ->count();
            $sangatpuas = RatingApp::where('rating', '=', 'Sangat_Puas')
                ->count();

            //saran
            $saran = DB::table('rating')
                ->join('masyarakat', 'rating.nik', '=', 'masyarakat.nik')
                ->get();

            $user = User::where('level', '=', 'petugas')->count();
            $berita = Post::count();
            $masyarakat = Masyarakat::count();




            $pengaduan = Pengaduan::all();
            return view('home-petugas-admin.index', [
                'pengaduan' => $pengaduan,

                'pengblm' => $pengblm,
                'pengpros' => $pengpros,
                'pengsls' => $pengsls,
                'allkomen' => $allkomen,
                'komentidakpuas' => $komentidakpuas,
                'puas' => $puas,
                'sangatpuas' => $sangatpuas,
                'saran' => $saran,
                'foto' => $foto,
                'peng' => $peng,
                'user' => $user,
                'berita' => $berita,
                'masyarakat' => $masyarakat


            ]);
        } else {
            alert()->warning('Belum Login', 'Harap login terlebih dahulu');
            return redirect()->to('/petugas-admin!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();


        $request->validate([
            'tanggapan' => 'required',

        ], [
            'tanggapan.required' => 'tanggapan wajib di isi',
        ]);
        $tanggapan = Tanggapan::create([

            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d H:i:s'),
            'tanggapan' => $request->tanggapan,
            'proses' => $request->proses,
            'user_id' =>  Auth::guard('web')->user()->id
        ]);
        toast('Berhasil Membuat Tanggapan!', 'success')->autoClose(3000)->position('center');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $data = Pengaduan::where('id_pengaduan', $id)
            ->first();



        return view('home-petugas-admin.show', [
            'data' => $data,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Session::flash('status', $request->status);


        // $data = [
        //     'status' => $request->status
        // ];


        // Pengaduan::where('id_pengaduan', $id)->update($data);


        // toast('Berhasil Merubah Status!', 'success')->autoClose(3000)->position('center');
        // return back();
        $update_status = Pengaduan::findOrFail($id);

        //name of key $request->status_member must match name=status_member on select control in the form
        $update_status->updated_at = date('Y-m-d H:i:s');
        $update_status->status = $request->status;


        $update_status->save();

        //------------- OR you can simply do ---------------------------//

        //$update_pelanggam = DaftarPelanggan::findOrFail($id);

        //$update_pelaggan->update($request->all();

        //-------------------------------------------------------------//


        if ($update_status) {
            toast('Berhasil Merubah Status!', 'success')->autoClose(3000)->position('center');
        } else {
            toast('Gagal Merubah Status!', 'error')->autoClose(3000)->position('center');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
