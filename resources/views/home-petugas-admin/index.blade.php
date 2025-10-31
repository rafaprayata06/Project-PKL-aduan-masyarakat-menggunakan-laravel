@extends('layout.petugas')
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@section('konci')
<div class="row">
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Syarat Dan Ketentuan Menjadi Petugas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6 class="text-secondary">Hal Yang Harus Di Miliki Jika Ingin Petugas</h6>
                  &raquo;	Bertanggung jawab dalam dalam melayani masyarakat <br>
                  &raquo;	Memiliki respon yang cepat <br>
                  &raquo;	Menerima pesan telepon dari masyarakat agar bisa tindaklanjuti hingga selesai.
                  
                  

                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary btn-sm" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Selanjutnya <i class="fa-solid fa-arrow-right-long fa-beat"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Buat Akun Petugas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="post" action="/petugas-admin/create" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-md-6">
                          <label for="validationCustomUsername" class="form-label">Email</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Tolong isi email.
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <label for="validationCustomUsername" class="form-label">Password</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="16"  height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                              <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg></span>
                            <input type="password" class="form-control" name="password" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Tolong isi password.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustomUsername" class="form-label">Username</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" name="name" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Tolong isi Username.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustomUsername" class="form-label">No Telpon</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" name="telpon" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Tolong isi nomor telpon.
                            </div>
                          </div>
                        </div>

                       <div class="col-12">
				  <label for="validationCustomUsername" class="form-label">avatar</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
					<input type="file" class="form-control" name="foto" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					 Tolong isi foto. 
					</div>
				  </div>
				</div>
				
                        
                       
                </div>
                <div class="modal-footer">
                  <input type="reset" role="button" class="btn btn-danger btn-sm" value="Reset "> 

                  <button class="btn btn-primary btn-sm" type="submit">Tambah Petugas</button>  
                </div>
            </form>

              </div>
            </div>
          </div>
         @if (Auth::guard('web')->user()->level =='admin')
         <button class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Tambah Akun Petugas <i class="bi bi-person-add"></i></button>
                     
         @endif    

    </div>
   
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Semua Pengaduan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $peng }}</div>
                    </div>
                    
                </div>
                <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/home-petugas-admin">
                    Selengkapnya &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Belum Di Peroses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengblm }}</div>
                    </div>
                   
                </div>
                <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/belum-petugas">
                    Selengkapnya &rarr;</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Sedang Di Proses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengpros }}</div>
                    </div>
                   
                </div>
                <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/proses-petugas">
                    Selengkapnya &rarr;</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             Telah Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengsls }}</div>
                    </div>
                    
                </div>
                <div>
                    <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/selesai-petugas">
                        Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    
<div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded bg-white">Saran & Pertanyaan&nbsp; <i class="bi bi-chat-dots"></i> <i class="bi bi-question-lg"></i></div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-center text-uppercase mb-1">
                      Saran Dan Pertanyaan &nbsp;<i class="bi bi-chat-dots " style="color:rgb(99, 99, 235); font-size:1.1rem;"></i></div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 d-block  "></div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-3">{{ $allkomen }}</div>
              </div>
              
          </div>
         
      </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-center text-uppercase mb-1">
                            Tidak Puas&nbsp; <i class="bi bi-emoji-angry" style="font-size:1.1rem;"></i></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-3">{{ $komentidakpuas}}</div>
                    </div>
                   
                </div>
                           </div>
        </div>
    </div>
    
<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                            Puas&nbsp; <i class="bi bi-emoji-neutral" style="font-size: 1.1rem"></i></div>
                        <div class="h5 mb-0 font-weight-bold text-center mt-3 text-gray-800">{{ $puas }}</div>
                    </div>
                   
                </div>
                </div>
        </div>
    </div>
    
