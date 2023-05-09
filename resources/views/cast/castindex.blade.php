@php
use Illuminate\Support\Facades\Auth;
@endphp
@include('layouts.header')
@include('layouts.pagetitle')

<script src="/assets/js/hls.js"></script>

<div class="content-comp p-0">

    <div class="space-items"></div>

    @if ($castlink == '0')
        <div class="discover-nft-random bg-white py-3">
            <div class="content-NFTs-body">
                <!-- item-card-nft -->
                <div class="item-card-nft">
                    <img src="/images/stream_belummulai.png" style="width: 100%;height:auto">
                </div>
            </div>
        </div>
    @else
        <div class="discover-nft-random bg-white py-3">
            <div class="content-NFTs-body">
                <!-- item-card-nft -->
                <div class="item-card-nft">
                    <video id="video" controls="" style="width: 100%;"></video>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::check())
    <div class="discover-nft-random bg-white py-3">
        <div class="content-NFTs-body">
            <div class="item-card-nft">
                <div id="tlkio" data-channel="chibatsu_matsurilivechat" data-theme="theme--night" style="width:100%;height:300%;" css="https://raw.githubusercontent.com/rnlyone/haiternakweb/master/custom.css" data-nickname="@if (Auth::check())
                {{auth()->user()->username}}
            @else
                anony
            @endif" ></div><script async src="http://tlk.io/embed.js" type="text/javascript"></script>
            </div>
        </div>
    </div>
    @endif

<script>
    var video = document.getElementById('video');
    if (Hls.isSupported()) {
      var hls = new Hls({
        "debug": true,
        "enableWorker": true,
        "lowLatencyMode": true,
        "backBufferLength": 90
        });
      hls.loadSource('{{$castlink}}');
      hls.attachMedia(video);
      hls.on(Hls.Events.MEDIA_ATTACHED, function () {
        video.muted = true;
        video.play();
      });
    }
    // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
    // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element through the `src` property.
    // This is using the built-in support of the plain video element, without using hls.js.
    else if (video.canPlayType('application/vnd.apple.mpegurl')) {
      video.src = '{{$castlink}}';
      video.addEventListener('canplay', function () {
        video.play();
      });
    }
  </script>
@include('layouts.footer')
