@include('layouts.header')

<section class="account-section padding-20">
    <div class="display-title">
        @if (Session::get('pesantix') == null)
            <h1>Irasshaimase!! 😆</h1>
        @endif
        <p>Masuk dengan akun Chibatsu Matsuri kamu disini</p>
    </div>
    <div class="connect-with-apps">
        <a href="{{route('auth.google')}}" class="google">
            <img src="images/icons/google.svg" alt="google">
        </a>
        <a href="{{ route('auth.facebook') }}" class="facebook">
            <i class="ri-facebook-circle-fill"></i>
        </a>
    </div>
    <div class="dividar_or">
        <span>or</span>
    </div>
    <div class="content__form margin-t-24">
        <form id="loginform" action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-group icon-left">
                <label>Email Address</label>
                <div class="input_group">
                    <input name="email" type="email" class="form-control" placeholder="e. g. &quot;example@mail.com&quot;"
                        required="">
                    <div class="icon">
                        <i class="ri-mail-open-line"></i>
                    </div>
                </div>
            </div>
            <div class="form-group icon-left">
                <label>Password</label>
                <div class="input_group">
                    <input name="password" type="password" class="form-control" placeholder="e. g. &quot;John$99*04&quot;" required="">
                    <div class="icon">
                        <i class="ri-lock-password-line"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<footer class="footer-account">
    <div class="env-pb">
        <div class="display-actions">
            <a href="#" onclick="document.getElementById('loginform').submit()" class="btn btn-sm-arrow bg-primary visited">
                <p>Sign In</p>
                <div class="ico">
                    <i class="ri-arrow-drop-right-line"></i>
                </div>
            </a>
        </div>
        <div class="support">
            <p>Need help? <a href="page-help.html" class="visited">Contact our support team</a></p>
        </div>
    </div>
</footer>

@include('layouts.footer')
