@include('layouts.headersub')

<section class="un-details-blog">
    <div class="head">
        <div class="cover_img">
            <picture>
                <source srcset="/images/other/24.webp" type="image/webp">
                <img src="/images/other/24.jpg" alt="">
            </picture>
            <div class="btn-xs-size bg-dark text-white rounded-pill position-absolute start-0 top-0 m-3">
                Digital
                Art</div>
        </div>
    </div>
    <div class="body">
        <div class="title-blog">
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
            <h2>The King of Crunk Lil Jon drops NFTs on Unic.</h2>
        </div>
        <div class="description">
            <p>
                Grammy Award-winning producer, DJ, and TV star Lil Jon is bringing something innovative
                to the NFT game.
            </p>
            <p>
                The four categories of available NFT’s include;
            </p>
            <p>
                <span class="weight-500 text-dark">Signature Ad-libs:</span> Two unique audio
                collections of Lil Jon’s famous
                ad-libs, 15 of each
                individually numbered NFT issued.
            </p>
            <p>
                <span class="weight-500 text-dark">Famous Catch-phrases:</span> Includes video of
                Lil Jon’s signature catch-phrases:
                YEAHH!!!
                WHAT!? OKAYYY!!!
            </p>
            <p>
                For the last decade, the words “YEAHH,” “OKAYYY,” and “WHAT!?” have been synonymous with
                Lil Jon.
            </p>
        </div>
        <div class="bok-next-prev margin-t-40 margin-b-40">
            <a href="page-news-details.html" class="prev visited">
                <span>Prev post</span>
                <div class="icon">
                    <i class="ri-arrow-left-line"></i>
                </div>
            </a>
            <a href="page-news-details.html" class="next">
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
                <h2>Other similar posts</h2>
            </div>
            <div class="un-block-right">
                <a href="page-news-list.html" class="icon-back visited" aria-label="iconBtn">
                    <i class="ri-arrow-drop-right-line"></i>
                </a>
            </div>
        </div>
        <ul class="nav flex-column">
            <article class="nav-item item-blog-list">
                <a class="nav-link" href="page-news-details.html">
                    <div class="image-blog">
                        <picture>
                            <source srcset="/images/other/31.webp" type="image/webp">
                            <img src="/images/other/31.jpg" alt="">
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
            <article class="nav-item item-blog-list">
                <a class="nav-link" href="page-news-details.html">
                    <div class="image-blog">
                        <picture>
                            <source srcset="/images/other/32.webp" type="image/webp">
                            <img src="/images/other/32.jpg" alt="">
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
            <article class="nav-item item-blog-list">
                <a class="nav-link" href="page-news-details.html">
                    <div class="image-blog">
                        <picture>
                            <source srcset="/images/other/40.webp" type="image/webp">
                            <img src="/images/other/40.jpg" alt="">
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
