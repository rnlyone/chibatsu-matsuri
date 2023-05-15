@include('layouts.header')
<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>Pilih Lomba yang akan kamu ikuti pada {{$stgs['nama_aplikasi']}}</p>
        </div>
    </div>
</section>


@auth
@if (auth()->user()->no_hp == null || auth()->user()->instansi == null)
<div class="bg-white padding-20 mt-0 mb-0 pb-0">
    <div class="alert alert-warning" role="alert">
        Kamu belum bisa mendaftar lomba, kamu perlu melengkapi informasi akun kamu,
        <a href="{{route('cust.edit')}}" class="alert-link">klik disini</a> untuk melengkapi informasi.
    </div>
</div>
@else
<div class="bg-white padding-20 mt-0 mb-0 pb-0">
    <div class="alert alert-info" role="alert">
        Kamu sudah bisa mendaftar lomba, tapi kamu hanya bisa memilih 1 lomba untuk didaftar.
    </div>
</div>
@endif
@endauth

@foreach ($lombas as $lomba)
    <div class="bg-white padding-20">
        <div class="item-card-gradual">
            <!-- <div class="head-card"></div> -->
            <a data-bs-toggle="modal" data-bs-target="#mdllCollectibles{{$lomba->id}}" class="body-card">
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
                        <button data-bs-toggle="modal" data-bs-target="#mdllCollectibles{{$lomba->id}}" type="submit" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Daftar
                        </button>
                @endauth
                @guest
                    <a href="{{route('login')}}" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                        Login
                    </a>
                @endguest

            </div>
        </div>
    </div>
@endforeach

@if($lombas->isEmpty())
<div class="empty-items">
    <img class="empty-light" src="images/masihkosong.gif" alt="">
    <img class="empty-dark" src="images/masihkosong.gif" alt="">
    <h4>Belum Ada Lomba</h4>
    <p>Gomen, Belum ada lomba yang terbuka</p>
</div>
@endif

@include('layouts.footer')

@foreach ($lombas as $lomba)
    <!-- ===================================
      START THE NFT DETAILS MODAL
    ==================================== -->
    <div class="modal -left --fullScreen modal-collectibles fade" id="mdllCollectibles{{$lomba->id}}" tabindex="-1"
        aria-labelledby="modalFilterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="">
                        <h1>{{$lomba->nama_lomba}}</h1>
                        <p>{{$lomba->level}}</p>
                    </div>
                    <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-fill"></i>
                    </button>
                </div>
                <div class="modal-body p-0">

                    <div class="un-details-collectibles">
                        <!-- head -->
                        <div class="head">
                            <div class="cover-main-img mt-0">
                                <picture>
                                    <source srcset="/storage/public/coverlomba/{{$lomba->src}}" type="image/webp">
                                    <img class="img-full" src="/storage/public/coverlomba/{{$lomba->src}}" alt="">
                                </picture>
                                <span class="btn-xs-size bg-dark text-white rounded-pill item-category">{{$lomba->terbuka_untuk}}</span>
                                <div class="action-sticky">
                                    <button type="button" class="btn btn-fullScreen">
                                        <i class="ri-fullscreen-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-share" data-bs-dismiss="model"
                                        data-bs-toggle="modal" data-bs-target="#mdllShareCollectibles">
                                        <i class="ri-share-forward-line"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="txt-price-coundown d-flex justify-content-between">
                                <div class="price">
                                    <h2>Biaya Pendaftaran</h2>
                                    <p><span class="size-16">Rp.</span>{{number_format($lomba->biaya)}}</p>
                                </div>
                                <!-- <div class="coundown">
                                <h3>Auction Ends In</h3>
                                <span>08H 38M 16S</span>
                            </div> -->
                            </div>
                        </div>
                        <!-- body -->
                        <div class="body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Deskripsi
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {!! nl2br($lomba->deskripsi) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Persyaratan
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {!! nl2br($lomba->persyaratan) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#juknisaccordion" aria-expanded="false" aria-controls="juknisaccordion">
                                            Juknis & Kelengkapan Berkas
                                        </button>
                                    </h2>
                                    <div id="juknisaccordion" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a href="{{$lomba->juknis}}">Klik Disini Untuk Mengupload Berkas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-sticky"></div>
                            <div class="space-sticky"></div>
                        <div class="modal-footer justify-content-center border-0 pt-2">
                            <div class="footer-pages-forms">
                                <div class="content">
                                    <div class="links-clear-data">
                                        <button type="button" class="btn link-clear" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">
                                            <i class="ri-close-circle-line"></i>
                                            <span>Cancel</span>
                                        </button>
                                    </div>
                                    @auth
                                    <form action="{{route('daftarlomba')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="idLomba" value="{{$lomba->id}}">
                                        <button type="submit" class="btn btn-bid-items">
                                            <p>Daftar Lomba</p>
                                            <div class="ico">
                                                <i class="ri-arrow-drop-right-line"></i>
                                            </div>
                                        </button>
                                    </form>
                                    @endauth
                                    @guest
                                    <a href="{{route('login')}}" class="btn btn-bid-items">
                                        <p>Daftar Lomba</p>
                                        <div class="ico">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
