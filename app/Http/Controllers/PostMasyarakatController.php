<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostMasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;

        $like = Post::orderBy('id_post', 'desc')->paginate(10);

        return view('news.index', [
            'like' => $like,


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
            'post_id' => $request->post_id,



        ];


        Like::create($data);

        toast('Anda Memberikan Like Pada Berita Ini!', 'success')->autoClose(3000)->position('center');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::where('id_post', $id)->first();
        $like = Like::where('post_id', $id)->count();

        return view('news.show', [
            'data' => $data,
            'like' => $like
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();




        alert()->success('success!', 'Berhasil menghapus petugas!')
            ->animation('tada faster', 'fadeInUp faster');

        return back();
    }
}
