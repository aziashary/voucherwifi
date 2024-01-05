@extends('layouts.backoffice')
@section('judul')
<title>Data Voucher Terpakai - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
@endpush
@section('content')

<div class="page-heading">
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Voucher Terpakai</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Voucher Terpakai</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            Tabel Voucher Terpakai
        </div>
        <div class="card-body">
            <div class="btn-group mb-1">
                <div class="dropdown ms-1">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu p-4" aria-labelledby="dropdownFilter" style="min-width: 500px;">
                        <!-- Dropdown Filter Paket -->
                        <form method="POST" action="{{ url('adminvoucher/voucher/filterused') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <h6 class="dropdown-header"><b>Paket</b></h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="paketCheckbox3J" name="paket[]" value="3J"> 
                                        <label class="form-check-label" for="paketCheckbox3J">3J</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="paketCheckbox5J" name="paket[]" value="5J"> 
                                        <label class="form-check-label" for="paketCheckbox5J">5J</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="paketCheckbox1H" name="paket[]" value="1H"> 
                                        <label class="form-check-label" for="paketCheckbox1H">1H</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="paketCheckbox7H" name="paket[]" value="7J"> 
                                        <label class="form-check-label" for="paketCheckbox7H">7H</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="paketCheckbox1B" name="paket[]" value="1B"> 
                                        <label class="form-check-label" for="paketCheckbox1B">1B</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <li><hr class="dropdown-divider"></li>
                        
                        <!-- Dropdown Filter Lokasi -->
                        <div class="mb-3">
                            <h6 class="dropdown-header"><b>Lokasi</b></h6>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="lokasiCheckboxGRDNET" name="lokasi[]" value="GRD.NET"> 
                                        <label class="form-check-label" for="lokasiCheckboxGRDNET">GRD.NET</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="lokasiCheckboxPERMATAASRINET" name="lokasi[]" value="PERMATAASRI.NET"> 
                                        <label class="form-check-label" for="lokasiCheckboxPERMATAASRINET">PERMATAASRI.NET</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="lokasiCheckboxMANDALANET" name="lokasi[]" value="MANDALA.NET"> 
                                        <label class="form-check-label" for="lokasiCheckboxMANDALANET">MANDALA.NET</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="lokasiCheckboxNDDNET" name="lokasi[]" value="NDD.NET"> 
                                        <label class="form-check-label" for="lokasiCheckboxNDDNET">NDD.NET</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <li><hr class="dropdown-divider"></li>
                        
                        <!-- Dropdown Filter Lokasi -->
                        <div class="mb-3">
                            <h6 class="dropdown-header"><b>Status</b></h6>
                            <div class="row">
                                <div class="form-group">
                                    @foreach($data->unique('status_voucher') as $voucher)
                                        <input type="checkbox" class="form-check-input" id="lokasiCheckboxGRDNET" name="status[]" value=">{{ $voucher->status_voucher }}"> 
                                        <label class="form-check-label">{{ $voucher->status_voucher }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        

                        <li><hr class="dropdown-divider"></li>
                
                        <!-- Datepicker -->
                        <div class="mb-3">
                            <h6 class="dropdown-header"><b>Tanggal</b></h6>
                            <div class="input-group">
                                <input type="date" class="form-control" id="datepickerStart" placeholder="Tanggal Awal" name="start_date">
                                <span class="input-group-text">to</span>
                                <input type="date" class="form-control" id="datepickerEnd" placeholder="Tanggal Akhir" name="end_date">
                            </div>
                        </div>
                
                        <!-- Apply Button -->
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary">Apply Filter</button>
                        </form>
                        <form method="GET" action="{{ url('adminvoucher/voucher/used') }}" enctype="multipart/form-data">
                            <button class="btn btn-secondary">Reset Filter</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lokasi</th>
                        <th>Kode Voucher</th>
                        <th>Paket</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $voucher)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $voucher->lokasi}}</td>
                        <td style='font-weight: bold'>{{ $voucher->kode_voucher}}</td>
                        <td>{{ $voucher->paket }}</td>
                        <td>{{ $voucher->hargas->durasi}}</td>
                        <td>{{ $voucher->hargas->harga}}</td>
                        <td>
                            @if($voucher->status_voucher == "Pending")
                                <span class="badge bg-warning">Pending</span></td>
                            @elseif($voucher->status_voucher == "Expired")
                                <span class="badge bg-danger">Expired</span></td>
                            @endif
                            
                            {{-- <a href="{{ URL('voucher/edit/'. $voucher->id_voucher) }}" class="btn btn-success">Edit</a>
                            <a href="{{ URL('voucher/delete/'. $voucher->id_voucher) }}" class="btn btn-danger">Hapus</a>
                        </td> --}}
                        <td align="center" >
                            <a href="{{ URL('voucher/print/'. $voucher->id_voucher) }}" target="_blank" class="btn btn-primary">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ URL('/voucher/delete') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          Apakah anda yakin akan menghapus data ini?  <br>
        </div>
        <input type="hidden" id="id_surat" name="id_voucher">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>



@endpush