<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admas | Login</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
	@include('sweetalert::alert')
	<link rel="stylesheet" href="{!! asset('bootstreps/css/rafa.css') !!}">
 <link rel="stylesheet" href="{!! asset('fontawesome/css/all.css') !!}">
		<div>
		   <div class="wave"></div>
		   <div class="wave"></div>
		   <div class="wave"></div>
		</div>
	  </body>
	
	  <div class="container">
	  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
		<div class="container-fluid">
		  <a class="navbar-brand"  href="#">
			<h4 class="mb-0 semi-bold"><i class="fa-brands fa-airbnb fa-flip" style="font-size:2rem;"></i>DMAS</h4>
			<P class="mt-o italic"  >Aduan Masyarakat</P>
		  </a>
		 
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText" style="margin-left:70%;">
			
			<span class="navbar-text">
			<!-- Button trigger modal -->
<a type="button" class="btn btn-tranparent text-white fw-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Login <i class="fa-sharp fa-solid fa-user-tie fa-beat"></i>
</a>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered">
	  <div class="modal-content">
	
		  <h1 class="modal-title fs-5 text-dark text-center mt-5" id="exampleModalLabel">Login Terlebih Dahulu <i class="fa-solid fa-person fa-bounce"></i></h1>
		  
	
		<div class="modal-body">
			<form class="row g-3 needs-validation" method="post" action="user/login" novalidate>
				@csrf
				<div class="col-12">
				
				  <div class="input-group has-validation">
					<div class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" style="color: rgb(116, 149, 211);" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
					  </svg></div>
					<input type="text" class="form-control" id="validationCustomUsername" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required>
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
					<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" aria-describedby="inputGroupPrepend" required>
					<span class="input-group-text"  onclick="myFunction()" id="mybutton"><i class="fa-solid fa-eye" style="color: rgb(100, 147, 209)"></i></span>

					<div class="invalid-feedback">
					  Password Tidak Boleh Kosong!
					</div>	
				  </div>
				</div>
				
				

				<script>
					function myFunction() {
						var x = document.getElementById("inputPassword");
						if (x.type === "password") {
							x.type = "text";
							document.getElementById('mybutton').innerHTML ='<i class="fa-solid fa-eye-slash fa-beat-fade" style="color: rgb(100, 147, 209)"></i>';
						} else {
							x.type = "password";
							document.getElementById('mybutton').innerHTML ='<i class="fa-solid fa-eye" style="color: rgb(100, 147, 209)"></i>';
					
						}
					}
				</script>
			
				
				
				<div class="modal-footer d-flex justify-content-center">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width:47%;">Close</button>
					<button type="submit" class="btn btn-primary" style="width: 47%;">Login</button>
				</div>
			  </form>
			  </div>
		</div>
		
		 
	  </div>
	</div>
  </div>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#daftarModal">
	Daftar <i class="bi bi-person-plus-fill" style="font-size:1.1rem;"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	
		  <h1 class="modal-title text-center mt-4 fs-5" id="exampleModalLabel">Buat Akun</h1>
		 
		
		<div class="modal-body">
			<form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data" action="user/create">
				@csrf
				<div class="col-md-6">
				  <label for="validationCustomUsername" class="form-label">nik</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-vcard"></i></span>
					<input type="text" class="form-control" name="nik" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					  nik wajib di isi!
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <label for="validationCustomUsername" class="form-label">nama</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-earmark-person"></i></span>
					<input type="text" class="form-control"name="nama"id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					  nama wajib di isi!
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <label for="validationCustomUsername" class="form-label">email</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="fa-regular fa-envelope"></i></span>
					<input type="email" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					  Email wajib di isi!
										
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <label for="validationCustomUsername" class="form-label">password</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key"></i></span>
					<input type="password" class="form-control" name="password" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					  Password wajib di isi!
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <label for="validationCustomUsername" class="form-label">nomor telpon</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone"></i></span>
					<input type="number" class="form-control" name="telp" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					  nomor telpon wajib di isi!
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <label for="validationCustomUsername" class="form-label">avatar</label>
				  <div class="input-group has-validation">
					<span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
					<input type="file" class="form-control" name="foto" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
					 foto wajib di sisi!
					</div>
				  </div>
				</div>
				
				</div>
				
			 
				<div class="modal-footer d-flex justify-content-center">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width:47%;">Close</button>
					<button type="submit" class="btn btn-primary" style="width: 47%;">Login</button>
				</div>
	</form>
</div>
	  </div>
	</div>
  </div>
</span>
		  </div>
		</div>
	  </nav>
	  </div>
	  <div class="container">
		@if ($errors->any())
		<div class="pt-3">
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $item)
				<li><i class="fa-solid fa-circle-exclamation"></i> {{ $item }}</li>   
				<meta http-equiv="refresh" content="2;url=/user">
				@endforeach
				</ul>
			</div>
		</div>
			@endif
			@if (Session::has('logout'))
			<div class="pt-3">
				<div class="alert alert-success">
					<span class="badge rounded-pill text-bg-success">Success</span>   {{ Session::get('logout') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
					<path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
					<path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
				  </svg>
				   <meta http-equiv="refresh" content="3;url=/user">
				</div>
				</div>
				@endif
				@if (Session::has('petugas'))
				<div class="pt-3">
				  <div class="alert alert-success">
					<span class="badge rounded-pill text-bg-success">success</span>   {{ Auth::guard('web')->user()->name }}  {{ Session::get('petugas') }}
				  </div>
				</div>
				  
			  @endif
	
	  </div>
	  <div class="text-center">
		<h2 class="medium text-white mt-3">Selamat Datang</h2>
		<p class="text-uppercase text-white mb-5">Sampaikan Pengaduan Dan Masalah Di Sekitar Lingkungan Anda<br>Kami Siap Membantu</p>
	  </div>
	  
	  
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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