@include('layouts.headersub')
@include('layouts.pagetitle')

<div class="un-create-collectibles un-details-collectibles bg-white">
    <form action="{{route('ourblog.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group upload-form">
            <h2>Upload Cover</h2>
            <p>Pilih foto untuk covernya</p>
            <div class="upload-input-form">
                <input name="cover" type="file" value="{{old('cover')}}">
                <div class="content-input">
                    <div class="icon"><i class="ri-upload-cloud-line"></i></div>
                    <div class="cover_img">
                        <picture>
                            <source srcset="" type="image/png" id="image-source">
                            <img src="" alt="">
                        </picture>
                    </div>
                    <span>PNG, GIF, WEBP, MP4 or MP3. Max 50mb.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input name="category" type="text" class="form-control" placeholder="e. g. &quot;Trivia&quot;" value="{{old('category')}}">
        </div>
        <div class="form-group">
            <label>Judul Artikel</label>
            <input name="title" type="text" class="form-control" placeholder="e. g. &quot;10 Kisah Nabi&quot;" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="content" class="form-control" rows="3" placeholder="e. g. &quot;After purchasing you’ll be able to get ...&quot;">{{old('content')}}</textarea>
        </div>
        <div class="space-sticky-footer mb-5 zindex-sticky"></div>
        <div class="footer footer-pages-forms mb-5" style="z-index: 90;">
            <div class="content">
                <div class="links-clear-data">
                        <a href='{{route('ourblog.index')}}' class="btn link-clear">
                            <i class="ri-close-circle-line"></i>
                            <span>Cancel</span>
                        </a>
                </div>
                <button type="submit" class="btn btn-bid-items">
                    <p>Create Slide</p>
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
