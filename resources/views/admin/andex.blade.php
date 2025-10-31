
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->

    <title>Admin-Petugas | Login Admas</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://103.219.112.84/pundi_backend/assets/css/app.css">
    <link rel="stylesheet" href="http://103.219.112.84/pundi_backend/css/myStyle.css">
    <link rel="stylesheet" href="http://103.219.112.84/pundi_backend/css/util.css">

</head>
<body class="light">
  @include('sweetalert::alert')
    <div class="page parallel">
        <div class="d-flex row">
            <div class="col-md-9 height-full css-selector d-flex align-content-center flex-wrap ">
                <div class="col-md-6">
                    <div class="text-white p-l-80">
                        <p class="fs-50 mb-4 font-weight-light">ADMAS</p>
                        <span class="fs-25 font-weight-lighter">Aduan Masyarakat</span>
                        <br>
                        <span class="fs-25 font-weight-lighter">Tingkatkan Kualitas Layanan Aduan Dan Berikan Respon Yang Memuaskan</span>
                        <hr class="mt-2 bg-white" width="200%">
                    </div>
                </div>
                <div class="absolute bottom-0 text-white m-l-90 mb-5">COPYRIGHT RPL © 2023.</div>
            </div>
            <div class="col-md-3 white ">
                <div class="pl-5 pt-5 pr-5  pb-0">
                    <img src="http://103.219.112.84/pundi_backend/images/template/logo.png" class="mx-auto d-block" width="130" alt=""/>
                </div>
                <div class="p-5"  style="margin-buttom:50%;">
                    <h3 class="font-weight-normal">Selamat Datang</h3>
                    <p>Silahkan masukan Email dan password Anda.</p>
                    @if ($errors->any())
                <div class="alert alert-danger" style="width:200px;">
                    <ul>
                        @foreach ($errors->all() as $item)
                          <center>  <li style="font-size:0.6rem;">{{ $item }}</li></center>
                        @endforeach
                    </ul>
                </div>
                    
                @endif

                
                    <form class="row g-3 needs-validation" method="post" action="petugas-admin/login" novalidate>
                        @csrf
                        <div class="col-12">
                        
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" style="color: rgb(116, 149, 211);" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg></span>
                            <input type="email" class="form-control" id="validationCustomUsername" placeholder="email" name="email" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Email Tidak Boleh Kosong Kosong!
                            </div>
                          </div>
                        </div> 
                        <div class="col-12">
                         
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="16" style="color: rgb(116, 149, 211);" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg></span>
                            <input type="password" class="form-control" id="validationCustomUsername" placeholder="Password" name="password" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Password Tidak Boleh Kosong!
                            </div>
                          </div>
                        </div>
                        
                        
                       
                            
                            <button type="submit" class="btn btn-primary mt-4" style="width: 90%; margin-left:6%;">Login</button>
                      
                      </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

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