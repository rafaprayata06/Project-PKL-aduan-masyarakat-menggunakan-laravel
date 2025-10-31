@extends('layout.dashbord')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@section('konten')
@include('sweetalert::alert')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Kabar Berita</h6>
    <?php $no = 0;?>
    
        @foreach ($like as $data)
        <?php $no++ ;?>
        <div class="d-flex text-body-secondary pt-3">
            <span class="mt-4 mr-2">{{ $no }}</span>
            <img src="{{ url('tmp_post').'/'.$data->foto }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id_post }}" style="max-width:150px;" class="img-fluid" alt="">
            <div class="modal fade" id="exampleModal{{ $data->id_post }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  
                    <img style="max-width:500px;" src="{{ url('tmp_post').'/'.$data->foto }}">
              </div>
              </div>
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
              <div class="d-flex justify-content-between">
                <h6 class="ml-2 fw-semibold d-inline-block text-truncate" style="max-width: 650px;">{{ $data->judul }}</h6>
               
                <form action="/news" method="post">
                  @csrf
                  <input type="hidden" name="nik">
                  <input type="hidden" value="{{ $data->id_post }}" name="post_id">
                  
               <button type="submit" class="btn btn-tranparent btn-sm"><i class="fa-solid fa-heart mt-3" style="color:rgb(230, 44, 44); font-size:1rem;"></i></button>
                </form>
               
            </div>
           <a href="{{route('news.show',$data->id_post)  }}"><strong  class="ml-2 text-gray-dark d-inline-block text-truncate" style="max-width: 650px;">{{ $data->isi }}</strong></a>
 
              <span class="d-block ml-2">{{ $data->tgl_post->diffForHumans() }}</span>
            </div>
          </div>
          {{ $like->links() }}
        @endforeach
      </div>

      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

@endsection