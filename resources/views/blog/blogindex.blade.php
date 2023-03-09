@include('layouts.headersub')

<section class="un-blog-list margin-t-20">
    <!-- un-title-default -->

    <div class="content margin-t-20">
        <ul class="nav flex-column">
            <article class="nav-item">
                <a class="nav-link visited" href="{{route('u.blog.detail')}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="images/other/1.webp" type="image/webp">
                            <img src="images/other/1.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>Trending NFTs: Lindsey Byrnes, EBABES, and more</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>2 hour ago</span>
                                </div>
                                <div class="views">
                                    <i class="ri-eye-line"></i>
                                    <span>295 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <article class="nav-item">
                <a class="nav-link" href="{{route('u.blog.detail')}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="images/other/34.webp" type="image/webp">
                            <img src="images/other/34.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>Edition365: A portrait of the year that changed everything</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>2 hour ago</span>
                                </div>
                                <div class="views">
                                    <i class="ri-eye-line"></i>
                                    <span>295 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <article class="nav-item">
                <a class="nav-link" href="{{route('u.blog.detail')}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="images/other/33.webp" type="image/webp">
                            <img src="images/other/33.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>Decentralizing NFT metadata on Unic.</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>2 hour ago</span>
                                </div>
                                <div class="views">
                                    <i class="ri-eye-line"></i>
                                    <span>295 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <article class="nav-item">
                <a class="nav-link" href="{{route('u.blog.detail')}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="images/other/31.webp" type="image/webp">
                            <img src="images/other/31.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>Four Signs a Person Is Secretly Unhappy with Their Life</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>2 hour ago</span>
                                </div>
                                <div class="views">
                                    <i class="ri-eye-line"></i>
                                    <span>295 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <article class="nav-item">
                <a class="nav-link" href="{{route('u.blog.detail')}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="images/other/32.webp" type="image/webp">
                            <img src="images/other/32.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>The biggest drop in Times Square since New Years Eve</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>2 hour ago</span>
                                </div>
                                <div class="views">
                                    <i class="ri-eye-line"></i>
                                    <span>295 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <article class="nav-item">
                <a class="nav-link" href="{{route('u.blog.detail')}}">
                    <div class="image-blog">
                        <picture>
                            <source srcset="images/other/40.webp" type="image/webp">
                            <img src="images/other/40.jpg" alt="">
                        </picture>
                        <div class="text-blog">
                            <h2>Save Thousands Of Lives Through This NFT</h2>
                            <div class="others">
                                <div class="time">
                                    <i class="ri-time-line"></i>
                                    <span>2 hour ago</span>
                                </div>
                                <div class="views">
                                    <i class="ri-eye-line"></i>
                                    <span>295 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>

        </ul>
    </div>
</section>

@include('layouts.footer')
