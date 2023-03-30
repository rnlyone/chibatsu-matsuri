@include('layouts.headersub')


<div class="un-create-collectibles un-details-collectibles bg-white">
    @if ($stgs['title'] != ': Edit Ticket')
        <form action="{{route('ticketing.store')}}" method="post" enctype="multipart/form-data">
    @else
        <form action="{{route('ticketing.update', ['ticketing' => $tix->id])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
    @endif
        @csrf
        <div class="form-group">
            <label>Nama Tiket</label>
            <input name="nama_tiket" type="text" class="form-control" placeholder="e. g. &quot;Trivia&quot;" value="{{$article->category ?? old('category')}}">
        </div>
        <div class="form-group">
            <label>Judul Artikel</label>
            <input name="deskripsi_tiket" type="text" class="form-control" placeholder="e. g. &quot;10 Kisah Nabi&quot;" value="{{$article->title ?? old('title')}}">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="text" class="form-control" placeholder="e. g. &quot;10 Kisah Nabi&quot;" value="{{$article->title ?? old('title')}}">
        </div>
        <div class="form-group">
            <label>Harga Coret</label>
            <input name="harga_coret" type="text" class="form-control" placeholder="e. g. &quot;10 Kisah Nabi&quot;" value="{{$article->title ?? old('title')}}">
        </div>
        <div class="form-group">
            <label>Kuota</label>
            <input name="kuota" type="text" class="form-control" placeholder="e. g. &quot;10 Kisah Nabi&quot;" value="{{$article->title ?? old('title')}}">
        </div>

        <div class="space-sticky-footer mb-5 zindex-sticky"></div>
        <div class="footer footer-pages-forms mb-5" style="z-index: 90;">
            <div class="content">
                <div class="links-clear-data">
                        <a href='{{route('ourblog.index')}}' class="btn link-clear">
                            <i class="ri-close-circle-line"></i>
                            <span>Cancel</span>
                        </a>
                </div>
                <button type="submit" class="btn btn-bid-items">
                    <p>Buat Artikel</p>
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </form>
</div>

@include('layouts.footer')
