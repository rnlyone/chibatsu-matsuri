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

<div class="unList-creatores bg-white">
    <div class="content-list-creatores">
        <ul class="nav flex-column">
            @foreach ($paidtix as $tix)
                <li class="nav-item">
                    <div class="nav-link visited">
                        <div class="item-user-img">
                            <picture>
                                <source srcset="/storage/public/avatar/{{$tix->orderdetail->user->avatar}}" type="image/webp">
                                <img class="avt-img" src="images/avatar/13.jpg" alt="">
                            </picture>
                            <div class="txt-user">
                                <h5>{{$tix->orderdetail->user->nama_lengkap}}</h5>
                                <p>{{$tix->orderdetail->user->username}} | No. ({{$tix->id}})</p>
                            </div>
                        </div>
                        <div class="other-option">
                            @if ($tix->status_tiket == '1')
                                <div class="rounded-pill bg-danger btn-xs-size" style="color: white">Sudah Digunakan</div>
                            @else
                                <div class="rounded-pill bg-success btn-xs-size" style="color: white">Belum Digunakan</div>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>


@include('layouts.footer')
