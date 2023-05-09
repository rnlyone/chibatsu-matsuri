@include('layouts.headersub')


<div class="un-create-collectibles un-details-collectibles bg-white">
    @if ($stgs['pagetitle'] != 'Edit Tiket')
        <form action="{{route('ticketing.store')}}" method="post" enctype="multipart/form-data">
    @else
        <form action="{{route('ticketing.update', ['ticketing' => $ticket->id])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
    @endif
        @csrf
        <div class="form-group">
            <label>Nama Tiket</label>
            <input name="nama_tiket" type="text" class="form-control" placeholder="e. g. &quot;Trivia&quot;" value="{{$ticket->nama_tiket ?? old('nama_tiket')}}">
        </div>
        <div class="form-group">
            <label>Deskripsi Tiket</label>
            <textarea name="deskripsi_tiket" id="" cols="30" rows="10" class="form-control">{{$ticket->deskripsi_tiket ?? old('deskripsi_tiket')}}</textarea>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="text" class="form-control" @if ($stgs['pagetitle'] == 'Edit Tiket') readonly @endif value="{{$ticket->harga ?? old('harga')}}">
        </div>
        <div class="form-group">
            <label>Harga Coret</label>
            <input name="harga_coret" type="text" class="form-control" placeholder="5000" @if ($stgs['pagetitle'] == 'Edit Tiket') readonly @endif value="{{$ticket->harga_coret ?? old('harga_coret')}}">
        </div>
        <div class="form-group">
            <label>Kuota</label>
            <input name="kuota" type="text" class="form-control" placeholder="10" value="{{$ticket->kuota ?? old('kuota')}}">
        </div>
        <div class="form-group">
            <label>Visibilitas</label>
            <select name="visibility" class="form-select form-control custom-select" aria-label="Default select example">
                @if ($stgs['pagetitle'] == 'Edit Tiket')
                <option @if ($ticket->visibility == '1') selected="" @endif value="1">Terlihat</option>
                <option @if ($ticket->visibility == '0') selected="" @endif value="0">Tidak Terlihat</option>
                @else
                <option  selected="" value="1">Terlihat</option>
                <option  value="0">Tidak Terlihat</option>
                @endif
            </select>
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
                    <p>Buat Tiket</p>
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </form>
</div>

@include('layouts.footer')
