@extends('layouts.main')
@section('content')
<title>MANDALA.NET - Voucher Wifi Cibungbulang</title>
<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }
</style>

<div class="row justify-content-md-center">
  <div class="col-md-8">
    <div class="card-body">
        
        <div class="col-lg-12 col-md-6" >
            <div class="card mb-3">
               <div class="card-body">
                <div class="card-header ">
                    <img src="{{ asset ('assets/images/logo-net/mandala.net.png') }}" alt="fluid" class="center">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Voucher Internet Murah dan Unlimited untuk sekitaran Yayasan Mandala</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th>Masa Aktif</th>
                                    <th>Harga (Rp.)</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3 JAM</td>
                                    <td class="text-bold-500">2.000</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" id="product-btn">Beli</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5 JAM</td>
                                    <td class="text-bold-500">3.000</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" id="product-btn">Beli</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1 HARI</td>
                                    <td class="text-bold-500">5.000</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" id="product-btn">Beli</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>7 HARI</td>
                                    <td class="text-bold-500">20.000</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" id="product-btn">Beli</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1 BULAN</td>
                                    <td class="text-bold-500">50.000</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" id="product-btn">Beli</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                 </div>
               </div>
             </div>
         </div>
        
    </div>
  </div>
</div>
@endsection