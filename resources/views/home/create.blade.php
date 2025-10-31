

@extends('layout.dashbord')
@section('konten')
@include('sweetalert::alert')


<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
<style>
  .image_upload > input{display:none;}
  input[type=file]{width:220px;height:auto;}
  </style>
<h1 class="h3 mb-4 text-gray-800">Buat Pengaduan</h1>

<div class="container shadow p-3 mb-2 bg-body-tertiary rounded">
  
  
    <form  method="post" action="/home" enctype="multipart/form-data"class=" needs-validation" novalidate>
      @csrf
      <input type="hidden" class="form-control" name='nik'>

      
  <div class="d-flex flex-row-reverse position-relative">
    <div class=""><p class="image_upload">
      <label for="userImage">
      <a class="btn btn-primary btn-sm mt-2"  rel="nofollow"><span class='glyphicon glyphicon-paperclip'></span><i class="fa-solid fa-image fa-beat-fade"></i></a>
      </label>
      <input type="file" name="foto" id="userImage">
    </p></div>
    <div class="p-1 mt-2">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <p class="text-secondary">masukkan foto aduan di sini <i class="bi bi-arrow-right"></i></p>
      </label>
     
    </div>
  
  </div>

  <div class=" position-relative mb-3">
 
    <select class="form-select form-select-sm" id="validationTooltip04" name="jenis_pengaduan" required>
      <option selected disabled value="">Pilih Jenis pengaduan</option>
      <option>Pelayanan Publik</option>
      <option>Penyalahgunaan Wewenang</option>
    </select>
    <div class="invalid-tooltip">
      <i class="bi bi-exclamation-circle"></i> Tolong isi jenis pengaduan.
    </div>
  </div>
  
  

  <div class="mb-2 position-relative">
    
    <textarea class="form-control" id="validationTooltip04" style="min-height:95px; max-height:250px;" placeholder="isi laporan" name="isi_laporan" required></textarea>
    <div class="invalid-tooltip">
      <i class="bi bi-exclamation-circle"></i> Tolong isi laporan pengaduan.
    </div>
  </div>

  
  <input type="reset" class="btn btn-sm btn-danger mt-4" value="Reset">
  <button type="submit" class="btn  btn-sm btn-primary mt-4">Buat Pengaduan</button>
 
</form>
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


