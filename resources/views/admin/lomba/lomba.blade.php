@include('layouts.header')

<section class="un-page-components">
    <div class="un-title-default">
        <div class="text">
            <h2>{{$stgs['pagetitle']}}</h2>
            <p>Kelola Lomba disini</p>
        </div>
        <div class="un-block-right">
            <a href="{{route('ourblog.create')}}" class="icon-back visited" aria-label="iconBtn">
                <i class="ri-add-line"></i>
            </a>
        </div>
    </div>
</section>


@include('layouts.footer')
