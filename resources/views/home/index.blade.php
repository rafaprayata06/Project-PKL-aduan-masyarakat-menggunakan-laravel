@extends('layout.dashbord')
@section('konten')
{{-- <link href="{{asset('css/yeyeyeye.min.css')  }}" rel="stylesheet" /> --}}
<link rel="stylesheet" href="assetss/css/lib/datatable/dataTables.bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<div class="container-fluid">
    @include('sweetalert::alert')

    <!-- Page Heading -->
    @if (session::has('success'))
    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
        <i class="bi-check-circle-fill"></i>
        <strong class="mx-2">Success!</strong>{{ Auth::guard('masyarakat')->user()->nama }} {{ session::get('success') }}
        <meta http-equiv="refresh" content="2;url=/home">
    </div>
    
        
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        @if ($peng>0)
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Kotak komentar <i class="bi bi-envelope-paper"></i></a>
       
        @endif
       

    </div>
    <div class="row">

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
                    <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/home">
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $o }}</div>
                        </div>
                       
                    </div>
                    <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/belum-proses">
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $proses }}</div>
                        </div>
                       
                    </div>
                    <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/proses">
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $selesai }}</div>
                        </div>
                        
                    </div>
                    <div>
                        <a  class="text-xs font-weight-bold  link-underline-opacity-0" rel="nofollow" href="/complate!">
                            Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Earnings (Monthly) Card Example -->
       
    </div>

    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row g-3">
            <div class="col">
             <h6 class=" font-weight-bold text-primary">Daftar Pengaduan Anda</h6>
            </div>
           
            
          </div>
      </div>
        <div class="card-body">
            @if ($peng>0)
            <table id="bootstrap-data-table" class="table  table-sm table-borderless ">
                <thead class="">
                  <tr>
                    <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>status</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $isi)
                    <tr>
                        <td>{{ $isi->tgl_pengaduan->isoFormat('dddd, D MMMM Y') }}</td>
                        <td class="d-inline-block text-truncate" style="max-width: 350px;">{{ $isi->isi_laporan }}</td>
                        
                        <td class="">
                            @if ($isi->status == '0')
                            <span class="badge  text-bg-danger">panding</span> 

                            @elseif($isi->status =='proses')
                            <span class="badge  text-bg-warning text-white">proses</span>

                            @elseif($isi->status =='tolak')
                            <span class="badge  text-bg-secondary text-white">Di Tolak <i class="fa-regular fa-hand"></i></span>
                            @else
                            <span class="badge  text-bg-success " >selesai</span>
                            @endif
                    </td>
                    
                    <td >
                        <!-- Button trigger modal -->

<img style="max-width:80px; max-height:50px;"data-bs-toggle="modal" data-bs-target="#exampleModal{{ $isi->id_pengaduan }}"  class="object-fit-xl-contain border rounded" style="margin-left: 4%;" src="{{ url('foto').'/'.$isi->foto }}" alt="">


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $isi->id_pengaduan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <img style="max-width:650px; max-height:600px; "  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$isi->foto }}" alt="">
</div>
</div>
                    </td>
                    
                   
       <td class="text-center"><a href="{{  route('home.show',$isi->id_pengaduan)  }}" style="d-flex justify-content-center"><i class="bi bi-eye" style="font-size:1.2rem; color:rgba(40, 8, 224, 0.548);"></i>
         </a></td>

        <td class="text-center">
            <!-- Button trigger modal -->

    <i class="bi bi-trash"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $isi->id_pengaduan }}" style="color:red; font-size:1.2rem;"></i>
  
  
  <!-- Modal -->
   <div class="modal fade" id="staticBackdrop{{ $isi->id_pengaduan }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        
      <div class="modal-header pt-1 bg-danger">

      </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <i class="bi bi-exclamation-lg" style="font-size:5rem ; margin-left:2%; color:gold;"></i>
            </div>
          <div class="col-12">
            <p style="">Apakah anda yakin ingin menghapus laporan  ini?</p>
          </div>
          </div>
          <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-secondary btn-sm mr-2" data-bs-dismiss="modal">Close</button>
          <form action="{{ '/home/'.$isi->id_pengaduan }}" method="post">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
          </form>
          </div>
        
        </div>
        
          
      </div>
    </div>
  </div>
  
        </td>
                    </tr>
                    @endforeach
                    
                
                  
                </tbody>
              </table>
            @else
            <div class="error mx-auto mt-3" data-text="belum ada pengaduan " style="font-size:2.1rem;">Belum Ada Pengaduan</div>
            @endif
           
            
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Komentar Anda</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/rating" method="post" class=" needs-validation" novalidate>
            @csrf
            <input type="hidden" name="nik">
              <div class="mb-2 position-relative">
    
                <textarea class="form-control" id="validationTooltip04" style="min-height:95px; max-height:250px;" placeholder="pertanyaan/komentar anda terhadap kinerja petugas kami" name="kepuasan"  required></textarea>
                <div class="invalid-tooltip">
                  <i class="bi bi-exclamation-circle"></i> Tolong isi laporan pengaduan.
                </div>
              </div>
            
              <label class="mt-3 d-block text-center" for="">Beri Rating</label><br>
              <div style="margin-left:5%;" >
            <div class="form-check form-check-inline position-relative">
               
                <input class="form-check-input" type="radio" id="validationTooltip04" required name="rating" id="inlineRadio1" value="Tidak_Puas">
                <label class="form-check-label" for="inlineRadio1"><div class="badge bg-danger text-wrap" style="width: 6rem;">
                    Tidak Puas <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-angry-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.053 4.276a.5.5 0 0 1 .67-.223l2 1a.5.5 0 0 1 .166.76c.071.206.111.44.111.687C7 7.328 6.552 8 6 8s-1-.672-1-1.5c0-.408.109-.778.285-1.049l-1.009-.504a.5.5 0 0 1-.223-.67zm.232 8.157a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 1 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5 0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5z"/>
                      </svg>
                  </div></label>
                  <div class="invalid-tooltip">
                    <i class="bi bi-exclamation-circle"></i> Tolong pilih salah satu.
                  </div>
   
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" required name="rating" id="inlineRadio2" value="Puas">
                <label class="form-check-label" for="inlineRadio2"><div class="badge bg-primary text-wrap" style="width: 6rem;">
                    Puas <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-neutral-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm-3 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
                      </svg>
                  </div></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" required name="rating" id="inlineRadio2" value="Sangat_Puas">
                <label class="form-check-label" for="inlineRadio2"><div class="badge bg-success text-wrap" style="width: 7rem;">
                    Sangat Puas <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
                      </svg>
                  </div></label>
              </div>
              </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>

 <!-- Page level plugins -->
{{--  
 <script src="js/scripts.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
 <script src="js/datatables-simple-demo.js"></script> --}}
 <!-- Page level custom scripts -->
 

  
 <script src="assetss/js/lib/data-table/datatables.min.js"></script>
 <script src="assetss/js/lib/data-table/dataTables.bootstrap.min.js"></script>
 <script src="assetss/js/lib/data-table/dataTables.buttons.min.js"></script>
 <script src="assetss/js/lib/data-table/datatables-init.js"></script>

{{-- 
 <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script> --}}

<script>
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