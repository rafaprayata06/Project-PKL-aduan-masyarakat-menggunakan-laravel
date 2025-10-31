@extends('layout.dashbord')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@section('konten')


<h5 class="h3 mb-2 text-gray-800 mb-4">Detail Profile</h5>
    <div class="container-fluid px-4">
        @include('sweetalert::alert')

        <div class="row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <img src="{{ url('tmp_file').'/'.Auth::guard('masyarakat')->user()->foto  }}" style="max-height:200px; max-width:300px;" alt="">
                  
          </div>
          <div class="col-sm-6">
            <table class="table table-borderless">
              <tr>
                <th>Nik:</th>
                <td>{{ Auth::guard('masyarakat')->user()->nik }}</td>
              </tr>
              <tr>
                <th>Nama:</th>
                <td>{{ Auth::guard('masyarakat')->user()->nama }}</td>
              </tr>
              <tr>
                <th>Tanggal Bergabung:</th>
                <td>{{ Auth::guard('masyarakat')->user()->tgl_bergabung->isoFormat('dddd, D MMMM Y') }}</td>
              </tr>
              <tr>
                <th>Nomor Telpon:</th>
                <td>{{ Auth::guard('masyarakat')->user()->telp }}</td>
              </tr>
              
              <tr>
                <th><a href="#" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile</a>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="row g-3 needs-validation" action={{ '/rating/'.Auth::guard('masyarakat')->user()->nik }} enctype="multipart/form-data" method="post"  novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-6 mb-3">
                              <label for="validationCustomUsername" class="form-label">Nik</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-vcard"></i></span>
                                <input type="text" class="form-control" disabled id="validationCustomUsername" value="{{ Auth::guard('masyarakat')->user()->nik }}" name="nik" aria-describedby="inputGroupPrepend" required>
                               
                              </div>
                             
                            </div>
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Nama</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" name="nama" id="validationCustomUsername" value="{{ Auth::guard('masyarakat')->user()->nama }}" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Telpon</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" class="form-control"  name="telp" id="validationCustomUsername" value="{{ Auth::guard('masyarakat')->user()->telp }}" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                                
                        
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Avatar</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
                                <input type="file" class="form-control" name="foto" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                              @if (Auth::guard('masyarakat')->user()->foto)
                        <div class="mb-2">
                            <img src="{{ url('tmp_file').'/'.Auth::guard('masyarakat')->user()->foto  }}" style="max-height: 50px; max-width:170px;" alt="">
                            </div>
                           
                        @endif
                        
                            </div>
                        </div>
                        <div class="modal-footer">
                          <small class="text-danger" style="margin-right:50%;">Nik Tidak Dapat Di Rubah!</small>
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan?</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </th>
                
              </tr>
              
            </table>
          </div>
        </div> 


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