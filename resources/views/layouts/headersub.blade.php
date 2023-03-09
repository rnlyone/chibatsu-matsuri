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
                    <a href="javascript:history.back()" class="icon visited">
                        <i class="ri-arrow-drop-left-line"></i>
                    </a>
                    <h1>{{$stgs['pagetitle']}}</h1>
                </div>
                <div class="un-block-right">
                    <div class="un-notification">
                        <a href="page-activity.html" aria-label="activity">
                            <i class="ri-notification-line"></i>
                        </a>
                        <span class="bull-activity"></span>
                    </div>
                    <div class="un-user-profile">
                        <a href="page-my-profile.html" aria-label="profile">
                            <picture>
                                <source srcset="/images/avatar/11.webp" type="image/webp">
                                <img class="img-avatar" src="images/avatar/11.jpg" alt="">
                            </picture>
                        </a>
                    </div>
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
