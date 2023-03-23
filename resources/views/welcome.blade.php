@include('layouts.header')
<!-- ===================================
              START THE STORIES SECTION
            ==================================== -->
<section class="margin-t-20 margin-b-10 stories-section">
    <!-- DISPLAY STRORIES -->
    <div class="display-stories">
        <!-- SWIPER -->
        <div class="swiper myStories">
            <div class="swiper-wrapper wrapper-stories" id="stories">
                <!-- MY STORY -->
                {{-- <div class="swiper-slide space">
                    <button type="button" class="btn add-my-story" data-bs-toggle="modal"
                        data-bs-target="#mdllAddStory">
                        <div class="my_img">
                            <img src="images/avatar/11.jpg" alt="my story">
                            <div class="icon">
                                <i class="ri-add-fill"></i>
                            </div>
                        </div>
                        <div class="display-text">
                            <span>My Story</span>
                        </div>
                    </button>
                </div> --}}
                <!-- HERE -> ITEMS -> AUTOMATICALLY BY JAVASCRIPT -->
            </div>
        </div>
    </div>
</section>
<!-- ===================================
              START THE BORDER SECTIONS
            ==================================== -->
<div class="border-sections-home"></div>
<!-- ===================================
              START THE RANDOM NFTS
            ==================================== -->
<section class="margin-t-20">
    <div class="un-block-cards">
        <!-- Swiper -->
        <div class="swiper nftSwiper swiper-initialized swiper-horizontal swiper-ios swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-69f8c15c87c155eb" aria-live="polite"
                style="transform: translate3d(-1800px, 0px, 0px); transition-duration: 0ms;">
                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" role="group"
                    aria-label="1 / 4" style="width: 340px; margin-right: 20px;">
                    <!-- item-card-nft -->
                    <a href="/" class="item-card-nft">
                        <picture>
                            <source srcset="images/slides/slide1.png" type="image/webp">
                            <img class="big-image" src="images/slides/slide1.png" alt="">
                        </picture>
                    </a>
                </div>
                <div class="swiper-slide" data-swiper-slide-index="1" role="group" aria-label="2 / 4"
                    style="width: 340px; margin-right: 20px;">
                    <!-- item-card-nft -->
                    <a href="page-collectibles-details.html" class="item-card-nft">
                        <picture>
                            <source srcset="images/slides/slide2.webp" type="image/webp">
                            <img class="big-image" src="images/slides/slide2.png" alt="">
                        </picture>
                    </a>
                </div>
                @foreach ($slides as $i => $slide)
                    <div class="swiper-slide" data-swiper-slide-index="1" role="group" aria-label="{{$i+2}} / {{$slides->count()}}"
                        style="width: 340px; margin-right: 20px;">
                        <!-- item-card-nft -->
                        <a href="{{$slide->link}}" class="item-card-nft">
                            <picture>
                                <source srcset="/storage/public/slides/{{$slide->photo}}" type="image/webp">
                                <img class="big-image" src="images/slides/slide2.png" alt="">
                            </picture>
                        </a>
                    </div>
                @endforeach
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>
@if ($stgs['support'] ?? '0' == '1')
<section class="unSwiper-cards margin-t-20">
    <div class="discover-nft-random margin-t-20">
        <div class="content-NFTs-body">
            <!-- item-sm-card-NFTs -->
            <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                <div class="cover-image">
                    <picture>
                        <source srcset="images/other/30.webp" type="image/webp">
                        <img class="big-image" src="images/other/30.jpg" alt="">
                    </picture>
                    <div class="content-text">
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">14</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="user-text">
                        <div class="user-avatar">
                            <picture>
                                <source srcset="images/avatar/10.webp" type="image/webp">
                                <img class="sm-user" src="images/avatar/10.jpg" alt="">
                            </picture>
                            <span>Camillo</span>
                        </div>
                        <div class="number-eth">
                            <span class="main-price">1.50 ETH</span>
                            <span>($3,650)</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- item-sm-card-NFTs -->
            <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                <div class="cover-image">
                    <picture>
                        <source srcset="images/other/19.webp" type="image/webp">
                        <img class="big-image" src="images/other/19.jpg" alt="">
                    </picture>
                    <div class="content-text">
                        <div class="icon-type">
                            <i class="ri-vidicon-line"></i>
                        </div>

                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">0</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="user-text">
                        <div class="user-avatar">
                            <picture>
                                <source srcset="images/avatar/14.webp" type="image/webp">
                                <img class="sm-user" src="images/avatar/14.jpg" alt="">
                            </picture>
                            <span>Julian Co.</span>
                        </div>
                        <div class="number-eth">
                            <span class="main-price">1.50 ETH</span>
                            <span>($3,650)</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- item-sm-card-NFTs -->
            <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                <div class="cover-image">
                    <picture>
                        <source srcset="images/other/24.webp" type="image/webp">
                        <img class="big-image" src="images/other/24.jpg" alt="">
                    </picture>
                    <div class="content-text">
                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox" checked>
                                <span class="count-likes">42</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="user-text">
                        <div class="user-avatar">
                            <picture>
                                <source srcset="images/avatar/10.webp" type="image/webp">
                                <img class="sm-user" src="images/avatar/10.jpg" alt="">
                            </picture>
                            <span>Camillo</span>
                        </div>
                        <div class="number-eth">
                            <span class="main-price">1.50 ETH</span>
                            <span>($3,650)</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- item-sm-card-NFTs -->
            <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                <div class="cover-image">
                    <picture>
                        <source srcset="images/other/16.webp" type="image/webp">
                        <img class="big-image" src="images/other/16.jpg" alt="">
                    </picture>
                    <div class="content-text">
                        <div class="icon-type">
                            <i class="ri-vidicon-line"></i>
                        </div>

                        <div class="btn-like-click">
                            <div class="btnLike">
                                <input type="checkbox">
                                <span class="count-likes">27</span>
                                <i class="ri-heart-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="user-text">
                        <div class="user-avatar">
                            <picture>
                                <source srcset="images/avatar/14.webp" type="image/webp">
                                <img class="sm-user" src="images/avatar/14.jpg" alt="">
                            </picture>
                            <span>Julian Co.</span>
                        </div>
                        <div class="number-eth">
                            <span class="main-price">1.50 ETH</span>
                            <span>($3,650)</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endif

