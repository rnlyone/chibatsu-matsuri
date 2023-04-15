@include('layouts.headersub')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>{{$stgs['subtitle'] ?? $stgs['pagetitle']}}</p>
        </div>
        @if ($stgs['title'] == ': Edit Lomba')
            <div class="un-block-right">
                <form action="{{ route('lomba.destroy', ['lomba' => $lomba->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus Lomba ini?')" class="icon-back visited" aria-label="iconBtn">
                        <i class="ri-close-line"></i>
                    </button>
                </form>
            </div>
        @endif

    </div>

</section>


<div class="un-create-collectibles un-details-collectibles bg-white">
    @if ($stgs['title'] != ': Edit Lomba')
        <form action="{{route('lomba.store')}}" method="post" enctype="multipart/form-data">
    @else
        <form action="{{route('lomba.update', ['lomba' => $lomba->id])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
    @endif
        @csrf
        <div class="form-group upload-form">
            <h2>Upload Cover</h2>
            <p>Pilih foto untuk covernya</p>
            <div class="upload-input-form">
                <input name="src" type="file" value="{{old('src')}}">
                <div class="content-input">
                    <div class="icon"><i class="ri-upload-cloud-line"></i></div>
                    <div class="cover_img">
                        <picture>
                            <source srcset="" type="image/png" id="image-source">
                            <img src="/storage/public/coverlomba/{{$lomba->src ?? ''}}" alt="">
                        </picture>
                    </div>
                    <span>PNG, GIF, WEBP, MP4 or MP3. Max 50mb.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Nama Lomba</label>
            <input name="nama_lomba" type="text" class="form-control" value="{{$lomba->nama_lomba ?? old('nama_lomba')}}">
        </div>
        <div class="form-group">
            <label>Kuota</label>
            <input name="kuota" type="text" class="form-control" value="{{$lomba->kuota ?? old('kuota')}}">
        </div>
        <div class="form-group">
            <label>Deskripsi Pendek</label>
            <input name="sinopsis" type="text" class="form-control" value="{{$lomba->sinopsis ?? old('sinopsis')}}">
        </div>
        <div class="form-group">
            <label>Deskripsi Panjang</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{$lomba->deskripsi ?? old('deskripsi')}}</textarea>
        </div>
        <div class="form-group">
            <label>Persyaratan</label>
            <textarea name="persyaratan" class="form-control" rows="3">{{$lomba->persyaratan ?? old('persyaratan')}}</textarea>
        </div>
        <div class="form-group">
            <label>Biaya Pendaftaran</label>
            <input name="biaya" type="text" class="form-control" value="{{$lomba->biaya ?? old('biaya')}}">
        </div>
        <div class="form-group">
            <label>Level Tingkat Lomba</label>
            <input name="level" type="text" class="form-control" value="{{$lomba->level ?? old('level')}}">
        </div>
        <div class="form-group">
            <label>Terbuka Untuk</label>
            <input name="terbuka_untuk" type="text" class="form-control" value="{{$lomba->terbuka_untuk ?? old('terbuka_untuk')}}">
        </div>
        <div class="form-group">
            <label>Link Juknis</label>
            <input name="juknis" type="text" class="form-control" value="{{$lomba->juknis ?? old('juknis')}}">
        </div>
        <div class="form-group">
            <label>Link Grup WA</label>
            <input name="gruplink" type="text" class="form-control" value="{{$lomba->gruplink ?? old('gruplink')}}">
        </div>
        <div class="form-group">
            <label>Visibilitas</label>
            @if ($stgs['title'] == ': Edit Lomba')
                <select name="visibilitas" class="form-select form-control custom-select" aria-label="Default select example">
                    <option value="0" @if ($lomba->visibilitas == 0) selected @endif>Tidak Terlihat</option>
                    <option value="1" @if ($lomba->visibilitas == 1) selected @endif>Terlihat</option>
                </select>
            @else
                <select name="visibilitas" class="form-select form-control custom-select" aria-label="Default select example">
                    <option value="0">Tidak Terlihat</option>
                    <option value="1">Terlihat</option>
                </select>
            @endif
        </div>
        <div class="form-group">
            <label>Format</label>
            <textarea oninput="autoResizeTextarea(this)" name="catatan" class="form-control" rows="15" placeholder="Informasi tentang Pendaftaran Lomba Kamu. Kalau Kamu Tidak Sengaja Menghapus Format, Silahkan Meminta Format ke Panitia Kami">{{$lomba->catatan ?? old('catatan')}}</textarea>
        </div>
        <div class="space-sticky-footer mb-5 zindex-sticky"></div>
        <div class="footer footer-pages-forms mb-5" style="z-index: 90;">
            <div class="content">
                <div class="links-clear-data">
                        <a href='{{route('lomba.index')}}' class="btn link-clear">
                            <i class="ri-close-circle-line"></i>
                            <span>Cancel</span>
                        </a>
                </div>
                <button type="submit" class="btn btn-bid-items">
                    @if ($stgs['title'] == ': Edit Lomba')
                        <p>Edit Lomba</p>
                    @else
                        <p>Buat Lomba</p>
                    @endif
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </form>
</div>

@include('layouts.footer')

<script>
    // Mendapatkan element input file
    var input = document.querySelector('input[type="file"]');

    // Menambahkan event listener ketika file diupload
    input.addEventListener('change', function() {
        // Mendapatkan nama file yang diupload
        var filename = input.files[0].name;

        // Mendapatkan element span untuk menampilkan nama file
        var span = document.querySelector('.content-input span');

        // Mendapatkan element source untuk menampilkan gambar
        var source = document.querySelector('#image-source');

        // Menampilkan nama file pada span
        span.textContent = filename;

        // Mendapatkan file yang diupload
        var file = input.files[0];

        // Membuat objek URL untuk preview gambar
        var url = URL.createObjectURL(file);

        // Mengubah srcset pada tag source
        source.srcset = url +  " 2000w";

        const imageSource = document.getElementById("image-source");
        imageSource.sizes = "(max-width: " + window.innerWidth + "px) 100vw, " + window.innerWidth + "px";
    });

</script>
