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

<section class="section">
    <div class="card">
        <div class="card-header">
            Tabel Transaksi Voucher
        </div>
        <div class="card-body">
            <div class="mb-4">
                {{-- <div class="btn-group">
                    <a href="{{ url('/transaksi/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Surat Keterangan Usaha</i></a>
                </div> --}}
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Lokasi</th>
                        <th>Kuantiti</th>
                        <th>Total</th>
                        <th>Status</th>
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
                        <td>{{ $transaksi->email}}</td>
                        <td>{{ $transaksi->no_telepon }}</td>
                        <td>{{ $transaksi->lokasi}}</td>
                        <td>{{ $transaksi->kuantiti}}</td>
                        <td style='font-weight: bold'>{{ $transaksi->total}}</td>
                        <td><span class="badge bg-success">{{ $transaksi->status}}</span></td>
                        
                        {{-- <td align="center" >
                            <a href="{{ URL('transaksi/edit/'. $transaksi->id_transaksi) }}" class="btn btn-success">Edit</a>
                            <a href="{{ URL('transaksi/delete/'. $transaksi->id_transaksi) }}" class="btn btn-danger">Hapus</a>
                        </td> --}}
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
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ URL('/transaksi/delete') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          Apakah anda yakin akan menghapus data ini?  <br>
        </div>
        <input type="hidden" id="id_surat" name="id_transaksi">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div> --}}

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>

{{-- <script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script>   --}}

@endpush