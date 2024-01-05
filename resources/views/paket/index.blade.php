@extends('layouts.backoffice')
@section('judul')
<title>Data Voucher Available - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
@section('content')

<div class="page-heading">
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Voucher Available</h3>
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
                        <i class="bi bi-error-circle me-50"></i>Tambah Paket
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#tambahvoucher"><i class="bi bi-file-earmark-plus me-50"></i> Tambah Baru</a>
                    </div>
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
                        <th>Paket</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $paket)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $paket->paket }}</td>
                        <td>{{ $paket->hargas->durasi}}</td>
                        <td>Rp. {{ number_format($paket->hargas->harga)}}</td>
                        
                        {{-- <td align="center" >
                            <a href="{{ URL('voucher/edit/'. $paket->id_voucher) }}" class="btn btn-success">Edit</a>
                            <a href="{{ URL('voucher/delete/'. $paket->id_voucher) }}" class="btn btn-danger">Hapus</a>
                        </td> --}}
                        <td align="center" >
                            <a href="{{ URL('adminvoucher/paket/delete/'. $paket->id_paket) }}" class="btn btn-danger" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $paket->paket }} ?')">Hapus</a>
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
                        <form class="form form-horizontal" method="POST" action="{{ url('adminvoucher/paket/store') }}" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal"><b>Paket</b></label>
                                    </div>
                                        @csrf
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                            <input type="text" id="email-horizontal" class="form-control" name="paket"
                                                placeholder="Paket ..">
                                            </fieldset>
                                        </div>
                                    <div class="col-md-4">
                                        <label for="email-horizontal"><b>Durasi</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                        <input type="text" id="email-horizontal" class="form-control" name="durasi"
                                            placeholder="Durasi ..">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="contact-info-horizontal"><b>Harga</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                        <input type="number" id="email-horizontal" class="form-control" name="harga"
                                            placeholder="Harga ..">
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
@endsection
@push('js')

<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>

<script>
    // Auto hide notification after 30 seconds
    setTimeout(function () {
        document.getElementById('notification').style.display = 'none';
    }, 5000);
</script>




@endpush