<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher - Pembayaran Berhasil - Queensi.net Internet Cibungbulang</title>
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
                                            <a href="{{ url('/') }}" class="btn icon icon-left"><i data-feather="arrow-left"></i>Kembali</a>
                                            <p style="font-size:120%; text-align: center; font-weight: bold;">Voucher Internet Kode Transaksi : </p>
                                                <h1 style="font-size:170%; text-align: center; font-weight: bold;">{{ $item->kode_transaksi }}</h1>
                                                <h1 style="font-size:170%; text-align: center; font-weight: bold;">{{ $item->lokasi }}</h1>
                                        <div class="card-body">
                                                <div class="col-md-12 text-center">
                                                        <table class="table" style='text-align:center'>
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> Durasi </th>
                                                                    <th> Lokasi </th>
                                                                    <th> Kode Voucher </th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            $no = 1;
                                                            ?>
                                                                <tbody>
                                                                    @foreach($data as $voucher)
                                                                    <tr>
                                                                        <td> {{ $no++ }} </td>
                                                                        <td>{{ $voucher->durasi  }}</td>
                                                                        <td>{{ $voucher->lokasi }}</td>
                                                                        <td>{{ $voucher->kode_voucher }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                        </table>
                                                </div>
                                                    
                                                <br>
                                                    <div class="float-start">
                                                        {{-- <a href="{{ url($bayar->payment_link) }}" class="btn btn-success" id="product-btn" target="_blank">Bayar Sekarang</a>
                                                        @foreach ($data as $bayar)
                                                        <a style="font-weight: bold;font-size:100%;">Rp. {{ $bayar->total }}</a></p> --}}
                                                    </div>
                                                    <div class="float-end">
                                                        <p style="font-size:55%; text-align: center;">Download Voucher : </p>
                                                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-success">Xls</button>
                                                            <button type="button" class="btn btn-primary">PNG</button>
                                                            <button type="button" class="btn btn-danger">PDF</button>
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

<script src="{{ asset ('assets/js/bootstrap.js')}}"></script>
<script src="{{ asset ('assets/js/app.js')}}"></script>
    
<!-- Need: Apexcharts -->
{{-- <script src="{{ asset ('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset ('assets/js/pages/dashboard.js')}}"></script> --}}

</body>

</html>
