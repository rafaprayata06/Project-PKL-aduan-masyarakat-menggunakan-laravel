@extends('layout.petugas')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@section('konci')
<div class="card-body">
  @include('sweetalert::alert')
  <div class="table-responsive">
      <table class=" table-borderless  table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  
                  
                  <th>Di Kirim</th>
                  <th>Nama Masyarakat</th>
                  <th>Saran</th>
                  <th>Rating</th>
                  <th>Status</th>
                  <th>Aksi</th>
                                   
              </tr>
          </thead>
          <tfoot>
              <tr>
                  
                  
                  <th>Di Kirim</th>
                  <th>Nama Masyarakat</th>
                  <th>Saran</th>
                  <th>Rating</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  
                  
              </tr>
          </tfoot>
          <tbody>
                  @foreach ($saran as $auth)
                      <tr>
                          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                          <td>{{Carbon\Carbon::parse($auth->tgl_komen)->diffForHumans() }}</td>
                        <td><img src="{{ url('tmp_file').'/'.$auth->foto }}"   width="30" height="30" class="rounded-circle flex-shrink-0">
                           {{ $auth->nama }}</td>
                           <td class="d-inline-block text-truncate" style="max-width: 220px;">{{ $auth->kepuasan }}</td>
                           <td>
                            @if ($auth->rating == 'Tidak_Puas')
                            <span class="badge  text-bg-danger">Tidak Puas <i class="bi bi-emoji-angry"></i></span> 

                            @elseif($auth->rating=='Puas')
                            <span class="badge  text-bg-primary text-white">Puas <i class="bi bi-emoji-neutral"></i></span>
                            @else
                            <span class="badge  text-bg-success " >Sangat Puas <i class="bi bi-emoji-smile"></i></span>
                            @endif

                           </td>
                           <td>
                            @if ($auth->status == 'belum_baca')
                            <span type="button" class="badge  text-bg-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $auth->id_kepuasan }}">Belum Di Tanggapi</span>
                       {{-- <form action="{{ '/rating/'.$auth->id_kepuasan }}" method="post" >
                        @csrf
                        @method('PUT')
                        <span type="submit" class="badge  text-bg-danger text-white">Belum Di Tanggapi</span>
                       </form> --}}
                       
<div class="modal fade" id="exampleModal{{ $auth->id_kepuasan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Rubah Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
        <form action="{{ '/jawab/'.$auth->id_kepuasan }}" method="post" >
          @csrf
          @method('PUT')
          <input type="hidden" name="id_kepuasan" value="{{ $auth->id_kepuasan }}">

        <select class="form-select form-select-sm" name="status" aria-label="Default select example">
          <option selected disabled value="">Belum Di Tanggapi</option>
          <option value="dilihat">Di Tanggapi</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        
         
          

        <button type="submit" class="btn btn-primary btn-sm">Lakukan Prubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
                        @else
                        <span class="badge  text-bg-info text-white">Sudah Di Tanggapi</span>
                        @endif
                           </td>
                           <td><a href="{{ route('jawab.show',$auth->id_kepuasan) }}"><i class="bi bi-eye-fill" style="color:rgb(131, 131, 235);"></i></a>&nbsp;&nbsp;<i class="bi bi-send-check" style="color:rgb(238, 20, 209)" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $auth->id_kepuasan }}"></i></td>

                           <div class="modal fade" id="exampleModal1{{ $auth->id_kepuasan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Balas Komentar {{ $auth->nama }}?</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="/jawab" method="post">
                                      @csrf
                                      <input type="hidden" name="user_id">
                                      <input type="hidden" name="id_kepuasan" value="{{ $auth->id_kepuasan }}" >
                                    <div class="form-floating">
                                      <textarea class="form-control" name="jawab" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                      <label for="floatingTextarea">Comments</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        @endforeach              
                        
          </tbody>
      </table>
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

