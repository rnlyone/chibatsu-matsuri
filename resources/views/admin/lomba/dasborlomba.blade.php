@include('layouts.headersub')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>Terima, Tolak Peserta disini</p>
        </div>
    </div>
</section>

<div class="unList-creatores bg-white">
    <div class="content-list-creatores">
        <ul class="nav flex-column">
            <h6 class="title-form">Belum Diterima</h6>
            @php
                $daftarDitinjau = $lomba->daftars()->where('status_daftar', 'ditinjau')->get();
            @endphp
            @foreach ($daftarDitinjau as $daftar)
                <li class="nav-item">
                    <a data-bs-toggle="modal" data-bs-target="#mdllCollectibles{{$daftar->id}}" class="nav-link visited">
                        <div class="item-user-img">
                            <picture>
                                <source srcset="/storage/public/avatar/{{$daftar->user->avatar}}" type="image/webp">
                                <img class="avt-img" src="images/avatar/13.jpg" alt="">
                            </picture>
                            <div class="txt-user">
                                <h5>{{$daftar->user->nama_lengkap}}</h5>
                                <p>{{$daftar->user->username}} | No. ({{$daftar->id}})</p>
                            </div>
                        </div>
                        <div class="other-option">
                            @if ($daftar->status_bayar == '0')
                                <div class="rounded-pill bg-danger btn-xs-size" style="color: white">Belum Bayar</div>
                            @else
                                <div class="rounded-pill bg-success btn-xs-size" style="color: white">Sudah Bayar</div>
                            @endif
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="unList-creatores bg-white">
    <div class="content-list-creatores">
        <ul class="nav flex-column">
            <h6 class="title-form">Diterima</h6>
            @php
                $daftarDiterima = $lomba->daftars()->where('status_daftar', 'diterima')->get();
            @endphp
            @foreach ($daftarDiterima as $daftar)
                <li class="nav-item">
                    <a data-bs-toggle="modal" data-bs-target="#mdllCollectibles{{$daftar->id}}" class="nav-link visited">
                        <div class="item-user-img">
                            <picture>
                                <source srcset="/storage/public/avatar/{{$daftar->user->avatar}}" type="image/webp">
                                <img class="avt-img" src="images/avatar/13.jpg" alt="">
                            </picture>
                            <div class="txt-user">
                                <h5>{{$daftar->user->nama_lengkap}}</h5>
                                <p>{{$daftar->user->username}} | No. ({{$daftar->id}})</p>
                            </div>
                        </div>
                        <div class="other-option">
                            @if ($daftar->status_bayar == '0')
                                <div class="rounded-pill bg-danger btn-xs-size" style="color: white">Belum Bayar</div>
                            @else
                                <div class="rounded-pill bg-success btn-xs-size" style="color: white">Sudah Bayar</div>
                            @endif
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>


@include('layouts.footer')

