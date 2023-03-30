@include('layouts.headersub')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>Buat Tiket disini</p>
        </div>
        <div class="un-block-right">
            <a href="{{route('scan')}}" class="icon-back visited  mx-3" aria-label="iconBtn">
                <i class="ri-qr-scan-line"></i>
            </a>
            <a href="{{route('ticketing.create')}}" class="icon-back visited" aria-label="iconBtn">
                <i class="ri-add-line"></i>
            </a>
        </div>
    </div>
</section>

<div class="unList-creatores bg-white mb-3">
    <div class="content-list-creatores">
        <h6 class="title-form">Ticket Aktif</h6>
        <ul class="nav flex-column">
            @foreach ($tickets->where('visibility', true) as $ticket)
                <li class="nav-item">
                    <a class="nav-link visited" href="{{route('ticketing.show', ['ticketing' => $ticket->id])}}">
                        <div class="item-user-img">
                            <div class="txt-user">
                                <h5>{{$ticket->nama_tiket}}</h5>
                                <p>Rp. {{number_format($ticket->harga)}}</p>
                            </div>
                        </div>
                        <div class="other-option">
                            <div class="color-text rounded-pill bg-snow btn-xs-size">Detail</div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="unList-creatores bg-white mb-3">
    <div class="content-list-creatores">
        <h6 class="title-form">Ticket Tidak Aktif</h6>
        <ul class="nav flex-column">
            @foreach ($tickets->where('visibility', false) as $ticket)
                <li class="nav-item">
                    <a class="nav-link visited" href="{{route('ticketing.show', ['ticketing' => $ticket->id])}}">
                        <div class="item-user-img">
                            <div class="txt-user">
                                <h5>{{$ticket->nama_tiket}}</h5>
                                <p>Rp. {{number_format($ticket->harga)}}</p>
                            </div>
                        </div>
                        <div class="other-option">
                            <div class="color-text rounded-pill bg-snow btn-xs-size">Detail</div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>



@include('layouts.footer')
