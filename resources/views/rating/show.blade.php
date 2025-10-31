

@extends('layout.dashbord')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

@section('konten')
<main>
    <div class="container-fluid px-4">
       
           
                        
        

        <div class="">
          <div class="card-body">
            <div class="alert alert-primary container  fw-semibold text-dark" role="alert">
             Detail Saran Anda
            </div> 
            <table class="table table-hover">
              <thead>
                
              </thead>
              <tbody>
                <tr>
                  <th>Tanggal saran:</th>
                  <td>{{  $data->tgl_komen->isoFormat('dddd, D MMMM Y') }}</td>
                  
                </tr>
                
                
                <tr>
                  <th >Saran:</th>
                  <td >{{ $data->kepuasan }}</td>
                 
                </tr>
                <tr>
                  <th>Status:</th>
                <td >
                  @if ($data->status == 'belum_baca')
                  <div class="badge bg-danger text-wrap">
                    Belum Di Tanggapi
                  </div>

                  @else
                  <div class="badge bg-info text-wrap">
                  Sudah  Di Tanggapi
                  </div>
                  @endif
                </td>
                </tr>
                <tr>
                    <th>Rating</th>
                    <td >
                        @if ($data->rating == 'Tidak_Puas')
                        <span class="badge  text-bg-danger">Tidak Puas <i class="bi bi-emoji-angry"></i></span> 

                        @elseif($data->rating=='Puas')
                        <span class="badge  text-bg-primary text-white">Puas <i class="bi bi-emoji-neutral"></i></span>
                        @else
                        <span class="badge  text-bg-success " >Sangat Puas <i class="bi bi-emoji-smile"></i></span>
                        @endif
                
                      </td>
                      
                </tr>
              </tbody>
            </table>
          </div>
          
       
    
     

    
          
</main>

  <h5 class="container mt-5 ml-3">Komentar Petugas</h5>
  @if ($jumlah>0)
  @foreach ($jawab as $data)
  <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-2   align-items-center ">
    <div class="list-group border border-white">
      <a  class="list-group-item list-group-item-action d-flex gap-3 py-3 bg-tranparent" aria-current="true">
        <img src="{{ url('tmp_file').'/'.$data->foto  }}" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">{{ $data->name }}</h6>
            <p class="mb-0 opacity-75">{{ $data->jawab }}</p>
          </div>
          <small class="opacity-50 text-nowrap">{{ Carbon\Carbon::parse($data->tgl_jawab)->diffForHumans()}}</small>
        </div>
      </a>
      </div>
  </div>
  @endforeach
  @else
  <div class="d-flex flex-column flex-md-row p-4 gap-4  align-items-center">
    <div class="list-group">
      <a  class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
      
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">Belum Ada Komentar Petugas</h6>
          
          </div>
         
        </div>
      </a>
   
  
  @endif
  
  


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endsection