@foreach ($lomba->daftars as $daftar)
    <!-- ===================================
      START THE NFT DETAILS MODAL
    ==================================== -->
    <div class="modal -left --fullScreen modal-collectibles fade" id="mdllCollectibles{{$daftar->id}}" tabindex="-1"
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
                    <section class="un-creator-ptofile">
                        <!-- head -->
                        <div class="head">
                            <div class="cover-image">
                                <picture>
                                    <source srcset="/images/other/profilebanner.png" type="image/png">
                                    <img src="" alt="cover image">
                                </picture>
                            </div>
                            <div class="text-user-creator">
                                <div class="d-flex align-items-center">
                                    <div class="user-img">
                                        <picture>
                                            <source srcset="/storage/public/avatar/{{$daftar->user->avatar}}" type="image/webp">
                                            <img src="images/avatar/22.jpg" alt="creator image">
                                        </picture>
                                        @if ($daftar->user->role == 'admin')
                                            <i class="ri-checkbox-circle-fill"></i>
                                        @else

                                        @endif
                                    </div>
                                    <div class="text">
                                        <h3>{{$daftar->user->nama_lengkap}}</h3>
                                        <p>{{$daftar->user->username}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="description">
                                <p><span style="font-weight: 1000">Email : </span>{{$daftar->user->email}}</p>
                                <p><span style="font-weight: 1000">Nomor Whatsapp : </span><a href="https://api.whatsapp.com/send/?phone=62{{$daftar->user->no_hp}}" target="_blank" rel="noopener noreferrer">{{$daftar->user->no_hp}}</a></p>
                                <p><span style="font-weight: 1000">Instansi : </span>{{$daftar->user->instansi}}</p>
                            </div>


                        </div>
                    </section>

                    <div class="un-create-collectibles un-details-collectibles bg-white">
                        <h6>Status Pendaftaran :
                            @if ($daftar->status_daftar == 'diterima')
                                <span class="badge bg-success">diterima</span>
                            @elseif ($daftar->status_daftar == 'ditinjau')
                                <span class="badge bg-warning">ditinjau</span>
                            @elseif ($daftar->status_daftar == 'ditolak')
                                <span class="badge bg-danger">ditolak</span>
                            @endif
                        </h6>
                        @if ($daftar->status_daftar == 'diterima')
                            <h6>Status Pembayaran :
                                @if ($daftar->status_bayar == '1')
                                    <span class="badge bg-success">Sudah</span>
                                @elseif ($daftar->status_bayar == '0')
                                    <span class="badge bg-danger">Belum</span>
                                @endif
                            </h6>
                        @endif
                        <form action="{{route('updatelombaadmin', ['id' => $daftar->id])}}" method="post" id="updateform{{$daftar->id}}">
                            @csrf
                            <input id="saveonlyinput{{$daftar->id}}" type="hidden" name="saveonly" value="0">
                            <div class="form-group">
                                <label>Id Pendaftaran</label>
                                <input name="id_daftar" @readonly(true) type="text" class="form-control" value="gf23-{{$daftar->lomba->id}}-{{$daftar->id}}">
                            </div>
                            <div class="form-group">
                                <label>Lengkapi Format Berikut <span class="badge text-black">(Jangan Dihapus)</span></label>
                                <textarea oninput="autoResizeTextarea(this)" name="catatan" class="form-control" rows="15" placeholder="Informasi tentang Pendaftaran Lomba Kamu. Kalau Kamu Tidak Sengaja Menghapus Format, Silahkan Meminta Format ke Panitia Kami">{{$daftar->catatan ?? old('catatan')}}</textarea>
                            </div>
                        </form>
                        <script>
                            // memperbesar area textarea saat user mengetik
                            function autoResizeTextarea(element) {
                                element.style.height = "auto";
                                element.style.height = (element.scrollHeight) + "px";
                            }
                        </script>

                        <form action="{{route('daftar.tolak', ['id' => $daftar->id])}}" method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menolak Pendaftaran ini?')" class="btn effect-click btn-md-size bg-warning text-white rounded-pill">
                                Tolak Pendaftaran ini
                            </button>
                        </form>

                        <form action="{{route('daftar.tinjau', ['id' => $daftar->id])}}" method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus Pendaftaran ini?')" class="btn effect-click btn-md-size bg-info text-white rounded-pill">
                                Tinjau Ulang Pendaftaran
                            </button>
                        </form>

                        <form action="{{route('daftar.destroy', ['daftar' => $daftar->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus Pendaftaran ini?')" class="btn effect-click btn-md-size bg-red text-white rounded-pill">
                                Hapus Pendaftaran ini
                            </button>
                        </form>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Deskripsi
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! nl2br($daftar->lomba->deskripsi) !!}
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
                                        {!! nl2br($daftar->lomba->persyaratan) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#juknisaccordion" aria-expanded="false" aria-controls="juknisaccordion">
                                        Juknis
                                    </button>
                                </h2>
                                <div id="juknisaccordion" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <a target="_blank" href="{{$daftar->lomba->juknis}}">Klik Disini Untuk Melihat Juknis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-sticky-footer mb-5 zindex-sticky"></div>
                        <div class="modal-footer justify-content-center border-0 pt-2">
                            <div class="footer-pages-forms">
                                <div class="content">
                                    <div class="links-clear-data">
                                        <button type="button" id="saveonly{{$daftar->id}}" class="btn link-clear" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">
                                            <span>Save Saja</span>
                                        </button>
                                    </div>
                                    @if ($daftar->status_daftar == 'ditinjau')
                                    <button type="submit" class="btn btn-bid-items" onclick="document.getElementById('updateform{{$daftar->id}}').submit()">
                                        <p>Save & Terima</p>
                                        <div class="ico">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-bid-items" onclick="document.getElementById('updateform{{$daftar->id}}').submit()">
                                        <p>Save & Terbayar</p>
                                        <div class="ico">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </button>
                                    @endif
                                    <script>
                                        document.querySelector('#saveonly{{$daftar->id}}').addEventListener('click', function() {
                                            document.querySelector('#saveonlyinput{{$daftar->id}}').value = 1;
                                            document.getElementById('updateform{{$daftar->id}}').submit()
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

