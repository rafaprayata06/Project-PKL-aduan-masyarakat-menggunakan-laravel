@extends('layout.dashbord')

@section('konten')

<h6 class="container text-secondary">
    Kategory Berita: {{ $data->category }}
</h6>
<figure class="container">Di Publish: {{ $data->tgl_post->isoFormat('dddd,D MMMM,Y') }}</figure>
<h5 class="text-center text-secondary fw-semibold mt-5">
    {{ $data->judul }}
</h5>

<img src="{{ url('tmp_post').'/'.$data->foto }}" style="max-width:600px; margin-left:25%;"  class="img-fluid mt-4" alt="...">
<figcaption class="figure-caption text-center mt-4 fw-bold">Berita Ini Mendapatkan {{ $like }} &nbsp;&nbsp;<i class="fa-solid fa-thumbs-up fa-beat" style="font-size:1.2rem; color:rgb(224, 41, 133)"></i></figcaption>
</figure>
<p style="text-align: justify; text-indent: 0.5in;" class="mt-4">
{{ $data->isi }}
</p>


@endsection