@extends('layouts.backoffice')
@section('judul')
<title>Data Transaksi Voucher - Aplikasi Surat Desa</title>
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
            <h3>Data Transaksi Voucher</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Transaksi Voucher</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Balance/Saldo</h6>
                        <h6 class="font-extrabold mb-0">{112.000}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Transaksi Sukses</h6>
                        <h6 class="font-extrabold mb-0">183.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldAdd-User"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Transaksi Pending</h6>
                        <h6 class="font-extrabold mb-0">80.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon red mb-2">
                            <i class="iconly-boldBookmark"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Transaksi Expired</h6>
                        <h6 class="font-extrabold mb-0">112</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="btn-group mb-1">
                
                <div class="dropdown ms-1">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu p-4" aria-labelledby="dropdownFilter" style="min-width: 500px;">
                        <!-- Dropdown Filter Paket -->
                        <form method="POST" action="{{ url('adminvoucher/transaksi/filter') }}" enctype="multipart/form-data">
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
                        
                        <!-- Dropdown Filter status dan metode-->

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="dropdown-header"><b>Metode Pembayaran</b></h6>
                                    <div class="form-group">
                                        @foreach($data->whereNotNull('payment_method')->unique('payment_method') as $transaksi)
                                            <input type="checkbox" class="form-check-input" name="metode[]" value="{{ $transaksi->payment_method }}"> 
                                            <label class="form-check-label" for="lokasiCheckboxGRDNET">{{ $transaksi->payment_method }}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="dropdown-header"><b>Status</b></h6>
                                    <div class="row">
                                        <div class="form-group">
                                            @foreach($data->unique('status') as $transaksi)
                                                <input type="checkbox" class="form-check-input" name="status[]" value="{{ $transaksi->status }}"> 
                                                <label class="form-check-label" for="lokasiCheckboxGRDNET">{{ $transaksi->status }}</label>
                                            @endforeach
                                        </div>
                                    </div>
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
                        <form method="GET" action="{{ url('adminvoucher/transaksi') }}" enctype="multipart/form-data">
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
                        <th>Kode Transaksi</th>
                        <th>No Telepon</th>
                        <th>Lokasi</th>
                        <th>Paket</th>
                        <th>Kuantiti</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $transaksi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td style='font-weight: bold'>{{ $transaksi->kode_transaksi}}</td>
                        <td>{{ $transaksi->no_telepon }}</td>
                        <td>{{ $transaksi->lokasi}}</td>
                        <td>{{ $transaksi->paket}}</td>
                        <td>{{ $transaksi->kuantiti}}</td>
                        <td style='font-weight: bold'>Rp. {{ $transaksi->total}}</td>
                        <td>
                            @if($transaksi->status == "PAID")
                                <span class="badge bg-success">PAID</span></td>
                            @elseif($transaksi->status == "PENDING")
                                <span class="badge bg-secondary">PENDING</span></td>
                            @endif
                        </td>
                        
                        <td align="center" >
                            <button type="button" class="btn btn-primary" data-id="{{ $transaksi->id_transaksi }}" data-bs-toggle="modal" 
                                data-bs-target="#detailModal">
                                Detail
                              </button>
                        </td>
                        {{-- <td align="center" >
                            <a href="{{ URL('transaksi/print/'. $transaksi->id_transaksi) }}" target="_blank" class="btn btn-primary">Print</a>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    
        <div class="modal-body">
            
            <table class="table" style='font-size:90%;text-align:left'>
                <tbody>
                    <tr>
                        <td>Kode Transaksi :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="kodetransaksi"></a></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="email"></a></td>
                    </tr>
                    <tr>
                        <td>No Telepon/WA :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="no_telepon"></a></td>
                    </tr>
                    <tr>
                        <td>Paket Voucher :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="paket"></a></td>
                    </tr>
                    <tr>
                        <td>Harga Voucher :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;">Rp. <a id="harga"></a></td>
                    </tr>
                    <tr>
                        <td>Jumlah Voucher :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="kuantiti"></a></td>
                    </tr>
                    <tr>
                        <td>Subtotal :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;">Rp. <a id="subtotal"></a></td>
                    </tr>
                    <tr>
                        <td>Biaya Admin :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;">Rp. <a id="biaya_admin"></a></td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="metode"></a></td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="status"></a></td>
                    </tr>
                    <tr>
                        <td>Waktu Transaksi :</td>
                        <td style="font-weight: bold;text-align:right;font-size:105%;"><a id="tanggal"></a></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;font-size:105%;">Total :</td>
                       <h3><td style="font-weight: bold;font-size:160%;text-align:right">Rp. <a id="total"></a></td></h3>
                    </tr>
                </tbody>
        </table>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $('#detailModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id');
  
      $.ajax({
          url: 'get-detail-data/'+ id,
        type: 'GET',
        success: function(response) {
          $('#kodetransaksi').text(response.kodetransaksi);
          $('#email').text(response.email);
          $('#no_telepon').text(response.no_telepon);
          $('#paket').text(response.paket);
          $('#kuantiti').text(response.kuantiti);
          $('#metode').text(response.metode);

            var numberharga = parseFloat(response.harga);
                var harga = numberharga.toLocaleString();
                    $('#harga').text(harga);

            var numbersubtotal = parseFloat(response.subtotal);
                var subtotal = numbersubtotal.toLocaleString();
                    $('#subtotal').text(subtotal);

            var numberbiaya_admin = parseFloat(response.biaya_admin);
                var biaya_admin = numberbiaya_admin.toLocaleString();
                    $('#biaya_admin').text(biaya_admin);

         
            var numbertotal = parseFloat(response.total);
                var total = numbertotal.toLocaleString();
                    $('#total').text(total);

            // Tanggal dan waktu yang diterima dari Ajax
            var datetimeString = response.tanggal;

                // Membuat objek Date dari string tanggal dan waktu
                var datetimeObj = new Date(datetimeString);

                    // Mendapatkan nilai tanggal, bulan, dan tahun
                    var day = datetimeObj.getDate().toString().padStart(2, '0');
                    var month = (datetimeObj.getMonth() + 1).toString().padStart(2, '0');  // Ditambah 1 karena bulan dimulai dari 0
                    var year = datetimeObj.getFullYear();

                        // Mendapatkan nilai jam, menit, dan detik
                        var hours = datetimeObj.getHours().toString().padStart(2, '0');
                        var minutes = datetimeObj.getMinutes().toString().padStart(2, '0');
                        var seconds = datetimeObj.getSeconds().toString().padStart(2, '0');

                            // Membuat format yang diinginkan (misalnya: DD-MM-YYYY HH:mm:ss)
                            var formattedDatetime = `${day}-${month}-${year} | ${hours}:${minutes}:${seconds}`;

                            // Menetapkan nilai tanggal dan waktu yang sudah diformat ke dalam elemen HTML dengan ID "tanggal"
                            $('#tanggal').text(formattedDatetime);

             var statusText = "";
                var statusClass = "";

                if (response.status === "PAID") {
                    statusText = "PAID";
                    statusClass = "badge bg-success";
                } else if (response.status === "PENDING") {
                    statusText = "PENDING";
                    statusClass = "badge bg-secondary";
                } else {
                    // Tindakan jika status tidak sesuai dengan kondisi di atas
                    statusText = "Status Tidak Valid";
                    statusClass = "badge bg-danger";
                }

                // Menetapkan nilai ke dalam elemen dengan ID "status"
                $('#status').html(`<span class="${statusClass}">${statusText}</span>`);


        }
      });
    });
  </script>

@endpush