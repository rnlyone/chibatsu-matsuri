<footer class="un-bottom-navigation filter-blur">
    <div class="em_body_navigation border-0">
        <div class="item_link  {{$homenav ?? ''}}">
            <a href="{{route('welcome')}}" class="btn btn_navLink" aria-label="btnNavigation">
                <div class="icon_current">
                    <i class="ri-home-5-line"></i>
                </div>
                <div class="icon_active">
                    <i class="ri-home-5-fill"></i>
                </div>
            </a>
        </div>
        <div class="item_link {{$ticketnav ?? ''}}">
            <a href="{{route('u.ticket')}}" class="btn btn_navLink" aria-label="btnNavigation">
                <div class="icon_current">
                    <i class="ri-coupon-3-line"></i>
                </div>
                <div class="icon_active">
                    <i class="ri-coupon-3-fill"></i>
                </div>
            </a>
        </div>
        <div class="item_link {{$castnav ?? ''}}">
            <a href="{{route('u.cast')}}" class="btn btn_navLink" aria-label="btnNavigation">
                <div class="icon_current">
                    <i class="ri-base-station-line"></i>
                </div>
                <div class="icon_active">
                    <i class="ri-base-station-fill"></i>
                </div>
            </a>
        </div>
        <div class="item_link {{$lombanav ?? ''}}">
            <a href="{{route('u.lomba')}}" class="btn btn_navLink" aria-label="btnNavigation">
                <div class="icon_current">
                    <i class="ri-award-line"></i>
                </div>
                <div class="icon_active">
                    <i class="ri-award-fill"></i>
                </div>
            </a>
        </div>
        <div class="item_link {{$usernav ?? ''}}">
            <a href="{{route('u.user')}}" class="btn btn_navLink" aria-label="btnNavigation">
                <div class="icon_current">
                    <i class="ri-user-4-line"></i>
                </div>
                <div class="icon_active">
                    <i class="ri-user-4-fill"></i>
                </div>
            </a>
        </div>
    </div>
</footer>
