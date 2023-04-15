@include('layouts.header')

<section class="un-page-components">
    <div class="un-title-default pb-0">
        <div class="text">
            <h2>{{$stgs['pagetitle']}} {{$daftar->lomba->nama_lomba}}</h2>
            <p>Lengkapi Informasi Berikut Untuk Dapat Mengikuti Lomba!</p>
        </div>
    </div>
    @if ($daftar->status_daftar == 'ditinjau')
        <div class="alert alert-warning m-3" role="alert">
            Silahkan Lengkapi Format, dan mohon untuk rutin mengecheck informasi pendaftaran anda.
        </div>
        <div class="alert alert-info m-3" role="alert">
            Kami Akan Mengirimkan Informasi Grup WA dan Pembayaran di Format Pendaftaran ketika Status Pendaftaran Kamu telah "Diterima"
        </div>
    @elseif($daftar->status_daftar == 'ditolak')
        <div class="alert alert-danger m-3" role="alert">
            A simple warning alert—check it out!
        </div>
    @endif
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
        <form action="{{route('updatelomba')}}" method="post" id="updateform">
            @csrf
            <div class="form-group">
                <label>Id Pendaftaran</label>
                <input name="id_daftar" @readonly(true) type="text" class="form-control" value="gf23-{{$daftar->lomba->id}}-{{$daftar->id}}" value="{{$daftar->id ?? old('id')}}">
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
        <div class="footer footer-pages-forms mb-5" style="z-index: 90;">
            <div class="content">
                @if ($daftar->status_daftar == 'diterima')
                    <a href="{{$daftar->lomba->gruplink}}" class="btn effect-click btn-md-size bg-green text-white rounded-pill">
                        Join Grup WA
                    </a>
                @else
                    <a href="https://api.whatsapp.com/send/?phone={{$stgs['contact']}}" type="button" class="btn effect-click btn-xs-size bg-info text-white rounded-pill">
                        Hubungi Panitia
                    </a>
                @endif
                <button type="submit" class="btn btn-bid-items" onclick="document.getElementById('updateform').submit()">
                    <p>Simpan</p>
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
</div>
@include('layouts.footer')
