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
            <a href="{{route('cust.edit')}}" class="btn btn-copy-address mt-3">
                <div class="icon-box">
                    <i class="ri-edit-2-line"></i>
                </div>
            </a>
        </div>
    </div>
    <!-- body -->
    <div class="body">
        {{-- <div class="item-followers">
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

        </div> --}}
        <div class="description">
            <p>
                Gakuensai adalah kegiatan yang diselenggarakan oleh Smunel Japanese Community, berupa ..
                <a class="read-more visited" data-bs-toggle="modal" data-bs-target="#mdllBioDetails">Read more</a>
            </p>
            @if (auth()->user()->no_hp == null || auth()->user()->instansi == null)
                <div class="bg-white mt-3 mb-0 pb-0">
                    <div class="alert alert-warning" role="alert">
                        Profile Kamu Belum Lengkap,
                        <a href="{{route('cust.edit')}}" class="alert-link">klik disini</a> untuk melengkapi informasi.
                    </div>
                </div>
            @endif
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
        </ul>

        <div class="tab-content content-custome-data" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-Tiket" role="tabpanel" aria-labelledby="pills-Tiket-tab">
                @php
                    foreach ($paidorders as $i => $paid) {
                        $jumlah[$paid->id] = 0;
                        foreach ($paid->details as $i => $details) {
                            $jumlah[$paid->id] = $jumlah[$paid->id] + $details->jumlah;
                        }
                    }
                @endphp
                    <div class="un-navMenu-default without-visit py-3 bg-white">
                        <ul class="nav flex-column">
                            @foreach ($paidorders as $paid)
                            <li class="nav-item">
                                <a class="nav-link visited" href="{{route('cust.ticket', ['uuid' => $paid->uuid])}}">
                                    <div class="item-content-link">
                                        <div class="icon bg-green-1 color-green">
                                            <i class="ri-ticket-line"></i>
                                        </div>
                                        <h3 class="link-title">#TRX-00{{$paid->id}}</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"> {{$jumlah[$paid->id]}} Ticket</span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @if ($paidorders->isEmpty())
                <div class="empty-items">
                    <img class="empty-light" src="images/masihkosong.gif" alt="">
                    <img class="empty-dark" src="images/masihkosong.gif" alt="">
                    <h4>Belum Ada Transaksi</h4>
                    <p>Gomen, Kamu masih belum checkout tiket apapun</p>
                </div>
                @endif
            </div>
            <div class="tab-pane fade active show" id="pills-Lomba" role="tabpanel" aria-labelledby="pills-Lomba-tab">

                <div class="un-myItem-list bg-white">
                    @foreach ($pendaftars as $pendaftar)
                    <a href="{{route('cust.mylomba', ['uuid' => $pendaftar->id])}}" class="nav flex-column" style="text-decoration: none">
                        <div class="nav-link">
                            <div class="cover_img">
                                <div class="txt">
                                    <h2>{{$pendaftar->lomba->nama_lomba}}</h2>
                                    <p>@if ($pendaftar->status_daftar == 'ditinjau')
                                        ditinjau
                                    @elseif ($pendaftar->status_daftar == 'ditolak')
                                        ditolak
                                    @else
                                        diterima
                                    @endif</p>
                                </div>
                            </div>
                            <div class="other-side">
                                @if ($pendaftar->status_daftar == 'ditinjau')
                                    <a href="#" class="out-link-warning">
                                        <i class="ri-check-line"></i>
                                    </a>
                                @elseif ($pendaftar->status_daftar == 'diterima')
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
        </div>

    </div>

</section>

<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllBioDetails" tabindex="-1" aria-labelledby="modalBioDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-socialNetworks">
                    <a href="javascript: void(0)" class="btn btn-social">
                        <img src="images/icons/facebook.svg" alt="">
                    </a>
                    <a href="javascript: void(0)" class="btn btn-social">
                        <img src="images/icons/instagram.svg" alt="">
                    </a>
                    <a href="javascript: void(0)" class="btn btn-social">
                        <img src="images/icons/twitter.svg" alt="">
                    </a>
                </div>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-upload-item">
                    <h2 class="size-16 weight-500 text-dark margin-b-10">Seputar Gakuensai</h2>
                    <p>
                        Secara etimologis, kata Gakuensai berasal dari Bahasa Jepang, dan terdiri dari dua kata, yaitu gakuen yang berarti sekolah, dan sai yang berarti festival. Secara istilah yang kami jabarkan, Gakuensai adalah kegiatan yang diselenggarakan oleh Smunel Japanese Community, berupa sebuah festival Jepang yang melibatkan siswa dalam sekolah, luar sekolah, maupun dari instansi apapun. Gakuensai akan diisi dengan banyak runtutan acara, perlombaan, penampilan, dan juga stand-stand wirausaha dari SMA Negeri 5 sendiri. Gakuensai akan menjadi lapangan pengekspresian diri oleh semua orang yang mengikutinya, dan diperuntukkan agar dapat bermanfaat di semua aspek.
                        Tujuan dari kegiatan Gakuensai adalah untuk memberikan kesempatan bagi siswa, masyarakat luar sekolah, dan instansi lain untuk berekspresi dan berkontribusi melalui berbagai kegiatan seperti perlombaan, penampilan, dan juga stand-stand wirausaha. Gakuensai juga bertujuan untuk menjadi lapangan bagi semua orang untuk berkembang dan bermanfaat dalam berbagai aspek, sehingga memperkaya hidup mereka dan memperluas wawasan dan pengalaman mereka.
                    </p>

                </div>

            </div>
            <div class="modal-footer border-0">
                <div class="env-pb"></div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
