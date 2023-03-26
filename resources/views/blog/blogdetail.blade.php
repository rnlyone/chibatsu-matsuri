@include('layouts.headersub')

<section class="un-details-blog">
    <div class="head">
        <div class="cover_img cover-main-img">
            <picture>
                <source srcset="/storage/public/coverblog/{{$article->cover}}" type="image/webp">
                <img src="/images/other/24.jpg" alt="">
            </picture>
            <div class="btn-xs-size bg-dark text-white rounded-pill position-absolute start-0 top-0 m-3">
                {{$article->category}}
            </div>
            <div class="action-sticky">
                <button type="button" class="btn btn-share" data-bs-dismiss="model" data-bs-toggle="modal" data-bs-target="#mdllShareCollectibles">
                    <i class="ri-share-forward-line"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="title-blog">
            <div class="others">
                <div class="time">
                    <i class="ri-time-line"></i>
                    <span>{{$article->created_at->diffForHumans()}}</span>
                </div>
            </div>
            <h2>{{$article->title}}</h2>
        </div>
        <div class="description">
            {!! nl2br($article->content) !!}
        </div>
        <div class="bok-next-prev margin-t-40 margin-b-40">
            @if ($other['prev'] != null)
                <a href="{{route('u.blog.detail', ['uuid' => $other['prev']])}}" class="prev">
            @else
                <a class="prev visited" @disabled(true)>
            @endif
                <span>Prev post</span>
                <div class="icon">
                    <i class="ri-arrow-left-line"></i>
                </div>
            </a>
            @if ($other['next'] != null)
                <a href="{{route('u.blog.detail', ['uuid' => $other['next']])}}" class="next">
            @else
                <a class="next visited" @disabled(true)>
            @endif
                <div class="icon">
                    <i class="ri-arrow-right-line"></i>
                </div>
                <span>Next Post</span>
            </a>
        </div>
    </div>
    <div class="footer">
        <div class="un-title-default px-0 margin-b-20">
            <div class="text">
                <h2>Artikel Terbaru</h2>
            </div>
            <div class="un-block-right">
                <a href="{{route('u.blog')}}" class="icon-back visited" aria-label="iconBtn">
                    <i class="ri-arrow-drop-right-line"></i>
                </a>
            </div>
        </div>
        <ul class="nav flex-column">
            @foreach ($latest as $blog)
            <article class="nav-item item-blog-list">
                <a class="nav-link" href="{{route('u.blog.detail', ['uuid' => $blog->uuid])}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="/storage/public/coverblog/{{$blog->cover}}" type="image/webp">
                            <img src="images/other/34.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>{{$blog->title}}</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>{{$blog->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="views">
                                    <i class="ri-file-copy-line"></i>
                                    <span>{{$blog->category}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </ul>
    </div>
</section>

@include('layouts.footer')


<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllShareCollectibles" tabindex="-1" aria-labelledby="modalShareCollectibles" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="item-shared">
                    <div class="image-items">
                        <picture>
                            <source srcset="/storage/public/coverblog/{{$article->cover}}" type="image/webp">
                            <img class="user-img" src="images/other/1.jpg" alt="">
                        </picture>
                    </div>
                    <div class="txt">
                        <h1>{{$article->title}}</h1>
                        <p>{{$article->category}}</p>
                    </div>
                </div>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-share-socials">

                    <div class="un-navMenu-default p-0">

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <button type="button" class="btn nav-link bg-snow " onclick="copyToClipboard('{{ url()->current() }}')" data-bs-dismiss="modal" aria-label="Close">
                                    <div class="item-content-link">
                                        <h3 class="link-title">Copy</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-file-copy-2-line"></i>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>

                        <div class="sub-title-pkg">
                            <h2>Social Networks</h2>
                        </div>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link facebook" href="intent://{{ request()->getHost() }}{{ request()->getPathInfo() }}#Intent;scheme=http;package=com.facebook.katana;end">
                                    <div class="item-content-link">
                                        <div class="icon-svg">
                                            <img src="/images/icons/facebook.svg" alt="">
                                        </div>
                                        <h3 class="link-title">Facebook</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link twitter" href="intent://{{ request()->getHost() }}{{ request()->getPathInfo() }}#Intent;scheme=http;package=com.twitter.android;end">
                                    <div class="item-content-link">
                                        <div class="icon-svg">
                                            <img src="/images/icons/twitter.svg" alt="">
                                        </div>
                                        <h3 class="link-title">Twitter</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link instrgrame" href="intent://{{ request()->getHost() }}{{ request()->getPathInfo() }}#Intent;scheme=http;package=com.instagram.android;end">
                                    <div class="item-content-link">
                                        <div class="icon-svg">
                                            <img src="/images/icons/instagram.svg" alt="">
                                        </div>
                                        <h3 class="link-title">Instagram</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link whatsapp" href="intent://{{ request()->getHost() }}{{ request()->getPathInfo() }}#Intent;scheme=http;package=com.whatsapp;end">
                                    <div class="item-content-link">
                                        <div class="icon-svg">
                                            <img src="/images/icons/whatsapp.svg" alt="">
                                        </div>
                                        <h3 class="link-title">WhatsApp</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <div class="modal-footer border-0">
                <div class="env-pb"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
    // Create a temporary input element
    var input = document.createElement('input');
    input.setAttribute('value', text);
    document.body.appendChild(input);

    // Select the text in the input element
    input.select();
    input.setSelectionRange(0, 99999);

    // Copy the selected text to clipboard
    document.execCommand('copy');

    // Remove the temporary input element
    document.body.removeChild(input);

    var toastElList = [].slice.call(document.querySelectorAll('#passval'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show());
                event.preventDefault();
}
</script>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">
    <div id="passval" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-autohide="true" data-bs-delay="3000">
        <div class="toast-body">
            <div class="icon color-white">
                <i class="ri-error-success-fill"></i>
            </div>
            <div class="content">
                <div class="display__text">
                    <p class="text-white">Link Telah Dicopy</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                <i class="ri-close-fill"></i>
            </button>
        </div>
    </div>
</div>


<script>
    // Meload API IFrame Player
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // Membuat objek player
    var players = [];
    function onYouTubeIframeAPIReady() {
    var ytPlayers = document.getElementsByClassName('yt-player');
    for (var i = 0; i < ytPlayers.length; i++) {
        var player = new YT.Player(ytPlayers[i], {
        height: '200',
        width: '100%',
        videoId: getVideoIdFromUrl(ytPlayers[i].getAttribute('data-tag-src'))
        });
        players.push(player);
    }
    }

    function getVideoIdFromUrl(url) {
    // Mendapatkan ID video dari URL YouTube
    var videoId = '';
    if (url.indexOf('youtube.com/embed/') != -1) {
        videoId = url.split('youtube.com/embed/')[1];
    } else if (url.indexOf('youtu.be/') != -1) {
        videoId = url.split('youtu.be/')[1];
    }
    return videoId;
    }

    </script>
