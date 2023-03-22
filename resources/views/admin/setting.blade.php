@include('layouts.header')
@include('layouts.pagetitle')

<div class="un-navMenu-default without-visit py-3 bg-white">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link visited" href="{{route('slide.index')}}">
                <div class="item-content-link">
                    <div class="icon bg-green-1 color-green">
                        <i class="ri-wallet-line"></i>
                    </div>
                    <h3 class="link-title">Slide Setting</h3>
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
            <a class="nav-link visited" href="page-edit-profile.html">
                <div class="item-content-link">
                    <div class="icon bg-orange-1 color-orange">
                        <i class="ri-user-3-line"></i>
                    </div>
                    <h3 class="link-title">Edit Profile</h3>
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
            <a class="nav-link visited" href="page-my-item.html">
                <div class="item-content-link">
                    <div class="icon bg-blue-1 color-blue">
                        <i class="ri-landscape-line"></i>
                    </div>
                    <h3 class="link-title">My Items</h3>
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
            <a class="nav-link visited" href="page-news-list.html">
                <div class="item-content-link">
                    <div class="icon bg-pink-1 color-pink">
                        <i class="ri-file-list-2-line"></i>
                    </div>
                    <h3 class="link-title">News List</h3>
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

@include('layouts.footer')
