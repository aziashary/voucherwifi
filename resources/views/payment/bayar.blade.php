<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Transaksi - Queensi.net Internet Cibungbulang</title>
    
    <link rel="stylesheet" href="{{ asset ('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset ('assets/images/header.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset ('assets/images/header.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
    
<link rel="stylesheet" href="{{ asset ('assets/css/shared/iconly.css') }}">
@stack('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

    <body>
        <div class="container">
        {{-- <div class="row justify-content-md-end">
            <div class="col-md-3">
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                        <label class="form-check-label" ></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
                </div>
            </div>
        </div> --}}

        {{-- body --}}
        <div class="row justify-content-md-center">
            <div class="col-md-8">

                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="card-body">
                          
                            <div class="col-lg-12 col-md-6" >
                                <div class="card mb-3">
                                    <div class="card-content">
                                        <div class="card-header">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                                    <a href="{{ url('/') }}" class="btn icon icon-left"><i data-feather="arrow-left"></i>Kembali</a>
                                                    </div>
                                                    <div class="col-12 col-md-6 order-md-6 order-last">
                                                        <table class="table table-borderless" style='font-weight: bold;font-size:72%;text-align:right'>
                                                            <tbody>
                                                                @foreach($data as $bayar)
                                                                <tr>
                                                                    <td>Email </td>
                                                                    <td style="text-align:left">: {{ $bayar->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No Whatsapp </td>
                                                                    <td style="text-align:left"> : {{ $bayar->no_telepon }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="font-size:105%; text-align: center; font-weight: bold;">Kode Transaksi*</p>
                                            @foreach($data as $bayar)
                                                <h1 style="font-size:170%; text-align: center; font-weight: bold;">{{ $bayar->kode_transaksi }}</h1>
                                            @endforeach
                                           
                                        <div class="card-body">
                                            
                                                <div class="col-md-12 text-center">
                                                        <table class="table" style='font-size:90%;text-align:left'>
                                                                <tbody>
                                                                    @foreach($data as $bayar)
                                                                    <tr>
                                                                        <td>Kode Transaksi* :</td>
                                                                        <td style="font-weight: bold;text-align:right;font-size:105%;">{{ $bayar->kode_transaksi }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Paket Voucher :</td>
                                                                        <td style="font-weight: bold;text-align:right;font-size:105%;">{{ $bayar->paket }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Harga Voucher :</td>
                                                                        <td style="font-weight: bold;text-align:right;font-size:105%;">Rp. {{ number_format($bayar->hargas->harga) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jumlah Voucher :</td>
                                                                        <td style="font-weight: bold;text-align:right;font-size:105%;">{{ $bayar->kuantiti }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Subtotal :</td>
                                                                        <td style="font-weight: bold;text-align:right;font-size:105%;">Rp. {{ number_format($bayar->hargas->harga * $bayar->kuantiti) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Biaya Admin :</td>
                                                                        <td style="font-weight: bold;text-align:right;font-size:105%;">Rp. {{ number_format($bayar->biaya_admin) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: bold;font-size:105%;">Total :</td>
                                                                       <h3><td style="font-weight: bold;font-size:160%;text-align:right">Rp. {{ number_format($bayar->total) }}</td></h3>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                        </table>
                                                </div>
                                                    <div class="col-md-12">
                                                    <i style="font-size:65%;text-align:left">*Wajib simpan / salin kode transaksi atau screenshot halaman ini untuk kelanjutan dan kelancaran proses transaksi</i>
                                                    </div>
                                                <br>
                                                    <div class="float-start">
                                                    <p style="font-weight: bold;font-size:100%;">Total :
                                                        @foreach ($data as $bayar)
                                                        <a style="font-weight: bold;font-size:110%;">Rp. {{ number_format($bayar->total) }}</a></p>
                                                    </div>
                                                        @if($bayar->status == "PAID")
                                                    <div class="float-end">
                                                        <button href="{{ url($bayar->payment_link) }}" class="btn btn-secondary" id="product-btn" disabled>Transaksi Berhasil!</a>
                                                    </div>
                                                        @endif
                                                        @if($bayar->status != "PAID")
                                                    <div class="float-end">
                                                        <a href="{{ url($bayar->payment_link) }}" class="btn btn-success" id="product-btn" target="_blank">Bayar</a>
                                                    </div>
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6" >
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="alert alert-danger" id="myAlert" style="display:none">
                                            Selesaikan transaksi anda terlebih dahulu.
                                          </div>
                                        <div class="card-title"><p style="font-size:80%; text-align: center; font-weight: bold">
                                            Sudah Selesai Transaksi? Konfirmasi disini!</p>
                                            <div class="col-md-12 text-center">
                                                <a href="{{ url('bayar/showvoucher/'.$item->kode_transaksi) }}" class="btn btn-outline-primary">Konfirmasi Disini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        {{-- footer --}}
        <footer>

        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="col-md-12 text-center">
                        <p>2023 Copyright: &copy; Queensi.net | Keluhan dan saran : <a href="http://wa.me/6285157774439">Klik Disini (WA)</a></p>
                    </div>
                </div>
            </div>
        </div>
           
        </footer>
@stack('js')

@if ($errors->any())
  <script>
    document.getElementById("myAlert").style.display = "block";

    setTimeout(function() {
      $("#myAlert").fadeOut();
    }, 5000);
  </script>
@endif

<script src="{{ asset ('assets/js/bootstrap.js')}}"></script>
<script src="{{ asset ('assets/js/app.js')}}"></script>
    
<!-- Need: Apexcharts -->
{{-- <script src="{{ asset ('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset ('assets/js/pages/dashboard.js')}}"></script> --}}

</body>

</html>
