@extends('layouts.backoffice')
@section('judul')
<title>Data Voucher Available - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .container {
    display: flex;
    flex-direction: column;
}

.button-container {
    margin-bottom: 10px; /* Atur jarak antara tombol dan collapse */
}
</style>

@endpush
@section('content')

<div class="page-heading">
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Voucher Available
                
            </h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Voucher Available</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    @foreach($lokasi as $lok )
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    @php
                        $countlokasi = \App\Models\Voucher::where('lokasi', $lok->lokasi)->where('status_voucher','Available')->count();
                    @endphp
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold"><b>Voucher</b></h6>
                        <a class="text-muted font-semibold" style="font-size:15px"><b>{{ $lok->lokasi }}</b></a>
                        <h3 class="font-extrabold mb-0" style="color: {{ $countlokasi < 100 ? 'red' : 'black' }}">
                            {{ $countlokasi }}
                        </h3>
                        
                    </div>
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-2 justify-content-start ">
                        <a class="btn btn-info" data-bs-toggle="collapse" href="#collapse{{ $lok->id_lokasi }}" role="button" aria-expanded="false" aria-controls="collapse{{ $lok->id_lokasi }}">
                            Detail
                        </a>
                    </div>
                    
                    <div class="container">
                        <div class="collapse multi-collapse" id="collapse{{ $lok->id_lokasi }}">
                            <table class="table" style='font-size:90%;text-align:left'>
                                @php
                                    $results = \App\Models\Paket::select('.paket.paket', \App\Models\Voucher::raw('COUNT(id_voucher) as jumlah_voucher'))
                                        ->join('voucher', 'paket.paket', '=', 'voucher.paket')
                                        ->join('lokasi', 'voucher.lokasi', '=', 'lokasi.lokasi')
                                        ->where('lokasi.lokasi', $lok->lokasi)
                                        ->where('voucher.status_voucher', 'Available')
                                        ->groupBy('paket.paket')
                                        ->orderby('paket.id_paket', 'asc')
                                        ->get();
                                @endphp
                                <tbody>
                                    @foreach($results as $jumlah_voucher)
                                    <tr>
                                        <td>{{ $jumlah_voucher->paket }} :</td>
                                        <td style="font-weight: bold; text-align: right; font-size: 105%; color: {{ $jumlah_voucher->jumlah_voucher < 10 ? 'red' : 'black' }}">
                                            {{ $jumlah_voucher->jumlah_voucher }}
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            Tabel Voucher Available
        </div>
        <div class="card-body">
            <div class="btn-group mb-1">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                        id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bi bi-error-circle me-50"></i>Tambah Voucher
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#tambahvoucher"><i class="bi bi-file-earmark-plus me-50"></i> Tambah Baru</a>
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#tambahexcel"><i class="bi bi-file-earmark-spreadsheet me-50"></i>Upload file excel</a>
                    </div>
                </div>
           
                <div class="dropdown ms-1">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu p-4" aria-labelledby="dropdownFilter" style="min-width: 500px;">
                        <!-- Dropdown Filter Paket -->
                        <form method="POST" action="{{ url('adminvoucher/voucher/filter') }}" enctype="multipart/form-data">
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
                        <form method="GET" action="{{ url('adminvoucher/voucher') }}" enctype="multipart/form-data">
                            <button class="btn btn-secondary">Reset Filter</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown ms-1">
                    <a class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false">
                        Voucher Tersisa
                    </a>
                </div>
            </div>
            @if(session('success') || session('error'))
                <div id="notification" class="alert @if(session('success')) alert-success @elseif(session('error')) alert-danger @endif">
                    {{ session('success') ?: session('error') }}
                </div>
            @endif

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
                        <td><span class="badge bg-success">{{ $voucher->status_voucher}}</span></td>
                        
                        {{-- <td align="center" >
                            <a href="{{ URL('voucher/edit/'. $voucher->id_voucher) }}" class="btn btn-success">Edit</a>
                            <a href="{{ URL('voucher/delete/'. $voucher->id_voucher) }}" class="btn btn-danger">Hapus</a>
                        </td> --}}
                        <td align="center" >
                            <a href="{{ URL('adminvoucher/voucher/delete/'. $voucher->id_voucher) }}" class="btn btn-danger" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $voucher->kode_voucher }} ?')">Hapus</a>
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
<div class="modal fade" id="tambahvoucher" tabindex="-1" role="dialog"
aria-labelledby="tambahvoucherTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahvoucherTitle">Tambah Kode Voucher
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ url('adminvoucher/voucher/store') }}" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal"><b>Lokasi</b></label>
                                    </div>
                                        @csrf
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="lokasi" name="lokasi">
                                                <option value="">-- Pilih Lokasi --</option>
                                                <option value="GRD.NET">GRD.NET</option>
                                                <option value="MANDALA.NET">MANDALA.NET</option>
                                                <option value="PERMATAASRI.NET">PERMATA ASRI.NET</option>
                                                <option value="NDD.NET">NDD.NET</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email-horizontal"><b>Kode Voucher</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                        <input type="text" id="email-horizontal" class="form-control" name="kode_voucher"
                                            placeholder="Kode Voucher ..">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="contact-info-horizontal"><b>Paket</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="paket" name="paket" required>
                                            <option value="">-- Pilih Paket --</option>
                                            @foreach ($paket as $item)
                                                <option value={{ $item->id_paket }}>{{ $item->paket }} - {{ $item->durasi }}</option>
                                            @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Submit</span>
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="tambahexcel" tabindex="-1" role="dialog"
aria-labelledby="tambahexcelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahexcelTitle">Tambah Voucher Via Excel
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content">
                    <div class="card-body">
                        <div class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal"><b>Upload Excel</b></label>
                                    </div>
                                    <form method="POST" action="{{ route('upload.excel') }}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="col-md-8 form-group">
                                        <input type="file" name="excel_file" accept=".xls, .xlsx">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" data-bs-toggle="modal" data-bs-target="#templateexcel" class="btn btn-info">
                    <i class="bx bx-download d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Download Template Excel</span>
                </a>
                
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Submit</span>
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

