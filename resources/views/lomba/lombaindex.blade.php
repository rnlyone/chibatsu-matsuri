@include('layouts.header')
@include('layouts.pagetitle')

@foreach ($lombas as $lomba)
    <div class="bg-white padding-20">
        <div class="item-card-gradual">
            <!-- <div class="head-card"></div> -->
            <a data-bs-toggle="modal" data-bs-target="#mdllCollectibles{{$lomba->id}}" class="body-card">
                <div class="cover-nft">
                    <picture>
                        <source srcset="images/other/{{$lomba->src}}" type="image/webp">
                        <img class="img-cover" src="images/other/{{$lomba->src}}" alt="image NFT">
                    </picture>
                </div>
                <div class="title-card-nft">
                    <div class="side-one">
                        <h2>{{$lomba->nama_lomba}}</h2>
                        <p>{{$lomba->deskripsi}}</p>
                    </div>
                    <div class="side-other">
                        <span class="no-sales"></span>
                </div>
                </div>
            </a>
            <div class="footer-card">
                <div class="starting-bad">
                    <span>Terbuka Untuk</span>
                    <h4>{{$lomba->persyaratan}}</h4>
                </div>
                <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                    Daftar
                </button>

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
                                    <source srcset="/images/other/{{$lomba->src}}" type="image/webp">
                                    <img class="img-full" src="/images/other/{{$lomba->src}}" alt="">
                                </picture>
                                <span class="btn-xs-size bg-dark text-white rounded-pill item-category">Digital
                                    Art</span>
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

                            <div class="title-card-text d-flex align-items-center justify-content-between">
                                <a href="page-creator-profile.html" class="item-profile-creator visited">
                                    <div class="wrapper-image">
                                        <picture>
                                            <source srcset="images/avatar/14.webp" type="image/webp">
                                            <img class="avt-img" src="images/avatar/14.jpg" alt="image">
                                        </picture>
                                        <div class="icon"><i class="ri-checkbox-circle-fill"></i></div>
                                    </div>
                                    <div class="txt-user">
                                        <h5>Creator</h5>
                                        <p>Shelly Villa</p>
                                    </div>
                                </a>
                                <div class="btn-like-click shape-box">
                                    <div class="btnLike">
                                        <input type="checkbox">
                                        <span class="count-likes">3,62 K</span>
                                        <div class="icon-inside">
                                            <i class="ri-heart-3-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="txt-price-coundown d-flex justify-content-between">
                                <div class="price">
                                    <h2>Starting Bid</h2>
                                    <p>2.3 <span class="size-16">ETH</span> <span class="dollar">($8,350)</span></p>
                                </div>
                                <!-- <div class="coundown">
                                <h3>Auction Ends In</h3>
                                <span>08H 38M 16S</span>
                            </div> -->
                            </div>
                        </div>
                        <!-- body -->
                        <div class="body">
                            <div class="description">
                                <p>
                                    Focus on your breath as this soothing opens and closes endlessly.
                                </p>
                            </div>
                            <ul class="nav nav-pills nav-pilled-tab" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-Owner-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Owner" type="button" role="tab"
                                        aria-controls="pills-Owner" aria-selected="true">Owner</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-History-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-History" type="button" role="tab"
                                        aria-controls="pills-History" aria-selected="false">History</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-Bids-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Bids" type="button" role="tab" aria-controls="pills-Bids"
                                        aria-selected="false">Bids</button>
                                </li>
                            </ul>

                            <div class="tab-content content-custome-data" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Info" role="tabpanel"
                                    aria-labelledby="pills-Info-tab">
                                    <ul class="nav flex-column nav-users-profile margin-t-20">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/14.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/14.jpg" alt="">
                                                        </picture>

                                                        <div class="icon"><i class="ri-checkbox-circle-fill"></i></div>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>Creator</h5>
                                                        <p>Shelly Villa</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/13.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/13.jpg" alt="">
                                                        </picture>
                                                        <div class="icon"><i class="ri-checkbox-circle-fill"></i></div>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>Owner</h5>
                                                        <p>Ausonio_Loi</p>
                                                    </div>
                                                </a>
                                                <div class="other-option">
                                                    <button type="button" class="btn btn-copy-address">
                                                        <input type="checkbox">
                                                        <span>0xe388...e162</span>
                                                        <div class="icon-box">
                                                            <i class="ri-file-copy-2-line"></i>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-Owner" role="tabpanel"
                                    aria-labelledby="pills-Owner-tab">

                                    <ul class="nav flex-column nav-users-profile margin-t-20">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/13.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/13.jpg" alt="">
                                                        </picture>
                                                        <div class="icon"><i class="ri-checkbox-circle-fill"></i></div>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>Owner</h5>
                                                        <p>Ausonio_Loi</p>
                                                    </div>
                                                </a>
                                                <div class="other-option">
                                                    <button type="button" class="btn btn-copy-address">
                                                        <input type="checkbox">
                                                        <span>0xe388...e162</span>
                                                        <div class="icon-box">
                                                            <i class="ri-file-copy-2-line"></i>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-History" role="tabpanel"
                                    aria-labelledby="pills-History-tab">
                                    <ul class="nav flex-column nav-users-profile margin-t-20">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/8.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/8.png" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>16 days ago</h5>
                                                        <p class="weight-400 size-14"><span class="color-text">Bought
                                                                by</span>
                                                            smally <span class="color-text">for</span> <span
                                                                class="color-green">
                                                                $300.00</span></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/17.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/17.jpg" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>24 days ago</h5>
                                                        <p class="weight-400 size-14">
                                                            <span class="color-text">
                                                                Bid placed by </span> Pingu
                                                            <span class="color-text">for</span> <span
                                                                class="color-green">
                                                                $150.00</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/18.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/18.jpg" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>26 days ago</h5>
                                                        <p class="weight-400 size-14">
                                                            <span class="color-text">
                                                                Bid placed by </span> Vinicius
                                                            <span class="color-text">for</span> <span
                                                                class="color-green">
                                                 2               $250.00</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-Bids" role="tabpanel"
                                    aria-labelledby="pills-Bids-tab">
                                    <ul class="nav flex-column nav-users-profile margin-t-20">

                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/12.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/12.png" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>24 days ago</h5>
                                                        <p class="weight-400 size-14">
                                                            Pingu
                                                            <span class="color-text">
                                                                bid for</span>
                                                            <span class="color-green">
                                                                $300.00</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <a href="page-creator-profile.html" class="item-user-img visited">
                                                    <div class="wrapper-image">
                                                        <picture>
                                                            <source srcset="images/avatar/7.webp" type="image/webp">
                                                            <img class="avt-img" src="images/avatar/7.jpg" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="txt-user">
                                                        <h5>24 days ago</h5>
                                                        <p class="weight-400 size-14">
                                                            Pingu
                                                            <span class="color-text">
                                                                bid for</span>
                                                            <span class="color-green">
                                                                $300.00</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
