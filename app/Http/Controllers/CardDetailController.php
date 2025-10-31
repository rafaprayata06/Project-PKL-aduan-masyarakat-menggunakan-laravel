<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardDetailController extends Controller
{
    function index()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $pengaduan = Pengaduan::where('nik', $nik)
            ->where('status', '=', '0')
            ->get();

        $peng = Pengaduan::where('nik', $nik)
            ->where('status', '=', '0')
            ->count();

        return view('card.belum', [
            'pengaduan' => $pengaduan,
            'peng' => $peng
        ]);
    }


    function proses()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $pengaduan = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'proses')
            ->get();

        $peng = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'proses')
            ->count();

        return view('card.proses', [
            'pengaduan' => $pengaduan,
            'peng' => $peng
        ]);
    }


    function selesai()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $pengaduan = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'selesai')
            ->get();

        $peng = Pengaduan::where('nik', $nik)
            ->where('status', '=', 'selesai')
            ->count();

        return view('card.selesai', [
            'pengaduan' => $pengaduan,
            'peng' => $peng
        ]);
    }

    function pengaduan()

    {
        return view('card.pengaduan');
    }
    function user()
    {



        if(Auth::guard('web')->user()->level =='admin')
        {

            $user = Masyarakat::latest()->get();
            $pengaduan =  DB::table('pengaduan')
                ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')->paginate(2);
    
            $petugas = User::where('level', '=', 'petugas')->get();
    
        return view('card.user', [
            'user' => $user,
            'petugas' => $petugas,
            'data' => $pengaduan

        ]);
    }

    else
    {
        toast('Anda tidak bisa mengakses halaman tersebut!', 'warning')->autoClose(3000);
        return redirect()->to('home-petugas-admin');
    }
    }
}