{{-- modal template excel --}}
<div class="modal fade" id="templateexcel" tabindex="-1" role="dialog"
aria-labelledby="templateexcelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="templateexcelTitle">Catatan untuk unggahan data voucher excel
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
                <div class="modal-body">
                    <p>- Harap tidak mengubah atau menghapus judul kolom dan tidak menambah segala sesuatu selain dikolom yang sudah disediakan.
                         Tindakan tersebut akan membuat data unggahan tidak terbaca oleh sistem.</p>
                    <p>- Pastikan tidak ada kesalahan pengetikan pada lokasi, kode voucher, dan paket, karena akan menyebabkan data tidak muncul di customer.</p>
                    <p>- Cek kembali kode unik voucher pada excel, jika mengupload dengan kode unik voucher yang sama antara unggahan excel dan yang sudah ada disistem,
                        maka unggahan akan gagal.</p>
                    <p>- Jika ada tipe paket baru, diharuskan menambah data tipe paket terlebih dahulu di sistem, setelah itu baru bisa tambah tipe data baru di file excel.</p>
                
                    <p><b>Harap cermati poin-poin di atas sebelum upload data voucher melalui excel.</b></p>
                
                    <!-- Tombol untuk mengunduh template excel -->
                    <a href="{{ url('adminvoucher/voucher/download') }}" class="btn btn-info">
                        <i class="bx bx-download d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Download Template Excel</span>
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

<script>
    // Auto hide notification after 30 seconds
    setTimeout(function () {
        document.getElementById('notification').style.display = 'none';
    }, 5000);

    // Close notification when X button is clicked
    document.getElementById('close-notification').addEventListener('click', function () {
        document.getElementById('notification').style.display = 'none';
    });
</script>





@endpush