@include('layouts.headersub')
@include('layouts.pagetitle')

<section class="padding-20 form-edit-profile">

    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group upload-form">
            <h6>Upload Avatar</h6>
            <p>Pilih foto untuk Avatarnya</p>
            <div class="upload-input-form">
                <input name="avatar" type="file" value="{{old('avatar')}}">
                <div class="content-input">
                    <div class="icon"><i class="ri-upload-cloud-line"></i></div>
                    <div class="cover_img">
                        <picture>
                            <source srcset="" type="image/png" id="image-source">
                            <img src="" alt="">
                        </picture>
                    </div>
                    <span>PNG Max 50mb.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-select form-control custom-select" aria-label="Default select example">
                <option value="user">User Biasa</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label>username</label>
            <input name="username" type="text" class="form-control" placeholder="username" value="{{old('username')}}" pattern="[a-z0-9_.-]+">
            <div class="size-11 color-text form-text">Username hanya dapat diisi oleh huruf, angka, titik, _ dan -</div>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="nama_lengkap" type="text" class="form-control" value="{{old('nama_lengkap')}}" placeholder="Nama Lengkap">
            <div class="size-11 color-text form-text">Nama Lengkap yang akan tampil</div>
        </div>
        <div class="form-group">
            <label>E-Mail Address</label>
            <input name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="Email Aktif">
        </div>

        <div class="form-group">
            <label>Nomor Whatsapp</label>
            <input name="no_hp" type="number" class="form-control" value="{{old('no_hp')}}" placeholder="08******">
            <div class="size-11 color-text form-text">Nomor Whatsapp Aktif</div>
        </div>

        <div class="form-group">
            <label>Instansi</label>
            <input name="instansi" type="text" class="form-control" value="{{old('instansi')}}" placeholder="Instansi">
            <div class="size-11 color-text form-text">Nama Sekolah, Kantor, Universitas</div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" value="{{old('password')}}" >
            <div class="size-11 color-text form-text">Password Anda</div>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input name="confirmpassword" type="password" class="form-control" value="{{old('password')}}" >
            <div class="size-11 color-text form-text">Password Anda</div>
        </div>
        <div class="space-sticky-footer mb-5 zindex-sticky"></div>
        <div class="footer footer-pages-forms mb-5" style="z-index: 90;">
            <div class="content">
                <div class="links-clear-data">
                        <a href="{{route('user.index')}}" class="btn link-clear visited">
                            <i class="ri-close-circle-line"></i>
                            <span>Cancel</span>
                        </a>
                </div>
                <button type="submit" class="btn btn-bid-items">
                    <p>Buat Akun</p>
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </form>

</section>

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
