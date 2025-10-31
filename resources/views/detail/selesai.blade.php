@extends('layout.petugas')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@section('konci')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pengaduan Selesai</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pelapor</th>
                        <th>Tgl Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th class="text-center">Foto</th>
                        <th>Detail</th>
                      
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Pelapor</th>
                     
                        <th>Tgl Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th class="text-center">Foto</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
                <tbody>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                  @foreach ($foto as $item)
                  <tr>
                    <td>{{ $item->nama }}</td>
                    
                    <td>{{ Carbon\Carbon::parse($item->tgl_pengaduan)->isoFormat('dddd, D MMMM Y')  }}</td>
                    <td class="d-inline-block text-truncate" style="max-width: 300px;">{{ $item->isi_laporan }}</td>
                     <td>
                        @if ($item->status == '0')
                        <span class="badge  text-bg-danger">panding</span> 

                        @elseif($item->status =='proses')
                        <span class="badge  text-bg-warning text-white">proses</span>
                        @else
                        <span class="badge  text-bg-success " >selesai</span>
                        @endif
                     </td>
                  
                   <td>
     <button type="button" class="btn btn-transparent " style="margin-right:0%;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id_pengaduan }}">
<img style="max-width:50px; max-height:50px;"  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$item->foto }}" alt="">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <img style="max-width:650px; max-height:600px; "  class="object-fit-xl-contain border rounded" src="{{ url('foto').'/'.$item->foto }}" alt="">
</div>
</div>
                </td>
                <td>
                    <a href="{{  route('home-petugas-admin.show',$item->id_pengaduan)  }}" type="button"class="btn btn tranparent d-flex justify-content-center"><i class="bi bi-eye"></i>
                    </a>
                </td>
               
                    
                </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div
@endsection