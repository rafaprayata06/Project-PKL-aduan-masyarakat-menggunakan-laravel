<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\RatingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Jawab;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saran = DB::table('rating')
            ->join('masyarakat', 'rating.nik', '=', 'masyarakat.nik')
            ->get();


        $o = RatingApp::all()->count();

        return view('rating.allsaran', [
            'saran' => $saran,
            'o' => $o,


        ]);
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
        $data = [
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'tgl_komen' => date('Y-m-d H:i:s'),
            'kepuasan' => $request->kepuasan,
            'rating' => $request->rating,



        ];


        RatingApp::create($data);

        alert()->success('Berhasil Mengirim saran!!!', 'Terima Kasih Telah Mengirim Saran <html><body>&nbsp;</body></html>' . Auth::guard('masyarakat')->user()->nama)->showConfirmButton('Oke', '	#66CDAA')->toHtml();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jumlah = Jawab::where('id_kepuasan', $id)->count();

        $data = RatingApp::where('id_kepuasan', $id)->first();
        $jawab = DB::table('jawab')
            ->join('users', 'jawab.user_id', '=', 'users.id')
            ->where('id_kepuasan', $id)
            ->get();



        return view(
            'rating.show',
            [
                'data' => $data,
                'jawab' => $jawab,
                'jumlah' => $jumlah
            ]
        );
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

            'nama' => $request->input('nama'),
            'telp' => $request->input('telp'),
        ];

        if ($file = $request->file('foto')) {





            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'tmp_file';
            $file->move($tujuan_upload, $nama_file);


            $id_user = Auth::guard('masyarakat')->user()->nik;
            $data_foto = Masyarakat::where('nik', $id_user)->first();
            File::delete(public_path('tmp_file') . '/' . $data_foto->foto);

            $data['foto'] = $nama_file;
        }

        Masyarakat::where('nik', $id_user)->update($data);
        toast('Berhasil Merubah Identitas!', 'success')->autoClose(5000);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
