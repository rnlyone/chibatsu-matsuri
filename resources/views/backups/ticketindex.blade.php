@include('layouts.header')

<style>
    .nav-item.disabled {
        color: #A9A9A9; /* warna abu-abu */
        pointer-events: none; /* pointer tidak aktif */
    }
    .disabled-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: auto;
        height: auto;
        background-color: rgba(169, 169, 169, 0.1); /* warna abu-abu transparan */
    }
</style>

<section class="main-search-header style-border sticky-tab">
    <ul class="nav nav-pills nav-tab-search  mt-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="list-tiket-tab" data-bs-toggle="pill" data-bs-target="#list-tiket" type="button" role="tab" aria-controls="list-tiket" aria-selected="true">Tiket</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="belum-bayar-tab" data-bs-toggle="pill" data-bs-target="#belum-bayar" type="button" role="tab" aria-controls="belum-bayar" aria-selected="false">Transaksi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="terbayar-tab" data-bs-toggle="pill" data-bs-target="#terbayar" type="button" role="tab" aria-controls="terbayar" aria-selected="false">Tiket Saya</button>
        </li>
    </ul>
</section>

<section class="un-details-collectibles un-activity-page mt-3">
    <div class="tab-content padding-t-40" id="pills-tabContent">
        <div class="tab-pane fade show active content-activity" id="list-tiket" role="tabpanel" aria-labelledby="list-tiket-tab">

            <div class="margin-t-20 un-title-default">
                <div class="text">
                    <h2>Tiket</h2>
                    <p> Beli Tiket Gakuensai Online </p>
                </div>
            </div>
                <div class="body p-0">
                    <form id="tixform" action="{{route('ordernow')}}" method="post">
                        @csrf
                        <ul class="nav flex-column">
                            @foreach ($tickets as $tix)
                            <hr>
                                <li class="nav-item">
                                    <a href="javascript: void(0)" class="nav-link visited">
                                        <div class="item-user-img" data-bs-toggle="modal" data-bs-target="#mdllBioDetails{{$tix->id}}">
                                            <div class="txt-user">
                                                <h5>{{$tix->nama_tiket}}</h5>
                                                <h5 class="fw-bold text-primary">Rp. {{number_format($tix->harga)}}</h5>
                                                @if ($tix->harga_coret != 0)
                                                <p><span class="text-decoration-line-through fw-light" style="font-size: 1.7vh">Rp.{{number_format($tix->harga_coret)}}</span></p>
                                                @endif
                                                <p><span class="fw-bold">{{$tix->kuota}}</span> Tersedia</p>
                                            </div>
                                        </div>
                                        <div class="other-option">
                                            @if ($tix->kuota != 0)
                                                <div class="form-group">
                                                    <input name="{{$tix->id}}" class="form-control minMax" min="0" max="@if ($tix->kuota < 10) {{$tix->kuota}} @else 10 @endif" type="number" value="0"/>
                                                </div>
                                            @else
                                                habis
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                </div>
                <!-- End.content-comp -->
                <div class="space-sticky-footer mb-5 zindex-sticky"></div>
                <div class="footer mb-5" style="z-index: 90;">
                    <div class="content">
                        <div class="txt-user">
                            <h5>Total</h5>
                            <h6 id="total">Rp.0</h6>
                        </div>
                        @auth
                        <a href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#mdllOtherOpen" class="btn btn-bid-items visited">
                            <p>Pesan</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </div>
                        </a>
                        @endauth
                        @guest
                        <a href="{{route('flogin')}}" class="btn btn-bid-items visited">
                            <p>Login</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </div>
                        </a>
                        @endguest
                    </div>
                </div>
        </div>
        <div class="tab-pane fade content-activity" id="belum-bayar" role="tabpanel" aria-labelledby="belum-bayar-tab">

            <div class="margin-t-20 un-title-default">
                <div class="text">
                    <h2>Transaksi</h2>
                    <p> Daftar transaksi Tiket Gakuensai </p>
                </div>
            </div>
            <hr>
            @auth
            <div class="un-myItem-list bg-white">
                @foreach ($orders as $order)
                <a href="{{route('cust.checkout', ['uuid' => $order->uuid])}}" class="nav flex-column" style="text-decoration: none">
                    <div class="nav-link">
                        <div class="cover_img">
                            <div class="txt">
                                <h2>#TRX-00{{$order->id}}</h2>
                                <p>@if ($order->status_bayar == 'pending')
                                    Belum Bayar
                                @elseif ($order->status_bayar == 'sukses')
                                    Sukses
                                @else
                                    gagals
                                @endif</p>
                            </div>
                        </div>
                        <div class="other-side">
                            @if ($order->status_bayar == 'pending')
                                <a href="#" class="out-link-warning">
                                    <i class="ri-check-line"></i>
                                </a>
                            @elseif ($order->status_bayar == 'sukses')
                                <a href="#" class="out-link-success">
                                    <i class="ri-check-line"></i>
                                </a>
                            @else
                                <a href="#" class="out-link-danger">
                                    <i class="ri-check-line"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @endauth
            @guest
            <footer class="footer-account">
                <div class="env-pb">
                    <div class="display-actions">
                        <a href="{{route('flogin')}}" class="btn btn-sm-arrow bg-primary visited">
                            <p>Sign In</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </div>
                        </a>
                    </div>
                    <div class="support">
                        <p>Need help? <a href="page-help.html" class="visited">Contact our support team</a></p>
                    </div>
                </div>
            </footer>
            @endguest
                <!-- End.content-comp -->
        </div>
        <div class="tab-pane fade content-activity" id="terbayar" role="tabpanel" aria-labelledby="terbayar-tab">

            <div class="margin-t-20 un-title-default">
                <div class="text">
                    <h2>Tiket Saya</h2>
                    <p> Daftar Tiket Gakuensai yang telah dibeli</p>
                </div>
            </div>
            <hr>
            @auth
            <div class="un-myItem-list bg-white">
                @foreach ($orders as $order)
                <a href="{{route('cust.checkout', ['uuid' => $order->uuid])}}" class="nav flex-column" style="text-decoration: none">
                    <div class="nav-link">
                        <div class="cover_img">
                            <div class="txt">
                                <h2>#TRX-00{{$order->id}}</h2>
                                <p>@if ($order->status_bayar == 'pending')
                                    Belum Bayar
                                @elseif ($order->status_bayar == 'sukses')
                                    Sukses
                                @else
                                    gagals
                                @endif</p>
                            </div>
                        </div>
                        <div class="other-side">
                            @if ($order->status_bayar == 'pending')
                                <a href="#" class="out-link-warning">
                                    <i class="ri-check-line"></i>
                                </a>
                            @elseif ($order->status_bayar == 'sukses')
                                <a href="#" class="out-link-success">
                                    <i class="ri-check-line"></i>
                                </a>
                            @else
                                <a href="#" class="out-link-danger">
                                    <i class="ri-check-line"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @endauth
            @guest
            <footer class="footer-account">
                <div class="env-pb">
                    <div class="display-actions">
                        <a href="{{route('flogin')}}" class="btn btn-sm-arrow bg-primary visited">
                            <p>Sign In</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </div>
                        </a>
                    </div>
                    <div class="support">
                        <p>Need help? <a href="page-help.html" class="visited">Contact our support team</a></p>
                    </div>
                </div>
            </footer>
            @endguest
                <!-- End.content-comp -->
        </div>

    </div>

