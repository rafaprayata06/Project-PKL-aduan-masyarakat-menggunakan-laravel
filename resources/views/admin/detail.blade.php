@extends('layout.petugas')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@section('konci')
@if (Auth::guard('web')->user()->level=='admin')
<h5 class="h3 mb-2 text-gray-800">Detail Admin</h5>
              
          @else
          <h5 class="h3 mb-2 text-gray-800">Detail Petugas</h5>
          @endif
          

    <div class="container-fluid px-4">
        @include('sweetalert::alert')


        <div class="card mt-5 " style="width:33rem; margin-left:20%;">
          @if (Auth::guard('web')->user()->level=='admin')
          <h6 class="card-header text-center">Detail Admin</h6>
              
          @else
          <h6 class="card-header text-center">Detail Petugas</h6>
          @endif
            
            <div class="card-body">
                <img src="{{ url('tmp_file').'/'.Auth::guard('web')->user()->foto }}" style="width: 300px; margin-left:17%;" class="img-thumbnail img-fluid mb-5" alt=""><br>
 
                <label for=""><strong>Email:&nbsp;</strong></label>
                <label for="">{{ Auth::guard('web')->user()->email }}</label><br>
                
                <label for=""><strong>Nama:&nbsp;</strong></label>
                <label for="">{{ Auth::guard('web')->user()->name }}</label><br>

                <label for=""><strong>Nomor Telpon:&nbsp;</strong></label>
                <label for="">{{ Auth::guard('web')->user()->telpon }}</label><br>

              <a href="#" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile</a>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" action={{ '/home/'.Auth::guard('web')->user()->id }} enctype="multipart/form-data" method="post"  novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Email</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control" id="validationCustomUsername" value="{{ Auth::guard('web')->user()->email }}" name="email" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Nama</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" name="name" id="validationCustomUsername" value="{{ Auth::guard('web')->user()->name }}" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Telpon</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" class="form-control"  name="telpon" id="validationCustomUsername" value="{{ Auth::guard('web')->user()->telpon }}" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                                
                        
                            <div class="col-md-6">
                              <label for="validationCustomUsername" class="form-label">Avatar</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i> </span>
                                <input type="file" class="form-control" name="foto" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                
                              </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                              @if (Auth::guard('web')->user()->foto)
                        <div class="mb-2">
                            <img src="{{ url('tmp_file').'/'.Auth::guard('web')->user()->foto  }}" style="max-height: 50px; max-width:170px;" alt="">
                            </div>
                           
                        @endif
                        
                            </div>
                                     
                        </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan?</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
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

