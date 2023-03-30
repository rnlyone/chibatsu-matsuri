@include('layouts.app')

<body>
    <!-- ===================================
      START LODAER PAGE
    ==================================== -->
    <section class="loader-page" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- START WRAPPER -->
    <div id="wrapper">
        <!-- START CONTENT -->
        <div id="content">
            <!-- ===================================
              START THE HEADER
            ==================================== -->

            <header class="default heade-sticky">
                <div class="un-title-page go-back">
                    @if ($stgs['title'] == ': Checkout' || $stgs['title'] == ': Invoice' )
                        <a href="{{route('u.ticket')}}" class="icon visited">
                            <i class="ri-arrow-drop-left-line"></i>
                        </a>
                    @elseif ($stgs['title'] == ': Detail User')
                        <a href="{{route('user.index')}}" class="icon visited">
                            <i class="ri-arrow-drop-left-line"></i>
                        </a>
                    @elseif ($stgs['title'] == (': List User' || ': List Ticket'))
                        <a href="{{route('setting')}}" class="icon visited">
                            <i class="ri-arrow-drop-left-line"></i>
                        </a>
                    @elseif ($stgs['title'] == (': Scan Ticket'))
                        <a href="{{route('ticketing.index')}}" class="icon visited">
                            <i class="ri-arrow-drop-left-line"></i>
                        </a>
                    @else
                        <a href="javascript:history.back()" class="icon visited">
                            <i class="ri-arrow-drop-left-line"></i>
                        </a>
                    @endif
                    <h1>{{$stgs['pagetitle']}}</h1>
                </div>
                <div class="un-block-right">
                    <div class="un-notification">
                        <a href="page-activity.html" aria-label="activity">
                            <i class="ri-notification-line"></i>
                        </a>
                        <span class="bull-activity"></span>
                    </div>
                    @auth
                        <div class="un-user-profile">
                            <a href="#user" aria-label="profile">
                                <picture>
                                    <source srcset="/storage/public/avatar/{{auth()->user()->avatar}}" type="image/png">
                                    <img class="img-avatar" src="/images/avatar/11.jpg" alt="">
                                </picture>
                            </a>
                        </div>
                    @endauth
                    @guest
                    <div class="un-user-profile">
                        <div class="un-notification">
                            <a href="{{route('flogin')}}" aria-label="activity">
                                <i class="ri-user-4-line"></i>
                            </a>
                        </div>
                    </div>
                    @endguest
                    <!-- menu-sidebar -->
                    <div class="menu-sidebar">
                        <button type="button" name="sidebarMenu" aria-label="sidebarMenu" class="btn"
                            data-bs-toggle="modal" data-bs-target="#mdllSidebar-connected">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="9.3" viewBox="0 0 19 9.3">
                                <g id="Group_8081" data-name="Group 8081" transform="translate(-329 -37)">
                                    <rect id="Rectangle_3986" data-name="Rectangle 3986" width="19" height="2.3"
                                        rx="1.15" transform="translate(329 37)" fill="#222032" />
                                    <rect id="Rectangle_3987" data-name="Rectangle 3987" width="19" height="2.3"
                                        rx="1.15" transform="translate(329 44)" fill="#222032" />
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <div class="space-sticky"></div>
