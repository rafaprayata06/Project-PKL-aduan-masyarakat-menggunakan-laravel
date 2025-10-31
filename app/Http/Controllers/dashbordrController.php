<?php

namespace App\Http\Controllers;

use App\Models\Coments;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class dashbordrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(Auth::guard('masyarakat')->check())

    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $pengaduan = Pengaduan::where('nik', $nik)
            ->latest()->get();
        $peng = Pengaduan::where('nik', $nik)->count();

        $proses = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'proses')
            ->count();
        //pengaduan selesai
        $selesai = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'selesai')
            ->count();
        //pengaduan blm
        $o = Pengaduan::where('nik', $nik)
            ->where('status', '=', '0')
            ->count();

        $pengall = Pengaduan::where('nik', $nik)->count();
        //
        $blm = Pengaduan::where('nik', $nik)
            ->where('status', '=', '0')->get();
        $prs = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'proses')->get();
        $sls = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'selesai')->get();
        $all = Pengaduan::where('nik', $nik)->get();



        return view(
            'home.index',
            [
                'pengaduan' => $pengaduan,
                'proses' => $proses,
                'selesai' => $selesai,
                'o' => $o,
                'pengall' => $pengall,
                'peng' => $peng,
                'sls'   => $sls,
                'prs' => $prs,
                'blm' => $blm,
                'all' => $all

            ]
        );

    }

    else{
        alert()->warning('Belum Login', 'Harap login terlebih dahulu' );
        return redirect()->to('/user');


    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;

        $proses = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'proses')
            ->count();
        //pengaduan selesai
        $selesai = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'selesai')
            ->count();
        //pengaduan blm
        $o = Pengaduan::where('nik', $nik)
            ->where('status', '=', '0')
            ->count();
        return view('home.create', [
            'proses' => $proses,
            'selesai' => $selesai,
            'o' => $o,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('isi_laporan', $request->isi_laporan);




        // $foto_file= $request->file('foto');
        // $foto_ekstensi = $foto_file->extension();
        // $foto_nama = date('ymdhis'). ".". $foto_ekstensi;
        // $foto_file->move(public_path('foto'),$foto_nama);

        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto';
        $file->move($tujuan_upload, $nama_file);



        $data = [
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'tgl_pengaduan' => date('Y-m-d H:i:s'),
            'isi_laporan' => $request->isi_laporan,
            'jenis_pengaduan' => $request->jenis_pengaduan,
            'foto' => $nama_file


        ];


        Pengaduan::create($data);

        alert()->success('Berhasil Membuat Laporan!!!', 'kami Akan Segera Memproses Laporan <html><body>&nbsp;</body></html>' . Auth::guard('masyarakat')->user()->nama)->showConfirmButton('Oke', '	#66CDAA')->toHtml();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pengaduan::where('id_pengaduan', $id)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id)->count();



        $arguments = DB::table('tanggapan')
            ->join('users', 'tanggapan.user_id', '=', 'users.id')
            ->where('id_pengaduan', $id)
            ->orderBy('proses', 'ASC')

            ->get();



        return view('home.show', [
            'data' => $data,
            'tanggapan' => $tanggapan,
            'arguments' => $arguments,


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
        $data = [

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telpon' => $request->input('telpon'),
        ];

        if ($file = $request->file('foto')) {





            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'tmp_file';
            $file->move($tujuan_upload, $nama_file);


            $id_user = Auth::guard('web')->user()->id;
            $data_foto = User::where('id', $id_user)->first();
            File::delete(public_path('tmp_file') . '/' . $data_foto->foto);

            $data['foto'] = $nama_file;
        }

        User::where('id', $id_user)->update($data);
        toast('Berhasil Merubah Identitas!', 'success')->autoClose(5000);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengaduan::where('id_pengaduan', $id)->delete();




        alert()->success('success!', 'Berhasil menghapus laporan')
            ->animation('tada faster', 'fadeInUp faster');

        return back();
    }
}
