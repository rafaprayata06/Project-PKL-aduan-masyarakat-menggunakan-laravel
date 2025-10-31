@extends('layout.petugas')

<link rel="stylesheet" href="{{ asset('assetss/css/lib/datatable/dataTables.bootstrap.min.css') }}">

@section('konci')

@include('sweetalert::alert')

<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Akun Petugas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Bergabung</th>
                        <th>Role</th>
                        <th>Nama</th>
                        <th>Telpon</th>
                        <th class="text-center">Aksi  </th>
                                         
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Bergabung</th>
                        <th>Role</th>
                        <th>Nama</th>
                        <th>Telpon</th>
                        <th class="text-center">Aksi</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($petugas as $auth)
                         
                    <tr>
                        
                        <td>{{ $auth->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>{{ $auth->level }}</td>
                        <td><img src="{{ url('tmp_file').'/'.$auth->foto }}"  alt="twbs" width="31" height="30" class="rounded-circle flex-shrink-0">
                            &nbsp;{{ $auth->name }}</td>
                        <td>{{ $auth->telpon }}</td>
                        <td class="text-center"><i  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $auth->id }}" class="fa-solid fa-gear fa-spin" style="color:rgb(231, 218, 102)"></i>
                            <i class="fa-solid fa-trash-can-arrow-up"  data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $auth->id }}" style="color:rgb(230, 95, 95)"></i>
                        </td>
                    </tr>   

                    
                    
                    <div class="modal fade" id="exampleModal{{ $auth->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content ">
                            
                              <h1 class="modal-title fs-5 text-center mt-3 mb-2" id="exampleModalLabel">Rubah Data Petugas  <i class="fa-solid fa-user-gear fa-bounce"></i></h1>
                              
                            
                            <div class="modal-body">
                              <form action="{{ '/petugas/'.$auth->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-transparent" ><i class="fa-regular fa-address-card"></i></span>
                                    <input type="text" class="form-control" value="{{ $auth->email }}" name="email" required aria-label="Username" aria-describedby="addon-wrapping">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-transparent" ><i class="fa-solid fa-user-tie"></i></span>
                                    <input type="text" class="form-control" value="{{ $auth->name }}" name="name" required aria-label="Username" aria-describedby="addon-wrapping">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-transparent" ><i class="fa-solid fa-mobile-screen-button"></i></span>
                                    <input type="text" class="form-control" value="{{ $auth->telpon }}" name="telpon" required aria-label="Username" aria-describedby="addon-wrapping">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-transparent" ><i class="fa-solid fa-camera-retro"></i></span>
                                    <input type="file" required class="form-control" required placeholder="Username" name="foto"  aria-label="Username" aria-describedby="addon-wrapping">
                                  </div>
                                </div>
                               <div class="col-md-6">

                                      </div>
                                      <div class="col-md-6 mt-2">
                                        @if ($auth->foto)
                                  <div class="mb-2">
                                      <img src="{{ url('tmp_file').'/'.$auth->foto }}" style="max-height: 50px; max-width:170px;" alt="">
                                      </div>
                                    
                                  @endif
                                  
                                      </div>

                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-warning btn-sm" >Simpan Perubahan?</button>
                              
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>   
                      
                   
<div class="modal fade" id="exampleModal1{{ $auth->id }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <p style="">Apakah anda yakin ingin menghapus data ini?</p>
          </div>
          </div>
          <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-secondary btn-sm mr-2" data-bs-dismiss="modal">Close</button>
          <form action="{{ '/petugas/'.$auth->id }}" method="post">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
          </div>
        </form>
        
        </div>
        
          
      </div>
    </div>
  </div>  
 
                    @endforeach       
                </tbody>
            </table>
        </div>
    </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

 <script src="{{ asset('assetss/js/lib/data-table/datatables.min.js') }}"></script>
 <script src="{{ asset('assetss/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
 <script src="{{ asset('assetss/js/lib/data-table/dataTables.buttons.min.js"') }}"></script>
 <script src="{{ asset('assetss/js/lib/data-table/datatables-init.js') }}"></script>


 <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>
@endsection
