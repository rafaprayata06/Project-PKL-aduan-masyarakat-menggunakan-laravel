<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
  function index()
  {
    return view('user.dex');
  }
  function login(Request $request)
  {
    Session::flash('username', $request->username);



    $info_login = [
      'email' => $request->email,
      'password' => $request->password
    ];


    if (Auth::guard('masyarakat')->attempt($info_login)) {


      return redirect('home')->with('success', 'Berhasil login!');
    } else {
      alert()->error('Gagal Login!', 'mohon cek kembali username dan password')->showConfirmButton('Oke', '	#FF8C00');

      return back();
    }
  }


  function register()
  {
    //
  }

  function create(Request $request)
  {


    $file = $request->file('foto');

    $nama_file = time() . "_" . $file->getClientOriginalName();

    // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'tmp_file';
    $file->move($tujuan_upload, $nama_file);



    $data = [
      'nik' => $request->nik,
      'tgl_bergabung' => date('Y-m-d H:i:s'),
      'nama' => $request->nama,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'telp' => $request->telp,
      'foto' => $nama_file,






    ];

    Masyarakat::create($data);



    alert()->success('Berhasil Membuat Akun!', 'Successfully')->iconHtml('<i class="bi bi-hand-thumbs-up-fill"></i>');
    return back();
  }


  function logout()
  {
    Auth::guard('masyarakat')->logout();

    toast('Berhasil Log Out', 'success')->autoClose(3000);
    return redirect('user');
  }

  function detail_profile()
  {
    return view('user.profile');
  }

  function update(request $request, string $id)

  {
  }
}
