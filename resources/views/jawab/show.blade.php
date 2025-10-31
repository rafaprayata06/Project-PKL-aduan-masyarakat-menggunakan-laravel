@extends('layout.petugas')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@section('konci')
    
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0"> id Saran = {{ $data->id_kepuasan }}</h6>
    <div class="d-flex text-body-secondary pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"></strong>
          
        </div>
        <h6 class="d-block">Saran:&nbsp;&nbsp; {{ $data->kepuasan }}</h6>
      </div>
    </div>
    <div class="d-flex text-body-secondary pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"></strong>
          
        </div>
        <h6 class="d-block">Rating:&nbsp;&nbsp;
            @if ($data->rating == 'Tidak_Puas')
            <span class="badge  text-bg-danger">Tidak Puas <i class="bi bi-emoji-angry"></i></span> 

            @elseif($data->rating=='Puas')
            <span class="badge  text-bg-primary text-white">Puas <i class="bi bi-emoji-neutral"></i></span>
            @else
            <span class="badge  text-bg-success " >Sangat Puas <i class="bi bi-emoji-smile"></i></span>
            @endif


        </h6>
      </div>
    </div>
    <div class="d-flex text-body-secondary pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"></strong>
          
        </div>
        <h6 class="d-block">Status:&nbsp;&nbsp;
            @if ($data->status == 'belum_baca')
            <span type="button" class="badge  text-bg-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id_kepuasan }}">Belum Di Tanggapi</span>
       
       @else
        <span class="badge  text-bg-info text-white">Sudah Di Tanggapi</span>
        @endif
       

        </h6>
      </div>
    </div>
    
     </div>

     

@endsection