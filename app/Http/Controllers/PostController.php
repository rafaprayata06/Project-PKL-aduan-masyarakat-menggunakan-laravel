<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $like = Post::orderBy('id_post', 'desc')->paginate(10);


        return view(
            'berita.index',
            [


                'like' => $like
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $berita = Post::orderBy('id_post', 'desc')->get();
        return view('berita.create')->with('berita', $berita);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $file = $request->file('foto');

        $foto = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'tmp_post';
        $file->move($tujuan_upload, $foto);

        $data = [
            'user_id' => Auth::guard('web')->user()->id,
            'judul' => $request->judul,
            'category' => $request->category,
            'tgl_post' => date('Y-m-d H:i:s'),
            'isi' => $request->isi,
            'foto' => $foto


        ];


        Post::create($data);
        toast('Berhasil Menambah Berita', 'success')->autoClose(3000);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::where('id_post', $id)->first();
        $like = Like::where('post_id', $id)->count();

        return view(
            'berita.show',
            [
                // 'like' => $like,
                'data' => $data,
                'like' => $like
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id_post', $id)->delete();




        alert()->success('success!', 'Berhasil menghapus Berita!')
            ->animation('tada faster', 'fadeInUp faster');

        return back();
    }
}