<section class="un-blog-list margin-t-20">
    <!-- un-title-default -->
    <div class="un-title-default">
        <div class="text">
            <h2>Update Terbaru</h2>
            <p>Lihat update informasi terbaru tentang Gakuensai 2023</p>
        </div>
        <div class="un-block-right">
            <a href="{{route('u.blog')}}" class="icon-back" aria-label="iconBtn">
                <i class="ri-arrow-drop-right-line"></i>
            </a>
        </div>
    </div>
    {{-- content --}}
    <div class="content margin-t-20">
        <ul class="nav flex-column">
            <article class="nav-item">
                <a class="nav-link visited" href="page-news-details.html">
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
                <a class="nav-link" href="page-news-details.html">
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
                <a class="nav-link" href="page-news-details.html">
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
                <a class="nav-link" href="page-news-details.html">
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
                <a class="nav-link" href="page-news-details.html">
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
                <a class="nav-link" href="page-news-details.html">
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
</div>
@include('layouts.footer')


<script>
    // BUILD ITEM
    function buildItem(id, type, length, src, preview, link, linkText, time, seen) {
        return {
            id, type, length, src, preview, link, linkText, time, seen
        };
    }

    /*==================================
    START THE STORIES [CIRCLES]
    ==================================*/
    var stories = new Zuck('stories', {
        autoFullScreen: false,  // enables fullscreen on mobile browsers
        skin: 'Snapgram',
        avatars: true,
        list: false,
        openEffect: true,
        cubeEffect: true,
        backButton: false,
        backNative: false,
        localStorage: true,
        paginationArrows: false,
        paginationArrows: true,
        stories: [
        @foreach($users as $i => $user)
            {
                id: 'user'+'{{ $i+1 }}',
                photo: '/storage/public/avatar/'+'{{ $user->avatar }}',
                name: '{{ $user->username }}',
                link: '{{ $user->link }}',
                lastUpdated: '{{ $user->lastUpdated }}',
                items: [
                    @foreach($user->stories as $j => $story)
                        buildItem('{{ $j+1 }}', '{{ $story->type }}', '{{ $story->length }}', '/storage/public/stories/'+'{{ $story->src }}', '{{ $story->preview }}', '{{ $story->link }}', '{{ $story->link_text }}', '{{ $story->created_at->timestamp }}', false)
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                ],
            },
        @endforeach
        ],
    });
</script>