</section>


{{-- modal ticket --}}
@foreach ($tickets as $tix)
<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade hide" id="mdllBioDetails{{$tix->id}}" tabindex="-1" aria-labelledby="modalBioDetails" style="display: hide;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{$tix->nama_tiket}}</h5>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-upload-item">
                    <h2 class="size-16 weight-500 text-dark margin-b-10">Deskripsi Tiket</h2>
                    <p>
                        {{$tix->deskripsi_tiket}}
                    </p>

                </div>

            </div>
            <div class="modal-footer border-0">
                <div class="env-pb"></div>
            </div>
        </div>
    </div>
</div>
@endforeach

@auth
    <div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllOtherOpen" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0"></div>
                <div class="modal-body pt-0">
                    <div class="content-alert-actions">
                        <div class="margin-b-20">
                            <h2>
                                Sudah yakin dengan pesanan anda?
                            </h2>
                        </div>

                        <div class="action-links">
                            <button type="button" class="btn border color-text rounded-pill margin-r-20" data-bs-dismiss="modal">Lihat Kembali</button>
                            <a href="javascript: void(0)" onclick="document.getElementById('tixform').submit()" class="btn bg-primary text-white rounded-pill">Pesan</a>
                        </div>

                    </div>

                </div>
                <div class="modal-footer border-0">
                    <div class="env-pb"></div>
                </div>
            </div>
        </div>
    </div>
@endauth

@include('layouts.footer')



<script>
    $(document).ready(function(){
  $('button[data-bs-toggle="pill"]').on('click', function (e) {
    var activeTab = $(e.target).attr('data-bs-target');
    document.cookie = "lastTab=" + activeTab;
    sessionStorage.setItem("lastTab", activeTab);
  });

  var lastTab = document.cookie.replace(/(?:(?:^|.*;\s*)lastTab\s*\=\s*([^;]*).*$)|^.*$/, "$1");
  if (lastTab !== '') {
    $('button[data-bs-target="' + lastTab + '"]').tab('show');
  } else {
    $('button[data-bs-toggle="pill"]:first').tab('show');
  }

  var sessionLastTab = sessionStorage.getItem("lastTab");
  if (sessionLastTab !== null) {
    $('button[data-bs-target="' + sessionLastTab + '"]').tab('show');
  }
});
</script>

<script src="/assets/js/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>

<script>
    let ticketIdToPriceMap = {
        @foreach ($tickets as $ticket)
            {{$ticket->id}}: {{$ticket->harga}},
        @endforeach
    };

    function updateTotal() {
      let inputs = $("input[type='number']");
      let total = 0;

      inputs.each(function(index, input) {
        $(input).attr("name", $(input).attr("name"));
        let ticketPrice = parseInt(ticketIdToPriceMap[$(input).attr("name")]);
        let ticketQuantity = parseInt($(input).val());
        let max = parseInt($(input).attr('max'));
        let min = parseInt($(input).attr('min'));

        if (ticketQuantity > max) {
          input.value = max;
        } else if (ticketQuantity < min) {
          input.value = min;
        }
        ticketQuantity = Math.max(0, Math.min(max, ticketQuantity));
        total += ticketPrice * ticketQuantity;
      });

      document.querySelector('#total').innerHTML = 'Rp. ' + total.toLocaleString();
    }
  </script>
