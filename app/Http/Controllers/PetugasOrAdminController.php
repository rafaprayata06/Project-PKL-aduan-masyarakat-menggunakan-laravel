<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PetugasOrAdminController extends Controller
{
  function index()
  {
    return view('admin.andex');
  }

  function login(Request $request)
  {
    Session::flash('email', $request->email);
    $request->validate([
      'email' => 'required',
      'password' => 'required'

    ], [
      'email.required' => 'email wajib diisi!!',
      'password.required' => 'password wajib diisi!!',
    ]);

    $info_login = [
      'email' => $request->email,
      'password' => $request->password
    ];


    if (Auth::guard('web')->attempt($info_login)) {
      toast('Berhasil Login', 'success')->autoClose(3000);
      return redirect('home-petugas-admin');
    } else {
      return redirect()->to('petugas-admin!')->withErrors('Email dan password tidak cocok');
    }
  }

  function logout()
  {
    Auth::guard('web')->logout();

    toast('Berhasil Log Out', 'success')->autoClose(5000);
    return redirect('petugas-admin!');
  }


  function create(Request $request)
  {
    $file = $request->file('foto');

    $nama_file = time() . "_" . $file->getClientOriginalName();

    // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'tmp_file';
    $file->move($tujuan_upload, $nama_file);



    $data = [
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'name' => $request->name,
      'telpon' =>$request->telpon,
      'foto' => $nama_file,



    ];

    User::create($data);



    alert()->success('Berhasil Membuat Akun!', 'Successfully')->iconHtml('<i class="bi bi-hand-thumbs-up-fill"></i>');
    return back();
  }

  function detail()
  {
    return view('admin/detail');
  }
}
