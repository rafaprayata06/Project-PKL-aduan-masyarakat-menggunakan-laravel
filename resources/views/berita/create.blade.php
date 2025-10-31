@extends('layout.petugas')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<style>
  input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #517fe0;
  padding: 2px 10px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}
</style>
@section('konci')
@include('sweetalert::alert')
<h4 class="h3 container mb-0 text-gray-800 mb-4">Berita</h4>

<div class="row">
    <div class="col-12 mb-3 mb-sm-0">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Buat Berita <i class="bi bi-journal-plus"></i>
</button>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Berita</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data" action="/berita" novalidate>
                  @csrf
                  <input type="hidden" class="form-control" name='user_id'>
                  <div class="col-12">
                    <div class="input-group has-validation">
                      <select class="form-select form-select-sm" name="category" id="validationCustom04" required>
                        <option selected disabled value="">Pilih Category Berita</option>
                        <option>Kriminal</option>
                        <option>Sosial</option>
                        <option>Keagamaan</option>
                        <option >Politik</option>
                        <option>Pendidikan</option>
                        <option>Pariwisata</option>
                        <option>Budaya</option>
                      </select>
                  
                     <div class="invalid-feedback">
                       Wajib pilih salah satu.
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                   <div class="form-floating mb-3">

                  
                    <input type="text" class="form-control form-control-sm"  id="floatingInput" name="judul" placeholder="name@example.com" id="validationCustom03" required>
                    <label for="floatingInput">Judul berita</label>
                    <div class="invalid-feedback">
                     Wajib Isi Judul Berita.
                    </div>
                   </div>
                  </div>
                  
                  <div class="col-12">
                    <textarea class="form-control form-control" style="max-height:300px; min-height:100px;" placeholder="Masukkan berita" name="isi" id="validationCustom03" required></textarea>
                    
                  <div class="invalid-feedback">
                    Berita wajib di isi.
                  </div>

                  </div>
                  <div class="col-12">
                   
                    <div class="input-group has-validation">
                      
                      <input type="file" accept="image/*" name="foto" aria-describedby="inputGroupPrepend" required id="validationCustomUsername">
                    <div class="invalid-feedback">
                        Foto wajib di isi.
                      </div>
                    </div>
                  </div>
                  
        
        
         
        </div>
        
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Create</button>
      </div>
    </form>

    </div>
  </div>
</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Publish</th>
                                <th style="width: 450px;">Berita</th>
                                <th>Category</th>
                                <th>Hapus</th>
                        
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Tgl Publish</th>
                              <th>Berita</th>
                              <th>Category</th>
                              <th>Hapus</th>
                      
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            
                          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                          <?php $no = 0;?>
                          @foreach ($berita as $post)
                          <?php $no++ ;?>
                          <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $post->tgl_post->isoFormat('dddd, D MMMM Y') }}</td>
                          <td class="d-inline-block text-truncate" style="width: 500px;"><a href="{{ route('berita.show',$post->id_post) }}" class="link-offset-2 link-underline link-underline-opacity-10 text-info">{{ $post->isi }}</a></td>
                          <td>{{ $post->category }}</td>
                          <td class="text-center" ><i class="bi bi-trash3-fill" style="color: rgb(229, 153, 143)" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $post->id_post }}"></i></td>
                          <div class="modal fade" id="exampleModal1{{ $post->id_post }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                              <div class="modal-content">
                                
                              <div class="modal-header pt-1 bg-danger">

                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <i class="bi bi-exclamation-lg" style="font-size:5rem ; margin-left:33%; color:gold;"></i>
                                    </div>
                                  <div class="col-12">
                                    <p style="">Apakah anda yakin ingin menghapus berita ini?</p>
                                  </div>
                                  </div>
                                  <div class="d-flex justify-content-center">
                                  <button type="button" class="btn btn-secondary btn-sm mr-2" data-bs-dismiss="modal">Close</button>
                                  <form action="{{ '/berita/'.$post->id_post }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                  </div>
                                </form>
                                
                                </div>
                                
                                  
                              </div>
                            </div>
                          </div>
                          </tr>
                          
                      
                          @endforeach
                            
                     </tbody>
                    </table>
                </div>
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


