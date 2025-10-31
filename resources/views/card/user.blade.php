@extends('layout.petugas')

<link rel="stylesheet" href="{{ asset('assetss/css/lib/datatable/dataTables.bootstrap.min.css') }}">

@section('konci')

@include('sweetalert::alert')



    
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun Masyarakat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Bergabung</th>
                                <th>Nik</th>
                                <th>Nama Masyarakat</th>
                                <th>Telpon</th>
                                <th class="text-center">Aksi  </th>
                                                 
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal Bergabung</th>
                                <th>Nik</th>
                                <th>Nama Masyarakat</th>
                                <th>Telpon</th>
                                <th class="text-center">Aksi</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                                @foreach ($user as $auth)
                                      <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
 
                                      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                                     <td>{{ $auth->tgl_bergabung->isoFormat('dddd, D MMMM Y') }}</td>
                                     <td>{{ $auth->nik }}</td>
                                     
                                     <td><img src="{{ url('tmp_file').'/'.$auth->foto }}"  alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                                         <a data-bs-toggle="modal" data-bs-target="#exampleModalDetail{{ $auth->nik }}"class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">{{ $auth->nama }}</a></td>
                                        <td>{{ $auth->telp }}</td>
                                      <td class="text-center"><i class="bi bi-person-fill-gear"  style="font-size:1rem; color:rgb(201, 189, 28);" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $auth->nik }}"></i>&nbsp;&nbsp;<i class="bi bi-trash3-fill" style="color: rgb(229, 153, 143)" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $auth->nik }}"></i>
                                      
                                        @if ($auth->ban=='1')
                                    &nbsp;<i class="fa-regular fa-circle-check" data-bs-toggle="modal" data-bs-target="#exampleModalBan{{ $auth->nik }}" style="color:rgb(25, 124, 25);"></i>
                                        </button>
                                        @else
                                        &nbsp;<i class="fa-solid fa-ban" style="color:rgb(233, 16, 16);" data-bs-toggle="modal" data-bs-target="#exampleModalBan{{ $auth->nik }}"></i>
                                        @endif
                                        </td>
                                       <div class="modal fade" id="exampleModalBan{{ $auth->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            @if ($auth->ban =='1')
                                            
                                            <div class="modal-header p-1 pb-1 bg-light">
                                              <i class="fa-solid fa-circle-check mt-2 mb-2" style="color:rgb(25, 124, 25); font-size:1.5rem ;  margin-left:47%;"></i>
 
                                             
                                            </div>
                                            
                                            
                                                
                                            @else
                                            <div class="modal-header p-1 pb-1 bg-light">
                                              <i class="fa-solid fa-ban mt-2 mb-2" style="font-size:1.5rem ;  margin-left:47%; color:rgb(243, 39, 49);"></i>
 
                                             
                                            </div>
                                            @endif
                                            <div class="modal-body">

                                              <form action="{{ '/ban/'.$auth->nik }}" method="post">
                                                @csrf
                                                @method('PUT')
                                              
                                                <input type="hidden" name="nik" value="{{ $auth->nik}}">
                                                <select class="form-select form-select-sm mb-3" name="ban" aria-label="Default select example">
                                                @if ($auth->ban=='1')
                                               
                                                  <option selected disabled value="">Aksi</option>
                                                  <option disabled value="">Ban</option>
                                                  <option value="0">Aktifkan</option>
                                                </select>

                                                @else
                                            
                                                  <option selected disabled value="">Aksi</option>
                                                  <option  value="1">Ban</option>
                                                  <option disabled value="">Aktifkan</option>
                                                </select>

                                                @endif

                                              @if ($auth->ban=='1')
                                              <div class="col-12">
                                                <p style="text-align:center">Apakah anda yakin ingin mengaktifkan kembali akun {{ $auth->username }}?</p>
                                              </div>
                                              
                                              @else
                                              <div class="col-12">
                                                <p style="text-align:center">Apakah anda yakin ingin menonaktifkan akun {{ $auth->username }}?</p>
                                              </div>
                                              
                                              @endif
                                              </div>
                                              <div class="d-flex justify-content-center pb-3">
                                              <button type="button" class="btn btn-secondary btn-sm mr-2" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary btn-sm">Oke</button>
                                              </form>
                                              </div>
                                            
                                            
                                            
                                            
                                            
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal fade" id="exampleModal1{{ $auth->nik }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                              <form action="{{ '/jawab/'.$auth->nik }}" method="post">
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
                                    <div class="modal fade" id="exampleModal{{ $auth->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content ">
                                            
                                              <h1 class="modal-title fs-5 text-center mt-3 mb-2" id="exampleModalLabel">Rubah Data Masyarakat  <i class="fa-solid fa-user-gear fa-bounce"></i></h1>
                                              
                                            
                                            <div class="modal-body">
                                              <form action="{{ '/update/'.$auth->nik }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                              <div class="row">
                                                <div class="col-md-6 mb-3">
                                                  <div class="input-group flex-nowrap">
                                                    <span class="input-group-text bg-transparent" ><i class="fa-regular fa-address-card"></i></span>
                                                    <input type="text" class="form-control" value="{{ $auth->nik }}" name="nik" required aria-label="Username" aria-describedby="addon-wrapping">
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="input-group flex-nowrap">
                                                    <span class="input-group-text bg-transparent" ><i class="fa-solid fa-user-tie"></i></span>
                                                    <input type="text" class="form-control" value="{{ $auth->nama }}" name="nama" required aria-label="Username" aria-describedby="addon-wrapping">
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="input-group flex-nowrap">
                                                    <span class="input-group-text bg-transparent" ><i class="fa-solid fa-mobile-screen-button"></i></span>
                                                    <input type="text" class="form-control" value="{{ $auth->telp }}" name="telp" required aria-label="Username" aria-describedby="addon-wrapping">
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
                                      
                                      
                                      <div class="modal fade" id="exampleModalDetail{{ $auth->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Masyarakat</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-sm-6">
                                                  <img src="{{ url('tmp_file').'/'.$auth->foto  }}" style="max-height:200px; max-width:300px;" alt="">
                                                        
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                  <p style="text-align: justify; text-indent: 0.5in;">  
                                                  <h6><strong>Nik:</strong>&nbsp;{{ $auth->nik}}</h6>
                                                  <h6><strong>Nama:</strong>&nbsp;{{ $auth->nama}}</h6>
                                                  <h6><strong>Tgl Bergabung:</strong>&nbsp;{{ $auth->tgl_bergabung->isoFormat('dddd, D MMMM Y')}}</h6>
                                                  <h6><strong>Email:</strong>&nbsp;{{ $auth->email}}</h6>
                                                  <h6><strong>Telpon:</strong>&nbsp;{{ $auth->telp}}</h6>
                                                  </p>
                                                </div>
                                            </div>
                                            
                                          
                                              
                                            
                                          </div>
                                        </div>
                                      </div>
                                        <tr>
                                         
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

