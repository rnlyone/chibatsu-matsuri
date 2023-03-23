@include('layouts.headersub')

<section class="un-blog-list margin-t-20">
    <!-- un-title-default -->

    <div class="content margin-t-20">
        <ul class="nav flex-column">
            @foreach ($blogs as $blog)
            <article class="nav-item">
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
