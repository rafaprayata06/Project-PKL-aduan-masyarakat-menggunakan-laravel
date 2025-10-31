@extends('layout.dashbord')

<link rel="stylesheet" href="assetss/css/lib/datatable/dataTables.bootstrap.min.css">
@section('konten')
@if ($line>0)
    

<div class="card shadow mb-4">
    <div class="card-header">
      <div class="row g-3">
          <div class="col">
           <h6 class=" font-weight-bold text-primary">Saran Anda</h6>
          </div>
         
          
        </div>
    </div>
      <div class="card-body">
          
          <table id="bootstrap-data-table" class="table  table-sm table-bordered  ">
              <thead class="">
                <tr>
                  <th>Di Buat</th>
                <th>Isi Saran</th>
                <th>Rating</th>
                <th>status</th>
                         
                </tr>
              </thead>
              <tbody>
                  
                  @foreach ($rating as $data)
                  <tr>
                    <td>{{$data->tgl_komen->isoFormat('dddd, D MMMM Y')  }}</td>
                    <td><p><a href="{{ route('rating.show',$data->id_kepuasan) }}" class="link-underline-light hover text-secondary">{{ $data->kepuasan }}</a></p>
                        </td>
                    <td>
                        @if ($data->rating == 'Tidak_Puas')
                            <span class="badge  text-bg-danger">Tidak Puas <i class="bi bi-emoji-angry"></i></span> 

                            @elseif($data->rating=='Puas')
                            <span class="badge  text-bg-primary text-white">Puas <i class="bi bi-emoji-neutral"></i></span>
                            @else
                            <span class="badge  text-bg-success " >Sangat Puas <i class="bi bi-emoji-smile"></i></span>
                            @endif
                    </td>
                    <td>
                        
                        @if ($data->status == 'belum_baca')
                        <span class="badge  text-bg-danger text-white">Belum Di Tanggapi</span>
                        @else
                        <span class="badge  text-bg-info text-white">Sudah Di Tanggapi</span>
                        @endif
                    </td>
                  </tr>
                
                  @endforeach
                  
              
                
              </tbody>
            </table>
      </div>
</div>
            @else
            <div class="text-center">
              <div class="error mx-auto mt-5" data-text="Saran 0" style="font-size:2.1rem;"> Saran 0</div>
              <p class="lead text-gray-800 mb-5">Tidak Ada Saran Dari Anda</p>
             
              <a href="/home">&larr; Back to Dashboard</a>
          </div>
          
               
            @endif

    
                
            
        
            

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 <script src="assetss/js/lib/data-table/datatables.min.js"></script>
 <script src="assetss/js/lib/data-table/dataTables.bootstrap.min.js"></script>
 <script src="assetss/js/lib/data-table/dataTables.buttons.min.js"></script>
 <script src="assetss/js/lib/data-table/datatables-init.js"></script>
  
@endsection