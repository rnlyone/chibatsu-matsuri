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
                                <hr>
                                <div class="nav-link mt-2 mb-0">
                                    <div class="item-user-img py-0">
                                        <div class="txt-user">
                                            <h5>Total</h5>
                                        </div>
                                    </div>
                                    <div class="other-option item-user-img">
                                        <div class="txt-user">
                                            <p>Rp. {{number_format($order->jumlah_bayar)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="space-sticky-footer mb-5 zindex-sticky"></div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')

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


<form action="{{route('order.response')}}" id="submit_form" method="post">
    @csrf
    <input type="hidden" name="order_id" value="{{$order->id}}">
    <input type="hidden" name="json" id="json_callback">
</form>

