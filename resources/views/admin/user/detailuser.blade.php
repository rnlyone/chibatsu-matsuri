@include('layouts.headersub')
@include('layouts.pagetitle')

<section class="un-creator-ptofile">
    <!-- head -->
    <div class="head">
        <div class="cover-image d-flex align-items-center justify-content-center overlay">
            <picture>
                <source srcset="/images/other/profilebanner.png" type="image/webp">
                <img src="images/other/20.jpg" alt="cover image">
            </picture>
        </div>
        <div class="text-user-creator">
            <div class="d-flex align-items-center">
                <div class="user-img d-flex align-items-center justify-content-center position-relative">
                    <picture>
                        <source srcset="/storage/public/avatar/{{$user->avatar}}" type="image/webp">
                        <img src="images/avatar/avatar.png" alt="creator image">
                    </picture>
                    <div class="position-absolute">
                        <button id="upload-link" type="button" class="btn btn-upload-icon">
                            <input type="file">
                            <div class="icon">
                                <i class="ri-camera-line"></i>
                            </div>
                        </button>
                    </div>
                    <form action="{{ route('cust.updatepp', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="avatar" onchange="this.form.submit()" type="file" style="display: none;" id="upload-input" accept="image/*">
                    </form>
                    <script>
                        document.getElementById("upload-link").addEventListener("click", function(e) {
                          e.preventDefault();
                          document.getElementById("upload-input").click();
                        });
                      </script>
                </div>
                <div class="text">
                    <h3 class="size-15 weight-500">Upload Profile Photo</h3>
                    <p class="size-11 weight-400">We recommend a 300x300px JPG, PNG, SVG, WEBP or GIF (1MB
                        max size)
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padding-20 form-edit-profile margin-b-20">

    @if (auth()->user()->role == 'admin')
        <form action="{{route('user.update', ['user' => $user->id])}}" method="post">
    @else
        <form action="{{route('cust.update', ['id' => $user->id])}}" method="post">
    @endif
        @method('PUT')
        @csrf
        @if (auth()->user()->role == 'admin')
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-select form-control custom-select" aria-label="Default select example">
                    <option @if ($user->role == 'user') selected="" @endif value="user">User Biasa</option>
                    <option @if ($user->role == 'admin') selected="" @endif value="admin">Admin</option>
                </select>
            </div>
        @endif
        <div class="form-group">
            <label>username</label>
            <input name="username" type="text" class="form-control" placeholder="username" value="{{old('username') ?? $user->username}}" pattern="[a-z0-9_.-]+">
            <div class="size-11 color-text form-text">Username hanya dapat diisi oleh huruf, angka, titik, _ dan -</div>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="nama_lengkap" type="text" class="form-control" value="{{old('nama_lengkap') ?? $user->nama_lengkap}}" placeholder="Nama Lengkap">
            <div class="size-11 color-text form-text">Nama Lengkap yang akan tampil</div>
        </div>
        <div class="form-group">
            <label>E-Mail Address</label>
            <input name="email" type="email" class="form-control" value="{{old('email') ?? $user->email}}" placeholder="Email Aktif">
        </div>

        <div class="form-group">
            <label>Nomor Whatsapp</label>
            <input name="no_hp" type="number" class="form-control" value="{{old('no_hp') ?? $user->no_hp}}" placeholder="08******">
            <div class="size-11 color-text form-text">Nomor Whatsapp Aktif</div>
        </div>

        <div class="form-group">
            <label>Instansi</label>
            <input name="instansi" type="text" class="form-control" value="{{old('instansi') ?? $user->instansi}}" placeholder="Instansi">
            <div class="size-11 color-text form-text">Nama Sekolah, Kantor, Universitas</div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" value="{{old('password')}}" placeholder="jangan diisi ketika tidak ingin diubah" >
            <div class="size-11 color-text form-text">Password Anda</div>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input name="confirmpassword" type="password" placeholder="jangan diisi ketika tidak ingin diubah" class="form-control" value="{{old('password')}}" >
            <div class="size-11 color-text form-text">Konfirmasi Password Anda</div>
        </div>
        <div class="footer footer-pages-forms mb-5" style="z-index: 90;">
            <div class="content">
                <div class="links-clear-data">
                        <a href="{{route('user.index')}}" class="btn link-clear visited">
                            <i class="ri-close-circle-line"></i>
                            <span>Cancel</span>
                        </a>
                </div>
                <button type="submit" class="btn btn-bid-items">
                    <p>Update Profile</p>
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </form>

    @if (auth()->user()->role == 'admin')
    <form action="{{route('user.destroy', ['user' => $user->id])}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus User ini?')" class="btn effect-click btn-md-size bg-red text-white rounded-pill">
            Hapus Akun ini
        </button>
    </form>
    @endif
    <div class="space-sticky-footer mb-5 zindex-sticky"></div>


</section>

@include('layouts.footer')


<script>
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirmpassword"]');
    const form = document.querySelector('form');

    confirmPasswordInput.addEventListener('input', () => {
        if (confirmPasswordInput.value === passwordInput.value) {
            confirmPasswordInput.setCustomValidity('');
        } else {
            confirmPasswordInput.setCustomValidity('Passwords must match');
        }
    });

    form.addEventListener('submit', () => {
        if (confirmPasswordInput.value !== passwordInput.value) {
            var toastElList = [].slice.call(document.querySelectorAll('#passval'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show());
                event.preventDefault();
        }
    });
</script>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">
    <div id="passval" class="toast bg-warning" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-autohide="true" data-bs-delay="3000">
        <div class="toast-body">
            <div class="icon color-white">
                <i class="ri-error-warning-fill"></i>
            </div>
            <div class="content">
                <div class="display__text">
                    <p class="text-white">Password Harus Sama dengan Konfirmasi Password</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                <i class="ri-close-fill"></i>
            </button>
        </div>
    </div>
</div>