<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                           Sangat Puas&nbsp; <i class="bi bi-emoji-laughing" style="font-size: 1.1rem"></i></div>
                        <div class="h5 mb-0 font-weight-bold text-center mt-3 text-gray-800">{{ $sangatpuas }}</div>
                    </div>
                   
                </div>
                </div>
        </div> 
 </div>
    
    <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded bg-white">Auth <i class="bi bi-people-fill"></i> & Berita <i class="bi bi-newspaper"></i></div>
      <!-- Earnings (Monthly) Card Example -->
      @if (Auth::guard('web')->user()->level == 'admin')
      <div class="row"  style="margin-left:10%;">
        <div class="container">
      <div class="row">
    <div class="col-md-3">
      <div class="counter-box white r-5 p-3 shadow-sm mb-4">
          <div class="p-4">
              <div class="float-right">
                  <span class="bi bi-person-circle" style="font-size:4rem; color:rgb(119, 151, 240);"></span>
              </div>
              <div class="counter-title">Masyarakat</div>
              <h5 class="mt-3 sc-counter">{{ $masyarakat }}</h5>
          </div>
      </div>
  </div>  
    <div class="col-md-3">
      <div class="counter-box white r-5 p-3 shadow-sm mb-4">
          <div class="p-4">
              <div class="float-right">
                  <span class="fa-solid fa-user-secret" style="font-size:4rem; color:orange;"></span> 
              </div>
              <div class="counter-title">Petugas</div>
              <h5 class="mt-3 sc-counter">{{ $user }}</h5>
          </div>
      </div>
  </div>  
    <div class="col-md-3">
      <div class="counter-box white r-5 p-3 shadow-sm mb-4">
          <div class="p-4">
              <div class="float-right">
                  <span class="fa-solid fa-newspaper"style="font-size:4rem; color:#20B2AA	;"></span>
              </div>
              <div class="counter-title">Berita</div>
              <h5 class="mt-3 sc-counter">{{ $berita }}</h5>
          </div>
      </div>
  </div>  
    </div>
    </div>
        
      @else
      <div class="row"  style="margin-left:7%;">
        <div class="container">
      <div class="row">
    <div class="col-md-5">
      <div class="counter-box white r-5 p-3 shadow-sm mb-4">
          <div class="p-4">
              <div class="float-right">
                  <span class="bi bi-person-circle" style="font-size:4rem; color:rgb(119, 151, 240);"></span>
              </div>
              <div class="counter-title">Masyarakat</div>
              <h5 class="mt-3 sc-counter">{{ $masyarakat }}</h5>
          </div>
      </div>
  </div>  
    <div class="col-md-5">
      <div class="counter-box white r-5 p-3 shadow-sm mb-4">
          <div class="p-4">
              <div class="float-right">
                  <span class="fa-solid fa-newspaper"style="font-size:4rem; color:#20B2AA	;"></span>
              </div>
              <div class="counter-title">Berita</div>
              <h5 class="mt-3 sc-counter">{{ $berita }}</h5>
          </div>
      </div>
  </div>  
    </div>
    </div>
    
      @endif
   
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Seluruh Pengaduan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pelapor</th>
                        
                        <th>Tgl Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th class="text-center">Foto</th>
                        <th>Detail</th>
                      
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Pelapor</th>
                     
                        <th>Tgl Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th class="text-center">Foto</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
                <tbody>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                  @foreach ($foto as $item)
                  <tr>
                    <td>{{ $item->nama }}</td>
                    
                    <td>{{ Carbon\Carbon::parse($item->tgl_pengaduan)->isoFormat('dddd, D MMMM Y')  }}</td>
                    <td class="d-inline-block text-truncate" style="max-width: 300px;">{{ $item->isi_laporan }}</td>
                     <td>
                        @if ($item->status == '0')
                        <span class="badge  text-bg-danger">panding</span> 

                        @elseif($item->status =='proses')
                        <span class="badge  text-bg-warning text-white">proses</span>
                        @elseif($item->status =='tolak')
                        <span class="badge  text-bg-secondary text-white">Di Tolak <i class="fa-regular fa-hand"></i></span>
                       
                        @else
                        <span class="badge  text-bg-success " >selesai</span>
                        @endif
                     </td>
                  
                   <td>
    
<img style="max-width:90px; max-height:50px;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id_pengaduan }}"  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$item->foto }}" alt="">


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <img style="max-width:650px; max-height:600px; "  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$item->foto }}" alt="">
</div>
</div>
                </td>
                <td class="text-center">
                    <a href="{{  route('home-petugas-admin.show',$item->id_pengaduan)  }}"><i class="bi bi-eye" style="font-size:1.2rem; color:rgba(40, 8, 224, 0.548);"></i>
                    </a>
                </td>
               
                    
                </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
@endsection