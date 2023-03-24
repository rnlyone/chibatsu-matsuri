@include('layouts.headersub')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>{{$stgs['subtitle'] ?? $stgs['pagetitle']}}</p>
        </div>
        <div class="un-block-right">
            <a href="{{route('user.create')}}" class="icon-back visited" aria-label="iconBtn">
                <i class="ri-add-line"></i>
            </a>
        </div>
    </div>
</section>

<div class="unList-creatores bg-white mb-3">
    <div class="content-list-creatores">
        <h6 class="title-form">Role Admin</h6>
        <ul class="nav flex-column">
            @foreach ($users->where('role', 'admin') as $user)
                <li class="nav-item">
                    <a class="nav-link visited" href="{{route('user.show', ['user' => $user->id])}}">
                        <div class="item-user-img">
                            <picture>
                                <source srcset="/storage/public/avatar/{{$user->avatar}}" type="image/webp">
                                <img class="avt-img" src="images/avatar/13.jpg" alt="">
                            </picture>
                            <div class="txt-user">
                                <h5>{{$user->nama_lengkap}}</h5>
                                <p>{{$user->username}}</p>
                            </div>
                        </div>
                        <div class="other-option">
                            <div class="color-text rounded-pill bg-snow btn-xs-size">Detail</div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="unList-creatores bg-white mt-3">
    <div class="content-list-creatores">
        <h6 class="title-form">Role User Biasa</h6>
        <ul class="nav flex-column">
            @foreach ($users->where('role', 'user') as $user)
                <li class="nav-item">
                    <a class="nav-link visited" href="{{route('user.show', ['user' => $user->id])}}">
                        <div class="item-user-img">
                            <picture>
                                <source srcset="/storage/public/avatar/{{$user->avatar}}" type="image/webp">
                                <img class="avt-img" src="images/avatar/13.jpg" alt="">
                            </picture>
                            <div class="txt-user">
                                <h5>{{$user->nama_lengkap}}</h5>
                                <p>{{$user->username}}</p>
                            </div>
                        </div>
                        <div class="other-option">
                            <div class="color-text rounded-pill bg-snow btn-xs-size">Detail</div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>






@include('layouts.footer')
