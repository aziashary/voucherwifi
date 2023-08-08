@extends('layouts.main')
@section('content')
<title>{{ $item }} - Voucher Internet Cibungbulang</title>
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
                <div class="card-header ">
                  <a href="{{ url('/') }}" class="btn icon icon-left"><i data-feather="arrow-left"></i>Kembali</a>
                  {{-- foto header create --}}
                    @if($item == 'GRD.NET')
                    <img src="{{ asset ('assets/images/logo-net/grd.net.png') }}" alt="fluid" class="center">@endif
                    @if($item == 'NDD.NET')
                    <img src="{{ asset ('assets/images/logo-net/NDD.net.png') }}" alt="fluid" class="center">@endif
                    @if($item == 'PERMATAASRI.NET')
                    <img src="{{ asset ('assets/images/logo-net/permataasri.net.png') }}" alt="fluid" class="center">@endif
                    @if($item == 'MANDALA.NET')
                    <img src="{{ asset ('assets/images/logo-net/mandala.net.png') }}" alt="fluid" class="center">@endif
                    
                </div>
                <div class="card-content">
                    <div class="card-body">

                      {{-- form error --}}
                      @if (session('error_source') === 'stok')
                      <div class="alert alert-danger">
                        <strong>Stok Kurang!</strong> Pesan sesuai dengan stok yang tersedia.
                      </div>
                      @elseif (session('error_source') === 'captcha')
                      <div class="alert alert-danger">
                        <strong>Captha Error!</strong> Harap centang kotak captcha.
                      </div>
                      @endif

                        <p class="card-text">Voucher Internet Murah dan Unlimited untuk sekitaran Grand Riscound Dramaga</p>
                          <div class="col-md-12 text-center">
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg" style='font-size:120%; text-align: center; font-weight: bold'>
                                  <thead>
                                      <tr>
                                          <th>Masa Aktif</th>
                                          <th>Harga (Rp.)</th>
                                          <th> </th>
                                      </tr>
                                    </thead>
                                      <tbody>
                                          @foreach($data as $voucher)
                                          <tr>
                                              <td>{{ $voucher->durasi}}</td>
                                              <td>{{ number_format($voucher->harga)}}</td>
                                              <td align="center" >
                                                    <button type="button" class="btn btn-primary" data-id="{{ $voucher->paket }}" data-bs-toggle="modal" 
                                                      data-item="{{ $item }}" data-bs-target="#myModal">
                                                      Beli
                                                    </button>
                                              </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <br>
                      </div>
                  </div>
             </div>
         </div>

    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-sm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLongTitle">Isi Data Diri dan Jumlah Pemesanan</h5>
                        <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                  
                <form method="POST" action="{{ URL('/bayar/store/'.$item ) }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email :</label>
                          <div class="col-sm-12">
                            <input type="text" name="email" class="form-control" required> 
                          </div>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">No Whatsapp:</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="no_whatsapp" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                     <div class="mb-3">
                        <label for="message-text" class="col-form-label">Jumlah Pemesanan :</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" name='kuantiti' min="1" value="1" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               Stok Voucher Tersedia : <a style='font-size:100%;font-weight: bold' id="stokVoucher"></a>
                            </div>
                                <input type="hidden" name="paket" id="paket">
                        </div>
                     </div>
                     <div class="mb-3">
                      <label for="message-text" class="col-form-label">Metode Pembayaran:</label>
                          <div class="row">
                              <div class="col-sm-12">
                                <select class="form-control" name='biaya_admin'>
                                  <option value='4000'>Transfer VA + 4000</option>
                                  <option value='500'>e-Wallet dan QRIS + 500</option>
                                </select>
                              </div>
                          </div>
                  </div>
                     {{-- <div class="mb-3">
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="g-recaptcha" data-sitekey="6Le8zFwkAAAAAONGfyAb5f08uN0BM349EDD9L-26"></div>
                              </div>
                          </div>
                     </div> --}}
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="name"></p>
          <p id="email"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}


@endsection

@push('js')
{{-- ajax --}}
<script>
  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var paket = button.data('id');
    var lokasi = button.data('item');

    $.ajax({
        url: 'checkout/'+ paket +'/'+ lokasi,
      type: 'GET',
      success: function(response) {
        $('#stokVoucher').text(response.stok);
        $('#paket').val(response.paket);
        $('#stok').val(response.stok);
      }
    });
  });
</script>

@if ($errors->any())
  <script>
    setTimeout(function() {
      $("#myAlert").fadeOut();
    }, 5000);
  </script>
@endif

<script>
  $('#modalForm').submit(function(e){
  if(grecaptcha.getResponse() == ''){
    e.preventDefault();
    alert('Please complete the recaptcha.');
  }
});
</script>

@endpush