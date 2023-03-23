@include('layouts.headersub')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}} (#TRX-00{{$order->id}})</h2>
            <p>Scan Tiketmu dan Masuk ke Eventnya!</p>
        </div>
    </div>
</section>


@foreach ($order->details as $details)
    <div class="accordion padding-x-20 --active" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#details14324{{$details->id}}59853" aria-expanded="false" aria-controls="#details14324{{$details->id}}59853">
                    {{$details->ticket->nama_tiket}}
                </button>
            </h2>
            <div id="details14324{{$details->id}}59853" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body un-my-account">
                    @foreach ($details->paidtixes as $tix)
                        <hr>
                        <div class="body p-0">
                            @if ($tix->status_tiket == 0)
                                <span class="badge bg-green mb-3">Belum digunakan</span>
                            @else
                                <span class="badge bg-danger mb-3">Sudah digunakan</span>
                            @endif
                            <div class="img-qr">
                                <picture>
                                    <source srcset="https://api.qrserver.com/v1/create-qr-code/?size=1500x750&data={{$tix->token}}" type="image/webp">
                                    <img src="images/other/eth.png" alt="">
                                </picture>
                            </div>
                            <div class="my-balance-text">
                                <h2>tix-id-{{$tix->id}}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endforeach

@include('layouts.footer')
