@extends('layouts.main')
@section('judul')
<title>Queensi.net - Voucher Wifi Cibungbulang</title>
@endsection

@section('content')
<div class="card-body">
            {{-- <div class="card mt-2">
                <div class="card-header">
                    <div class="card-title">Pilih Voucher :
                    </div>
                </div> --}}
                      <div class="row">

                        {{-- GRD --}}
                        <div class="col-lg-6 col-md-6" >
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/grd.net.png') }}" alt="fluid" width="150" height="80">
                              </div>
                              <div class="row justify-content-md-center">
                                <p class="card-text" style="font-size:120%; text-align: center; font-weight: bold">
                                  Grand Riscound Dramaga Leuwiliang Desa Cibeber 1</p>
                                  <div class="col-md-12 text-center">
                                    <a href="{{ url("menu/GRD.NET") }}" class="btn btn-outline-primary" id="product-btn">Beli Sekarang</a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        {{-- MANDALA --}}
                        <div class="col-lg-6 col-md-6" >
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/mandala.net.png') }}" alt="fluid" width="150" height="80">
                              </div>
                              <div class="row justify-content-md-center">
                                <p class="card-text" style="font-size:120%; text-align: center; font-weight: bold">
                                  Yayasan Mandala Kp. Hegarsari Desa Cibeber 1</p>
                                  <div class="col-md-12 text-center">
                                    <a href="{{ url("menu/MANDALA.NET") }}" class="btn btn-outline-primary" id="product-btn">Beli Sekarang</a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="row">

                        {{-- PERMATAASRI --}}
                        <div class="col-lg-6 col-md-6" >
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/permataasri.net.png') }}" alt="fluid" width="150" height="80">
                              </div>
                              <div class="row justify-content-md-center">
                                  <p class="card-text" style="font-size:120%; text-align: center; font-weight: bold">
                                    Perum Bukit Permataasri Kp. Warnasari Timur Rt. 01 Rw. 12 Desa Cibeber 1</p>
                                    <div class="col-md-12 text-center">
                                      <a href="{{ url("menu/PERMATAASRI.NET") }}" class="btn btn-outline-primary" id="product-btn">Beli Sekarang</a>
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        {{-- NDD --}}
                        <div class="col-lg-6 col-md-6" >
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/ndd.net.png') }}" alt="fluid" width="150" height="80">
                              </div>
                              <div class="row justify-content-md-center">
                                  <p class="card-text" style="font-size:120%; text-align: center; font-weight: bold">
                                    Kampung Cijujung Rt. 01 Rw. 02 Desa Cijujung</p>
                                    <div class="col-md-12 text-center">
                                      <a href="{{ url("menu/NDD.NET") }}" class="btn btn-outline-primary" id="product-btn">Beli Sekarang</a>
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      {{-- cek voucher --}}
                        <div class="col-lg-12 col-md-6" >
                          <div class="card mb-3">
                            <div class="card-header">
                              <div class="card-title"><p style="font-size:80%; text-align: center; font-weight: bold">
                                Cek disini untuk proses transaksi vouchermu!</p>
                                <div class="col-md-12 text-center">
                                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal">Cek Disini</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      <div class="col-lg-12 col-md-6" >
                        <div class="card mb-3">
                          <div class="card-header">
                            <div class="card-title"><h1 style="font-size:200%; text-align: center; font-weight: bold">Metode Pembayaran</p></div>
                          </div>
                          <div class="card-body">
                            {{-- Bank --}}
                            <h3 class="card-text" style="font-size:150%; text-align: center; font-weight: bold">
                              Virtual Account
                            </h3>
                            <p class="card-text" style="font-size:100%; text-align: center;">
                              Pembayaran dari berbagai bank dapat dikenali dan diterima secara otomatis 
                              dan mudah hanya dengan Virtual Account sesuai bank tertera.
                            </p>
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/bank.png') }}" alt="fluid">
                              </div>

                            <br>
                            <br>
                            <br>

                            {{-- e-wallet   --}}
                            <h3 class="card-text" style="font-size:150%; text-align: center; font-weight: bold">
                              E-Wallet
                            </h3>
                            <p class="card-text" style="font-size:100%; text-align: center;">
                              Pembayaran mudah dengan e-Wallet populer di Indonesia dan pembayaran diterima secara otomatis 
                              dan mudah hanya dengan melakukan pembayaran di e-Wallet tertera.
                            </p>
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/e-wallet.png') }}" alt="fluid">
                              </div>

                            <br>
                            <br>
                            <br>

                            {{-- QRIS   --}}
                            <h3 class="card-text" style="font-size:150%; text-align: center; font-weight: bold">
                              QRIS
                            </h3>
                            <p class="card-text" style="font-size:100%; text-align: center;">
                              Pembayaran mudah dengan QRIS dan pembayaran diterima secara otomatis 
                              dan mudah hanya dengan melakukan pembayaran via portal pembayaran manapun yang sudah memiliki fitur QRIS.
                            </p>
                              <div class="row justify-content-md-center">
                                <img src="{{ asset ('assets/images/logo-net/qris.png') }}" alt="fluid">
                              </div>
                          </div>
                        </div>
                      </div>        
  </div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-sm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLongTitle">Input Kode Transaksi</h5>
                        <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                  
                <form method="POST" action="{{ URL('/bayar/cekkode' ) }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Kode Transaksi :</label>
                          <div class="col-sm-12">
                            <input type="text" name="kode_transaksi" class="form-control" required> 
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>                                 
@endsection
