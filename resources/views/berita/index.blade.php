@extends('layout.petugas')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@section('konci')
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
                
            </div>
           <a href="{{route('berita.show',$data->id_post)  }}"><strong  class="ml-2 text-gray-dark d-inline-block text-truncate" style="max-width: 650px;">{{ $data->isi }}</strong></a>
 
              <span class="d-block ml-2">{{ $data->tgl_post->diffForHumans() }}</span>
            </div>
          </div>
          {{ $like->links() }}
        @endforeach
      </div>

      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

@endsection

