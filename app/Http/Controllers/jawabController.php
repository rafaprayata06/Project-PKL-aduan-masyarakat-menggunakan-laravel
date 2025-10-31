<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use App\Models\Masyarakat;
use App\Models\RatingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jawabController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        
        $auth=Auth::guard('masyarakat')->user()->nik;
        $line = RatingApp::where('nik',$auth)->count();
        $rating = RatingApp::where('nik',$auth)->get();
        return view('jawab.index',[
            'rating' => $rating,
            'line' => $line
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
        $tanggapan = Jawab::where('id_kepuasan', $request->id_kepuasan)->first();


        
        $tanggapan = Jawab::create([

            'id_kepuasan' => $request->id_kepuasan,
            'tgl_jawab' => date('Y-m-d H:i:s'),
            'jawab' => $request->jawab,
            'user_id' =>  Auth::guard('web')->user()->id
        ]);
        toast('Berhasil Menambah Komentar!', 'success')->autoClose(3000)->position('center');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =RatingApp::where('id_kepuasan', $id)->first();
        return view('jawab.show')->with('data', $data);
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
            'status' => $request->status
        ];


        RatingApp::where('id_kepuasan', $id)->update($data);


        toast('Berhasil Merubah Status!', 'success')->autoClose(3000)->position('center');
        return back();
        
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Masyarakat::where('nik', $id)->delete();

        
       
    
        alert()->success('success!','Berhasil menghapus user!')
        ->animation('tada faster','fadeInUp faster');

        return back();
    }
}
