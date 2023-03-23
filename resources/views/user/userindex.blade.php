@include('layouts.header')
<section class="un-creator-ptofile">
    <!-- head -->
    <div class="head">
        <div class="cover-image">
            <picture>
                <source srcset="images/other/profilebanner.png" type="image/png">
                <img src="" alt="cover image">
            </picture>
        </div>
        <div class="text-user-creator">
            <div class="d-flex align-items-center">
                <div class="user-img">
                    <picture>
                        <source srcset="/storage/public/avatar/{{auth()->user()->avatar}}" type="image/webp">
                        <img src="images/avatar/22.jpg" alt="creator image">
                    </picture>
                    @if (auth()->user()->role == 'admin')
                        <i class="ri-checkbox-circle-fill"></i>
                    @else

                    @endif
                </div>
                <div class="text">
                    <h3>{{auth()->user()->nama_lengkap}}</h3>
                    <p>{{auth()->user()->username}}</p>
                </div>
            </div>
            <button type="button" class="btn btn-copy-address mt-3">
                <input type="checkbox">
                <div class="icon-box">
                    <i class="ri-file-copy-2-line"></i>
                </div>
            </button>
        </div>
    </div>
    <!-- body -->
    <div class="body">
        <div class="item-followers">
            <div class="users-text">
                <p>Followed by 2,5K</p>
                <div class="img-user">
                    <picture>
                        <source srcset="images/avatar/18.webp" type="image/webp">
                        <img src="images/avatar/18.jpg" alt="image">
                    </picture>
                    <picture>
                        <source srcset="images/avatar/1.webp" type="image/webp">
                        <img src="images/avatar/1.jpg" alt="user">
                    </picture>
                    <picture>
                        <source srcset="images/avatar/12.webp" type="image/webp">
                        <img src="images/avatar/12.png" alt="image">
                    </picture>
                    <picture>
                        <source srcset="images/avatar/13.webp" type="image/webp">
                        <img src="images/avatar/13.jpg" alt="image">
                    </picture>
                    <picture>
                        <source srcset="images/avatar/4.webp" type="image/webp">
                        <img src="images/avatar/4.jpg" alt="image">
                    </picture>
                    <picture>
                        <source srcset="images/avatar/14.webp" type="image/webp">
                        <img src="images/avatar/14.jpg" alt="image">
                    </picture>

                    <a href="page-followers.html" class="link visited">+2K</a>
                </div>
            </div>
            <button type="button" class="btn btn-md-size text-white bg-primary rounded-pill">
                Follow
            </button>
        </div>
        <div class="statistics">
            <div class="text-grid">
                <h4>35</h4>
                <p>Tiket</p>
            </div>
            <div class="text-grid">
                <h4>2,3K</h4>
                <p>Likes</p>
            </div>
            <div class="text-grid">
                <h4>8.8K</h4>
                <p>Views</p>
            </div>
            <div class="text-grid">
                <h4>48</h4>
                <p>Minted</p>
            </div>

        </div>
        <div class="description">
            <p>
                Camillo lives in Vancouver, British Columbia. When he's not spending his time running around
                he is probably
                <a class="read-more visited" data-bs-toggle="modal" data-bs-target="#mdllBioDetails">Read more</a>
            </p>
        </div>
    </div>

    <div class="tab-creatore-profile">

        <ul class="nav nav-pills nav-pilled-tab w-100" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-Tiket-tab" data-bs-toggle="pill" data-bs-target="#pills-Tiket" type="button" role="tab" aria-controls="pills-Tiket" aria-selected="false">Tiket Saya</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-Lomba-tab" data-bs-toggle="pill" data-bs-target="#pills-Lomba" type="button" role="tab" aria-controls="pills-Lomba" aria-selected="true">Lomba Saya</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-Profile-tab" data-bs-toggle="pill" data-bs-target="#pills-Profile" type="button" role="tab" aria-controls="pills-Profile" aria-selected="false">Profil Saya</button>
            </li>
        </ul>

        <div class="tab-content content-custome-data" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-Tiket" role="tabpanel" aria-labelledby="pills-Tiket-tab">
                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/5.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/5.png" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Settimio Loggia</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">195</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0 visited">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/2.webp" type="image/webp">
                                <img class="img-cover" src="images/other/2.jpg" alt="image NFT">
                            </picture>
                            <div class="icon-type">
                                <i class="ri-vidicon-line"></i>
                            </div>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>The Dark Corner</h2>
                                <p>8 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">3 for sale</span>
                            </div>
                        </div>

                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>2.78 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>
                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/21.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/21.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Leda Beneventi</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox" checked="">
                                <span class="count-likes">164</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/14.webp" type="image/webp">
                                <img class="img-cover" src="images/other/14.jpg" alt="image NFT">
                            </picture>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>Galaxy on Earth</h2>
                                <p>6 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">2 for sale</span>
                            </div>
                        </div>
                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>2.40 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn effect-click btn-md-size bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>
                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/13.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/13.jpg" alt="">
                                </picture>

                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Bruce Wheless</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">95</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/27.webp" type="image/webp">
                                <img class="img-cover" src="images/other/27.jpg" alt="image NFT">
                            </picture>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>The Scary Shib</h2>
                                <p>8 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">3 for sale</span>
                            </div>
                        </div>
                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>1.27 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>
                <!-- lds-spinner -->
                <div class="loader-items">
                    <div class="lds-spinner">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active show" id="pills-Lomba" role="tabpanel" aria-labelledby="pills-Lomba-tab">

                <div class="un-myItem-list bg-white">
                    @foreach ($pendaftars as $pendaftar)
                    <a href="{{route('cust.checkout', ['uuid' => $pendaftar->uuid])}}" class="nav flex-column" style="text-decoration: none">
                        <div class="nav-link">
                            <div class="cover_img">
                                <div class="txt">
                                    <h2>#TRX-00{{$pendaftar->id}}</h2>
                                    <p>@if ($pendaftar->status_bayar == '0')
                                        Belum Bayar
                                    @elseif ($pendaftar->status_bayar == '1')
                                        Sukses
                                    @else
                                        gagals
                                    @endif</p>
                                </div>
                            </div>
                            <div class="other-side">
                                @if ($pendaftar->status_bayar == '0')
                                    <a href="#" class="out-link-warning">
                                        <i class="ri-check-line"></i>
                                    </a>
                                @elseif ($pendaftar->status_bayar == '1')
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
                @if ($pendaftars->count() == 0)
                <div class="empty-items">
                    <img class="empty-light" src="images/masihkosong.gif" alt="">
                    <img class="empty-dark" src="images/masihkosong.gif" alt="">
                    <h4>Belum Ada</h4>
                    <p>Gomen, Kamu masih belum daftar lomba apapun</p>
                </div>
                @endif
            </div>
            <div class="tab-pane fade" id="pills-Profile" role="tabpanel" aria-labelledby="pills-Profile-tab">
                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/19.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/19.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Hunter Taylor</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">297</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/21.webp" type="image/webp">
                                <img class="img-cover" src="images/other/21.jpg" alt="image NFT">
                            </picture>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>Ecstasy of the Dead</h2>
                                <p>350 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">9 for sale</span>
                            </div>
                        </div>
                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>1.79 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>

                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/18.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/18.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Craig Leach</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">195</span>
                                <i class="ri-heart-3-line"></i>

                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/6.webp" type="image/webp">
                                <img class="img-cover" src="images/other/6.jpg" alt="image NFT">
                            </picture>
                            <div class="icon-type">
                                <i class="ri-vidicon-line"></i>
                            </div>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>The Moon Boi</h2>
                                <p>14 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">2 for sale</span>
                            </div>
                        </div>

                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>2.78 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>

                    </div>
                </div>

                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/13.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/13.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Bruce Wheless</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">95</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/27.webp" type="image/webp">
                                <img class="img-cover" src="images/other/27.jpg" alt="image NFT">
                            </picture>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>The Scary Shib</h2>
                                <p>8 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">3 for sale</span>
                            </div>
                        </div>
                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>1.27 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>

                <!-- lds-spinner -->
                <div class="loader-items">
                    <div class="lds-spinner">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-Liked" role="tabpanel" aria-labelledby="pills-Liked-tab">
                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/19.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/19.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Hunter Taylor</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox" checked="">
                                <span class="count-likes">297</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/21.webp" type="image/webp">
                                <img class="img-cover" src="images/other/21.jpg" alt="image NFT">
                            </picture>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>Ecstasy of the Dead</h2>
                                <p>350 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">9 for sale</span>
                            </div>
                        </div>
                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>1.79 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>

                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/19.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/19.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Craig Leach</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox" checked="">
                                <span class="count-likes">195</span>
                                <i class="ri-heart-3-line"></i>

                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/6.webp" type="image/webp">
                                <img class="img-cover" src="images/other/6.jpg" alt="image NFT">
                            </picture>
                            <div class="icon-type">
                                <i class="ri-vidicon-line"></i>
                            </div>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>The Moon Boi</h2>
                                <p>14 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">2 for sale</span>
                            </div>
                        </div>

                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>2.78 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>

                    </div>
                </div>

                <!-- item-card-gradual -->
                <div class="item-card-gradual">
                    <div class="head-card d-flex justify-content-between align-items-center">
                        <div class="creator-name">
                            <div class="image-user">
                                <picture>
                                    <source srcset="images/avatar/13.webp" type="image/webp">
                                    <img class="img-avatar" src="images/avatar/13.jpg" alt="">
                                </picture>
                                <div class="icon">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <h3>Bruce Wheless</h3>
                        </div>
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox" checked="">
                                <span class="count-likes">95</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <a href="page-collectibles-details.html" class="body-card py-0">
                        <div class="cover-nft">
                            <picture>
                                <source srcset="images/other/27.webp" type="image/webp">
                                <img class="img-cover" src="images/other/27.jpg" alt="image NFT">
                            </picture>
                            <div class="countdown-time">
                                <span>08H 38M 16S</span>
                            </div>
                        </div>
                        <div class="title-card-nft">
                            <div class="side-one">
                                <h2>The Scary Shib</h2>
                                <p>8 Editions Minted</p>
                            </div>
                            <div class="side-other">
                                <span class="no-sales">3 for sale</span>
                            </div>
                        </div>
                    </a>
                    <div class="footer-card">
                        <div class="starting-bad">
                            <h4>1.27 ETH</h4>
                            <span>Starting Bid</span>
                        </div>
                        <button type="button" class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                            Place a bid
                        </button>
                    </div>
                </div>

                <!-- lds-spinner -->
                <div class="loader-items">
                    <div class="lds-spinner">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

@include('layouts.footer')
