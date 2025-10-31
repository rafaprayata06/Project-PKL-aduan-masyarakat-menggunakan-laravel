<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DetailStatusController extends Controller
{
    function belum()
    {
         $foto = DB::table('masyarakat')
        ->join('pengaduan', 'masyarakat.nik', '=', 'pengaduan.nik')
        ->where('status', '=', '0')
        ->get();
        return View('detail.belum')->with('foto', $foto);
    }


    function proses()
    {
        $foto = DB::table('masyarakat')
        ->join('pengaduan', 'masyarakat.nik', '=', 'pengaduan.nik')
        ->where('status', '=', 'proses')
        ->get();
        return View('detail.proses')->with('foto', $foto);
    }

    function selesai()
    {
        $foto = DB::table('masyarakat')
        ->join('pengaduan', 'masyarakat.nik', '=', 'pengaduan.nik')
        ->where('status', '=', 'selesai')
        ->get();
        return View('detail.selesai')->with('foto', $foto);
    }
}
