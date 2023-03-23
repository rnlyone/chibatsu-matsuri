@include('layouts.headersub')

<section class="un-details-blog">
    <div class="head">
        <div class="cover_img">
            <picture>
                <source srcset="/storage/public/coverblog/{{$article->cover}}" type="image/webp">
                <img src="/images/other/24.jpg" alt="">
            </picture>
            <div class="btn-xs-size bg-dark text-white rounded-pill position-absolute start-0 top-0 m-3">
                {{$article->category}}</div>
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
            {{!! $article->content !!}}
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
