

@extends('layout.petugas')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@section('konci')


<div class="container-fluid px-4">
    @include('sweetalert::alert')
       
                    
    

    <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded border-light">
      <div class="card-body">
        <div class="alert alert-primary container  fw-semibold text-dark" role="alert">
         Detail Laporan Nik:{{ $data->nik }}
        </div> 
        <table class="table table-hover ">
          <thead>
            
          </thead>
          <tbody>
            <tr>
                <td>Nik Pelapor</td>
                <td>{{ $data->nik }}</td>
            </tr>
            
            <tr>

              <th>Tanggal Laporan:</th>
              <td>{{  $data->tgl_pengaduan->isoFormat('dddd, D MMMM Y') }}</td>
              
            </tr>
            
            <tr>
              <th >Di Kirim Pada Jam:</th>
              <td>{{ $data->tgl_pengaduan->format('H:i:s') }}</td>
              
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
              <th>Alur Pengerjaan:</th>
              <td> @if ($data->status == '0')
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
            <tr>
              <th>Status Pengerjaan:</th>
            <td >
              @if ($data->status == '0')
              <span class="badge  text-bg-danger  ">panding</span> 

              @elseif($data->status =='proses')
              <span class="badge  text-bg-warning text-white ">proses</span>
              
              @elseif($data->status =='tolak')
              <span class="badge  text-bg-secondary text-white ">Di Tolak <i class="fa-regular fa-hand"></i></span>
              @else
              <span class="badge  text-bg-success " >selesai</span>
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
                        <div class="progress-bar overflow-visible fw-semibold text-dark" style="width: 0%">Pengaduan  Di Tolak</div>
                 
                @else
                <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 100%">100%</div>
                  </div>
                @endif
              </td>
              
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" style="border-radius:5%;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Buat Tanggapan
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Tanggapan</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="/home-petugas-admin" method="post">
      @csrf

      <input type="hidden" name="id_pengaduan" value="{{ $data->id_pengaduan }}">
      <input type="hidden" name="user_id">

    <div class="modal-body">
      <select class="form-select mb-3 form-select-sm" name="proses" aria-label=".form-select-sm example">
        <option selected disabled>Plilh Category Tanggapan</option>
        <option >Pending</option>
        <option >Proses</option>
        <option >Selesai</option>
        <option >Ditolak</option>
      </select>
      
      <div class="form-floating">
        <textarea placeholder="Leave a comment here" name="tanggapan"class="form-control{{ $errors->has('tanggapan') ? ' is-invalid' : '' }}" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Tanggapan</label>
        @if($errors->has('tanggapan'))
          <span class="invalid-feedback">{{ $errors->first('tanggapan') }}</span>
        @endif
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary btn-sm">Berikan Tanggapan</button>
    </div>
    </form>
  </div>
</div>
</div>
              
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3"  style="margin-left:1%; border-radius:5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
Ubah Status 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Rubah Stratus</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{'/home-petugas-admin/'.$data->id_pengaduan}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_pengaduan" value="{{ $data->id_pengaduan }}">
        <select class="form-select" name="status" aria-label="Default select example" required>
            @if ($data->status == '0')


            <option selected disabled value="">pekerjaaan dalam peninjauan</option>
            <option value="proses">pekerjan sedang berlangsung</option>
            <option value="selesai">pekerjaan telah selesai</option>
            <option value="tolak">pengaduan di tolak</option>
          </select>
           @elseif($data->status =='proses')
          
          
            <option value="0">pekerjaaan dalam peninjauan</option>
            <option selected disabled value="">pekerjan sedang berlangsung</option>
            <option value="selesai">pekerjaan telah selesai</option>
            <option value="tolak">pengaduan di tolak</option>
          </select>

          @elseif($data->status =='tolak')
          
          
          <option value="0">pekerjaaan dalam peninjauan</option>
          <option value="proses">pekerjan sedang berlangsung</option>
          <option value="selesai">pekerjaan telah selesai</option>
          <option disabled value="">pengaduan di tolak</option>
        </select>
        
           @else
         
            <option value="0">pekerjaaan dalam peninjauan</option>
            <option value="proses">pekerjan sedang berlangsung</option>
            <option selected disabled value="">pekerjaan telah selesai</option>
            <option value="tolak">pengaduan di tolak</option>
          </select>
           @endif
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Rubah Status?</button>
          </div>
        </form>
    </div>
    
  </div>
</div>
</div>
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

@endsection

  
          




