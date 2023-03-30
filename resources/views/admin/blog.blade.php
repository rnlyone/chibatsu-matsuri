@include('layouts.headersub')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>Buat Artikel disini</p>
        </div>
        <div class="un-block-right">
            <a href="{{route('ourblog.create')}}" class="icon-back visited" aria-label="iconBtn">
                <i class="ri-add-line"></i>
            </a>
        </div>
    </div>
</section>


<div class="un-blog-list bg-white py-3">
    <div class="content">
        <ul class="nav flex-column">
            @foreach ($blogs as $blog)
                <article class="nav-item">
                    <a class="nav-link" href="{{route('ourblog.edit', ['ourblog' => $blog])}}">
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
</div>

@include('layouts.footer')
