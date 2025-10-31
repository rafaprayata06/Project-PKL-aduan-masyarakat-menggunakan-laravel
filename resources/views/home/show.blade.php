

@extends('layout.dashbord')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@section('konten')
<main>
    <div class="container-fluid px-4">
       
           
                        
    
        <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded border-light">
          <div class="card-body">
            <div class="alert alert-primary container  fw-semibold text-dark" role="alert">
             Detail Laporan Anda
            </div> 
            <table class="table">
              <thead>
                
              </thead>
              <tbody>
                <tr>
                  <th>Tanggal Laporan:</th>
                  <td>{{  $data->tgl_pengaduan->isoFormat('dddd, D MMMM Y') }}</td>
                  
                </tr>
                
                <tr>
                  <th >Di Kirim Pada Jam:</th>
                  <td>{{ $data->tgl_pengaduan->format('H:i:s' ) }}</td>
                  
                </tr>
                <tr>
                  <th >Kategori Pengaduan:</th>
                  <td >{{ $data->jenis_pengaduan }}</td>
                 
                </tr>
                <tr>
                  <th >Isi Laporan:</th>
                  <td style="max-width:200px ;" >{{ $data->isi_laporan }}</td>
                 
                </tr>
                <tr>
                  <tr>
                    <th >Alur Pengerjaan:</th>
                    <td>
                      @if ($data->status == '0')
                      <div class="badge bg-danger text-wrap"
                      style="width: 5rem;">
                      Pending 5%
                    </div> &rarr;
                   
                      @else
                      <div class="badge bg-secondary text-wrap "
                      style="width: 5rem;">
                      Pending
                    </div> &rarr;
                    
                      @endif
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      @if ($data->status =='proses')
                      <div class="badge bg-warning text-wrap"
                       style="width: 5rem;">
                        Proses 50%
                      </div> &rarr;
                      
                      @else
                      <div class="badge bg-secondary text-wrap" style="width: 5rem;">
                        Proses
                      </div> &rarr;
                      
                      @endif
                  
                      @if ($data->status =='selesai')
                      <div class="badge bg-success text-wrap"
                       style="width: 7rem;">
                        Selesai 100%
                      </div>
                      
                      @else
                      <div class="badge bg-secondary text-wrap" style="width: 5rem;">
                        Selesai
                      </div>
                      
                      @endif
                      </td>
                   
                  </tr>
                  
                  <th>Status Pengerjaan:</th>
                <td >
                  @if ($data->status == '0')
                  <div class="badge bg-danger text-wrap" style="width: 5rem;">
                    pending
                  </div>

                  @elseif($data->status =='proses')
                  <div class="badge bg-warning text-wrap" style="width: 5rem;">
                    proses
                  </div>
                  @elseif($data->status =='tolak')
                  <div class="badge bg-secondary text-wrap" style="width: 5rem;">
                    Di Tolak <i class="fa-regular fa-hand"></i>
                  </div>
                  
                  @else
                  <div class="badge bg-success text-wrap" style="width: 5rem;">
                    selesai
                  </div>
                  @endif
                </td>
                </tr>
                <tr>
                  <th>Presentase:</th>
                  <td>
                    @if ($data->status == '0')
                    <div class="progress " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger  progress-bar-striped progress-bar-animated " style="width: 10%">5%</div>
                      </div>
                        @elseif($data->status == 'proses')
                        <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width: 50%">50%</div>
                          </div>
                        @elseif($data->status == 'tolak')
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar overflow-visible fw-semibold text-dark" style="width: 0%">Pengaduan Anda Di Tolak</div>
                    @else
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 100%">100%</div>
                      </div>
                    @endif
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-primary-subtle fw-semibold text-dark" style="border-radius:10px;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Lihat Foto Laporan
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"> <img src="{{ url('foto').'/'.$data->foto }}" class="card-img-bottom" alt="..."></div>
              </div>
            </div>
        </div>

       
    
       @if ($tanggapan>0)
       <main class="container mt-5">
  
        
          <h6 class="border-bottom  text-secondary  pb-2 mb-3 ">Tanggapan Petugas</h6>

      <table class="table table-bordered ">
        <thead>
          <tr>
            <th scope="col">Tanggal & Jam</th>
            <th scope="col">Nama Petugas</th>
            <th scope="col">Tanggapan</th>
            <th>Status</th>
            
          </tr>
        </thead>
        <tbody>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
          @foreach ($arguments as $field)
              <tr>
                <td><i class="bi bi-calendar-check"style="font-size:0.8rem;"> {{ Carbon\Carbon::parse($field->tgl_tanggapan)->isoFormat('dddd, D MMMM Y') }}<br>
                  <i class="bi bi-clock" style="font-size:0.8rem;"></i>  {{  Carbon\Carbon::parse($field->tgl_tanggapan)->format('H:i:s') }}
                </td>
                <td style="width:200px;"> <img src="{{ url('tmp_file').'/'.$field->foto }}"  alt="twbs" width="30" height="28" class="rounded-circle flex-shrink-0">&nbsp;
                  {{ $field->name }}
                </td>
                <td style="max-width:500px;">{{ $field->tanggapan }}</td>
                <td >
                  @if ($field->proses == 'Pending')
                  <div class="badge bg-danger text-wrap" style="width: 5rem;">
                    pending
                  </div>

                  @elseif($field->proses =='Proses')
                  <div class="badge bg-warning text-wrap" style="width: 5rem;">
                    proses
                  </div>

                  @elseif($field->proses =='Ditolak')
                  <div class="badge bg-secondary text-wrap" style="width: 5rem;">
                    Di Tolak <i class="fa-regular fa-hand"></i>
                  </div>
                 
                  @else
                  <div class="badge bg-success text-wrap" style="width: 5rem;">
                    selesai
                  </div>
                  @endif
                
                </td>
                
              </tr>
          @endforeach
        </tbody>
      </table>
       @else
    <main class="container mt-5">   
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Tanggapan Petugas</h6>
    <div class="d-flex text-body-secondary pt-3">
    
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="text-center text-secondary">
          <h6>Belum Ada Tanggapan Dari Petugas</h6>
        </div>
        
      </div>
    </div>
   
      
   
  </div>
</main>
       @endif
          
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endsection