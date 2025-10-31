<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('web')->user()->level == 'admin') {
            $petugas = User::latest()->get();
            return view('petugas.index')->with('petugas', $petugas);
        } else {
            toast('Anda tidak bisa mengakses halaman tersebut!', 'warning')->autoClose(3000);
            return redirect()->to('home-petugas-admin');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'telpon' => $request->input('telpon'),
            'email' => $request->input('email'),
        ];

        if ($file = $request->file('foto')) {





            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'tmp_file';
            $file->move($tujuan_upload, $nama_file);



            $data_foto = User::where('id', $id)->first();
            File::delete(public_path('tmp_file') . '/' . $data_foto->foto);

            $data['foto'] = $nama_file;
        }

        User::where('id', $id)->update($data);
        toast('Berhasil merubah identitas User!', 'success')->autoClose(5000);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();




        alert()->success('success!', 'Berhasil menghapus user!')
            ->animation('tada faster', 'fadeInUp faster');

        return back();
    }
}
