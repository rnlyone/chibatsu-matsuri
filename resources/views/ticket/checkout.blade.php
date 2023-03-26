@include('layouts.headersub')
@include('layouts.pagetitle')

<div class="unList-creatores follow-sellers bg-white pt-3">
    <div class="content-list-creatores">
        <ul class="nav flex-column">
            <li class="nav-item">
                <div class="nav-link mb-0">
                    <div class="item-user-img py-0">
                        <div class="txt-user">
                            <h5>Invoice</h5>
                        </div>
                    </div>
                    <div class="other-option item-user-img">
                        <div class="txt-user">
                            <p>#TRX-00{{$order->id}}</p>
                        </div>
                    </div>
                </div>
                <div class="nav-link mt-2 mb-0">
                    <div class="item-user-img py-0">
                        <div class="txt-user">
                            <h5>Tertagih</h5>
                        </div>
                    </div>
                    <div class="other-option item-user-img">
                        <div class="txt-user">
                            <p>{{$order->cust->nama_lengkap}}</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="content-comp p-0">
    <div class="space-items"></div>
    <section class="un-details-collectibles un-activity-page p-0">
        <div class="tab-content" id="pills-tabContent">
            <div class="content-activity">
                <div class="space-items"></div>
                <div class="unList-creatores bg-white">
                    <div class="content-list-creatores">
                        <hr class="mb-0">
                        <ul class="nav flex-column mb-0">
                            @foreach ($order->details as $detail)
                            <li class="nav-item">
                                <nav class="nav-link visited">
                                    <div class="item-user-img">
                                        <div class="txt-user">
                                            <h5>{{$detail->ticket->nama_tiket}}</h5>
                                            <p>{{$detail->jumlah}}x</p>
                                        </div>
                                    </div>
                                    <div class="other-option item-user-img py-0">
                                        <div class="txt-user py-0">
                                            <p>Rp.{{number_format($detail->ticket->harga*$detail->jumlah)}}</p>
                                        </div>
                                    </div>
                                </nav>
                            </li>
                            @endforeach
                        </ul>
                        <hr class="mt-0">
                    </div>
                </div>
                <div class="unList-creatores follow-sellers bg-white pt-0">
                    <div class="content-list-creatores">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <div class="nav-link mb-0">
                                    <div class="item-user-img py-0">
                                        <div class="txt-user">
                                            <h5>Pra Total</h5>
                                        </div>
                                    </div>
                                    <div class="other-option item-user-img">
                                        <div class="txt-user">
                                            <p>Rp. {{number_format($order->jumlah_bayar-$stgs['biaya_admin'])}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-link mt-2 mb-0">
                                    <div class="item-user-img py-0">
                                        <div class="txt-user">
                                            <h5>Biaya Admin</h5>
                                        </div>
                                    </div>
                                    <div class="other-option item-user-img">
                                        <div class="txt-user">
                                            <p>Rp. {{number_format($stgs['biaya_admin'])}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="space-sticky-footer mb-5 zindex-sticky"></div>
                <div class="footer mb-5" style="z-index: 90;">
                    <div class="content">
                        <div class="txt-user">
                            <h5>Total</h5>
                            <h6 id="total">Rp.{{$order->jumlah_bayar}}</h6>
                        </div>
                        @auth
                        <a href="javascript: void(0)" id="pay-button" data-bs-toggle="modal" data-bs-target="#mdllOtherOpen"
                            class="btn btn-bid-items visited">
                            <p>Bayar</p>
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
        </div>
    </section>
</div>


{{-- toast khusus Sukses --}}
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__center w-100">
    <div id="liveToastEight" class="toast bg-dark" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-autohide="true" data-bs-delay="5000">
        <div class="toast-body">
            <div class="icon color-green">
                <i class="ri-checkbox-circle-fill"></i>
            </div>
            <div class="content">
                <div class="display__text">
                    <p>YATTA, Sudah dibayar!</p>
                    <a href="page-edit-profile.html" class="display-link color-green">Pembayaran Sukses</a>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                <i class="ri-close-fill"></i>
            </button>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">
    <div id="midwarningtoast" class="toast bg-warning" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-autohide="true" data-bs-delay="3000">
        <div class="toast-body">
            <div class="icon color-white">
                <i class="ri-error-warning-fill"></i>
            </div>
            <div class="content">
                <div class="display__text">
                    <p class="text-white">Pembayaran Pending</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                <i class="ri-close-fill"></i>
            </button>
        </div>
    </div>
</div>


<form action="{{route('order.response')}}" id="submit_form" method="post">
    @csrf
    <input type="hidden" name="order_id" value="{{$order->id}}">
    <input type="hidden" name="json" id="json_callback">
</form>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          console.log(result);
          var toastElList = [].slice.call(document.querySelectorAll('#liveToastEight'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show());
            sendtocontroller(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
            console.log(result);
            var toastElList = [].slice.call(document.querySelectorAll('#midwarningtoast'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show());

            sendtocontroller(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
          var warningmodal1 = document.getElementById("menu-warning-2");
            warningmodal1.classList.add("menu-active");
            sendtocontroller(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          var warningmodal1 = document.getElementById("menu-warning-3");
            var toastElList = [].slice.call(document.querySelectorAll('#midwarningtoast'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show());
            warningmodal1.classList.add("menu-active");
        }
      });
      // customer will be redirected after completing payment pop-up
    });

    function sendtocontroller(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
    }
</script>



@include('layouts.footer')
