@extends('layout.dashbord')
@section('konten')
{{-- <link href="{{asset('css/yeyeyeye.min.css')  }}" rel="stylesheet" /> --}}
<link rel="stylesheet" href="assetss/css/lib/datatable/dataTables.bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<div class="container-fluid">
    @include('sweetalert::alert')

     
@if ($peng>0)
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="row g-3">
          <div class="col">
           <h6 class=" font-weight-bold text-primary">Daftar Pengaduan Proses</h6>
          </div>
         
          
        </div>
    </div>
      <div class="card-body">
          
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
                          @else
                          <span class="badge  text-bg-success " >selesai</span>
                          @endif
                  </td>
                  
                  <td>
                      <!-- Button trigger modal -->
<button type="button" class="btn btn-transparent " style="margin-right:0%;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $isi->id_pengaduan }}">
<img style="max-width:50px; max-height:50px;"  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$isi->foto }}" alt="">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $isi->id_pengaduan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <img style="max-width:650px; max-height:600px; "  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$isi->foto }}" alt="">
</div>
</div>
                  </td>
                  
                 
     <td><a href="{{  route('home.show',$isi->id_pengaduan)  }}" type="button"class="btn btn tranparent d-flex justify-content-center"><i class="bi bi-eye"></i>
       </a></td>

      <td class="text-center">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <i class="bi bi-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header d-block text-center">
        <h1 class="modal-title fs-5 " id="staticBackdropLabel">Hapus Laporan</h1>
       
      </div>
      <div class="modal-body">
        Apakah Anda Ingin Menghapus Laporan?
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
        <form action="{{ url('/home/'.$isi->id_pengaduan) }}" method="post">
          @csrf
          @method('DELETE')
        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
      </td>
                  </tr>
                  @endforeach
                  
              
                
              </tbody>
            </table>
          
        
          
         
          
      </div>
  </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Saran Anda</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form action="/rating" method="post">
          @csrf
          <input type="hidden" name="nik">
          <div class="form-floating">
              <textarea class="form-control" name="kepuasan" required placeholder="Leave a comment here" id="floatingTextarea"></textarea>
              <label for="floatingTextarea" class="text-secondary">tanggapan/saran anda terhadap kinerja petugas kami </label>
            </div>
            <label class="mt-3 d-block text-center" for="">Beri Rating</label><br>
            <div style="margin-left:5%;">
          <div class="form-check form-check-inline">
             
              <input class="form-check-input" type="radio" required name="rating" id="inlineRadio1" value="Tidak_Puas">
              <label class="form-check-label" for="inlineRadio1"><div class="badge bg-danger text-wrap" style="width: 6rem;">
                  Tidak Puas <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-angry-fill" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.053 4.276a.5.5 0 0 1 .67-.223l2 1a.5.5 0 0 1 .166.76c.071.206.111.44.111.687C7 7.328 6.552 8 6 8s-1-.672-1-1.5c0-.408.109-.778.285-1.049l-1.009-.504a.5.5 0 0 1-.223-.67zm.232 8.157a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 1 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5 0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5z"/>
                    </svg>
                </div></label>
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
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
    </form>
  </div>
</div>

@else
<div class="text-center">
    <div class="error mx-auto mt-5" data-text="Proses 0" style="font-size:2.1rem;"> Proses 0</div>
    <p class="lead text-gray-800 mb-5">Tidak Ada Pengaduan Proses</p>
   
    <a href="/home">&larr; Back to Dashboard</a>
</div>
</div>
@endif

    

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


 <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>

<script>
    function confirmDelete(item_id) {
        swal({
             title: 'Apakah Anda Yakin?',
              text: "Anda Tidak Akan Dapat Mengembalikannya!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
        })
            .then((willDelete) => {
                if (willDelete) {
                    $('#'+item_id).submit();
                } else {
                    swal("Cancelled Successfully");
                }
            });
    }
</script>

@endsection