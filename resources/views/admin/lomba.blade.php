@include('layouts.header')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>Kelola Lomba disini</p>
        </div>
        <div class="un-block-right">
            <a href="{{route('lomba.create')}}" class="icon-back visited" aria-label="iconBtn">
                <i class="ri-add-line"></i>
            </a>
        </div>
    </div>
</section>

@foreach ($lombas as $lomba)
    <div class="bg-white padding-20">
        <div class="item-card-gradual">
            <!-- <div class="head-card"></div> -->
            <a href="{{route('lomba.show', ['lomba' => $lomba->id])}}" class="body-card">
                <div class="cover-nft">
                    <picture>
                        <source srcset="/storage/public/coverlomba/{{$lomba->src}}" type="image/webp">
                        <img class="img-cover" src="/storage/public/coverlomba/{{$lomba->src}}" alt="image NFT">
                    </picture>
                </div>
                <div class="title-card-nft">
                    <div class="side-one">
                        <h2>{{$lomba->nama_lomba}}</h2>
                        <p>{{$lomba->level}}</p>
                    </div>
                    <div class="side-other">
                        <span class="no-sales"></span>
                </div>
                </div>
            </a>
            <div class="footer-card">
                <div class="starting-bad">
                    <span>Terbuka Untuk</span>
                    <h4>{{$lomba->terbuka_untuk}}</h4>
                </div>
                @auth
                        <a href="{{route('lomba.edit', ['lomba' => $lomba->id])}}" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Edit
                        </a>
                @endauth

            </div>
        </div>
    </div>
@endforeach


@include('layouts.footer')
