<div class="modal sidebarMenu -left fade" id="mdllSidebar-connected" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            @auth
            <div class="modal-header d-block pb-1">

                <!-- un-user-profile -->
                <div class="un-user-profile">
                    <div class="image_user">
                        <picture>
                            <source srcset="/storage/public/avatar/{{auth()->user()->avatar}}" type="image/png">
                            <img src="images/avatar/11.jpg" alt="image">
                        </picture>
                    </div>
                    <div class="text-user">
                        <h3>{{auth()->user()->nama_lengkap}}</h3>
                        <p>{{auth()->user()->role}}</p>
                    </div>
                </div>

                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>

                <!-- cover-balance -->
                <div class="cover-balance">
                    <div class="un-balance">
                        <div class="content-balance">
                            <div class="head-balance">
                                <h4>Order Saya</h4>
                                <a href="{{route('u.ticket')}}" class="btn link-addBalance">
                                    <i class="ri-add-fill"></i>
                                </a>
                            </div>
                            <p class="no-balance">{{auth()->user()->orders->count()}} Orders</p>
                        </div>
                    </div>
                    <a href="{{route('logout')}}" class="btn btn-sm-size bg-white text-dark rounded-pill">
                        Logout
                    </a>
                </div>
            </div>
            @endauth
            @guest
                <div class="modal-header">
                    <div class="welcome_em">
                        <h5>Yōkoso!, {{$stgs['nama_aplikasi']}} e<span>.</span></h5>
                        <p>
                            Selamat datang di Aplikasi {{$stgs['nama_aplikasi']}}
                        </p>
                        <a href="/login" class="btn btn-md-size bg-primary text-white rounded-pill">
                            login
                        </a>
                    </div>
                    <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-fill"></i>
                    </button>
                </div>
                @endguest
            <div class="modal-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{$homebar ?? ''}}" href="{{route('welcome')}}">
                            <div class="icon_current">
                                <i class="ri-home-5-line"></i>
                            </div>
                            <div class="icon_active">
                                <i class="ri-home-5-fill"></i>
                            </div>
                            <span class="title_link">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$ticketbar ?? ''}}" href="{{route('u.ticket')}}">
                            <div class="icon_current">
                                <i class="ri-coupon-3-line"></i>
                            </div>
                            <div class="icon_active">
                                <i class="ri-coupon-3-fill"></i>
                            </div>
                            <span class="title_link">Tiket</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$castbar ?? ''}}" href="{{route('u.cast')}}">
                            <div class="icon_current">
                                <i class="ri-base-station-line"></i>
                            </div>
                            <div class="icon_active">
                                <i class="ri-base-station-fill"></i>
                            </div>
                            <span class="title_link">Cast</span>

                            {{-- <div class="badge-circle">
                                <span class="doted_item"></span>
                            </div> --}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{$lombabar ?? ''}}" href="{{route('u.lomba')}}">
                            <div class="icon_current">
                                <i class="ri-award-line"></i>
                            </div>
                            <div class="icon_active">
                                <i class="ri-award-fill"></i>
                            </div>
                            <span class="title_link">Lomba</span>

                        </a>
                    </li>

                    @auth
                        @if(auth()->user()->role == "admin")
                        <label class="title__label">halaman admin</label>

                        <li class="nav-item">
                            <a class="nav-link {{$ticketbar ?? ''}}" href="{{route('ticketing.index')}}">
                                <div class="icon_current">
                                    <i class="ri-ticket-line"></i>
                                </div>
                                <div class="icon_active">
                                    <i class="ri-ticket-fill"></i>
                                </div>
                                <span class="title_link">Ticket</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{$storybar ?? ''}}" href="{{route('story.index')}}">
                                <div class="icon_current">
                                    <i class="ri-hard-drive-line"></i>
                                </div>
                                <div class="icon_active">
                                    <i class="ri-hard-drive-fill"></i>
                                </div>
                                <span class="title_link">Story</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{$lombabar ?? ''}}" href="{{route('lomba.index')}}">
                                <div class="icon_current">
                                    <i class="ri-trophy-line"></i>
                                </div>
                                <div class="icon_active">
                                    <i class="ri-trophy-fill"></i>
                                </div>
                                <span class="title_link">Lomba</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{$settingbar ?? ''}}" href="{{route('setting')}}">
                                <div class="icon_current">
                                    <i class="ri-file-info-line"></i>
                                </div>
                                <div class="icon_active">
                                    <i class="ri-file-info-fill"></i>
                                </div>
                                <span class="title_link">Other</span>
                            </a>
                        </li>
                        @endif
                    @endauth
                </ul>
            </div>
            <div class="modal-footer">
                <div class="em_darkMode_menu">
                    <label class="text" for="switchDark">
                        <h3>Dark Mode</h3>
                        <p>Browsing in night mode</p>
                    </label>
                    <label class="switch_toggle toggle_lg theme-switch" for="switchDark">
                        <input type="checkbox" class="switchDarkMode theme-switch" id="switchDark"
                            aria-describedby="switchDark">
                        <span class="handle"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===================================
START THE MODAL SIDEBAR MENU - guest
==================================== -->

