@include('layouts.header')
@include('layouts.pagetitle')

<section class="stories-list-page">
    <!-- DISPLAY STRORIES -->
    <div class="display-stories">
        <h3 class="name_list">add status</h3>
        <button type="button" class="btn add-my-story" data-bs-toggle="modal" data-bs-target="#mdllAddStory">
            <div class="my_img">
                <img src="/storage/avatar/{{auth()->user()->avatar}}" alt="my story">
                <div class="icon">
                    <i class="ri-add-fill"></i>
                </div>
            </div>
            <div class="display-text">
                <h4>My Story</h4>
                <span>Add to my stories</span>
            </div>
        </button>
</section>

<div class="un-myItem-list bg-white">
    @foreach ($mystories as $i => $story)
    <nav id="story-{{$story->id}}" class="nav flex-column">
        <div class="nav-link">
            <div class="cover_img">
                <picture>
                    <source srcset="/storage/stories/{{$story->src}}" type="image/png">
                    <img src="images/other/11.jpg" alt="">
                </picture>
                <div class="txt">
                    <h2>My Story {{$i+1}} ({{$story->id}})</h2>
                    <p>{{$story->timestamp}}</p>
                </div>
            </div>
            <div class="other-side">
                <a  data-story-id="{{$story->id}}" class="delete-story out-link-danger visited">
                    <i class="ri-delete-bin-5-line"></i>
                </a>
            </div>
        </div>
    </nav>
    @endforeach
</div>


    <!-- ===================================
      START THE CREATE STORY MODAL
    ==================================== -->
    <div class="modal sidebarMenu -left --fullScreen modal-filter fade" id="mdllAddStory" tabindex="-1"
        aria-labelledby="sidebarMenuLabel3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="create-story-form" action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h1 class="title-modal">Buat Story</h1>
                            <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ri-close-fill"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="un-create-collectibles bg-white p-0">
                                <div class="form-group upload-form">
                                    <h2>Upload file</h2>
                                    <p>Choose your file to upload</p>
                                    <div class="upload-input-form">
                                        <input type="file" name="src" id="file">
                                        <div class="content-input">
                                            <div class="icon"><i class="ri-upload-cloud-line"></i></div>
                                            <div class="cover_img">
                                                <picture>
                                                    <source srcset="" type="image/png" id="image-source">
                                                    <img src="" alt="">
                                                </picture>
                                            </div>
                                            <span>PNG, GIF, JPG, MP4 . Max 5 mb.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group icon-right">
                                    <label>Tambahkan Link</label>
                                    <div class="input_group">
                                        <input name="link" type="url" class="form-control" placeholder='e. g. "www.example.com"'>
                                        <div class="icon">
                                            <i class="ri-link"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Link Text</label>
                                    <div class="inpust_group">
                                        <input name="link_text" type="text" class="form-control" placeholder='e. g. "INSTALL APP"'>
                                    </div>
                                </div>
                            </div>
                            <div class="space-sticky"></div>
                            <div class="space-sticky"></div>
                        </div>
                        <div class="modal-footer justify-content-center border-0 pt-2">
                            <div class="footer-pages-forms">
                                <div class="content">
                                    <div class="links-clear-data">
                                        <button type="button" class="btn link-clear" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">
                                            <i class="ri-close-circle-line"></i>
                                            <span>Cancel</span>
                                        </button>
                                    </div>
                                    <button type="submit" class="btn btn-bid-items">
                                        <p>Create Story</p>
                                        <div class="ico">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllOtherOpen" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0"></div>
                <div class="modal-body pt-0">
                    <div class="content-alert-actions">
                        <div class="margin-b-20">
                            <h2>
                                Yakin Ingin Menghapus Story?
                            </h2>
                        </div>

                        <div class="action-links">
                            <button type="button" class="btn border color-text rounded-pill margin-r-20" data-bs-dismiss="modal">Lihat Kembali</button>
                            <a href="javascript: void(0)"  class="btn bg-primary text-white rounded-pill">Hapus</a>
                        </div>

                    </div>

                </div>
                <div class="modal-footer border-0">
                    <div class="env-pb"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- script backup no story-001 --}}
    <script>
        var input=document.querySelector('input[type="file"]');input.addEventListener("change",(function(){var e=input.files[0].name,t=document.querySelector(".content-input span"),n=document.querySelector("#image-source");t.textContent=e;var i=input.files[0],r=URL.createObjectURL(i);n.srcset=r+" 2000w";document.getElementById("image-source").sizes="(max-width: "+window.innerWidth+"px) 100vw, "+window.innerWidth+"px"}));
    </script>

    {{-- script backup no story-002 --}}
    <script>
        $(".delete-story").on("click",(function(){const t=$(this).data("story-id"),e=$('meta[name="csrf-token"]').attr("content");$("#mdllOtherOpen").modal("show"),$("#mdllOtherOpen .bg-primary").on("click",(function(){$.ajax({url:"/story/"+t,method:"DELETE",data:{_token:e},success:function(e){if("success"===e.status){$("#mdllOtherOpen").modal("hide"),$("#story-"+t).remove();let e='\n                                <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">\n                                    <div id="liveToastFive" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true"\n                                        data-bs-autohide="true" data-bs-delay="3000">\n                                        <div class="toast-body">\n                                            <div class="icon color-white">\n                                                <i class="ri-checkbox-circle-fill"></i>\n                                            </div>\n                                            <div class="content">\n                                                <div class="display__text">\n                                                    <p class="text-white">Story has been deleted successfully.</p>\n                                                </div>\n                                            </div>\n                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">\n                                                <i class="ri-close-fill"></i>\n                                            </button>\n                                        </div>\n                                    </div>\n                                </div>\n                            ';$("body").append(e),$(".toast").toast("show")}else console.log(e),alert("Failed to delete story")},error:function(){}})}))}));
        function deletestory(id) {
            const t=id,e=$('meta[name="csrf-token"]').attr("content");$("#mdllOtherOpen").modal("show"),$("#mdllOtherOpen .bg-primary").on("click",(function(){$.ajax({url:"/story/"+t,method:"DELETE",data:{_token:e},success:function(e){if("success"===e.status){$("#mdllOtherOpen").modal("hide"),$("#story-"+t).remove();let e='\n                                <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">\n                                    <div id="liveToastFive" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true"\n                                        data-bs-autohide="true" data-bs-delay="3000">\n                                        <div class="toast-body">\n                                            <div class="icon color-white">\n                                                <i class="ri-checkbox-circle-fill"></i>\n                                            </div>\n                                            <div class="content">\n                                                <div class="display__text">\n                                                    <p class="text-white">Story has been deleted successfully.</p>\n                                                </div>\n                                            </div>\n                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">\n                                                <i class="ri-close-fill"></i>\n                                            </button>\n                                        </div>\n                                    </div>\n                                </div>\n                            ';$("body").append(e),$(".toast").toast("show")}else console.log(e),alert("Failed to delete story")},error:function(){}})}))
        }
    </script>

    <script>
        $(document).ready(function() {
        // mendapatkan formulir story
        var storyForm = $('#create-story-form');

        // menambahkan event submit pada formulir story
        storyForm.submit(function(event) {
            event.preventDefault(); // mencegah halaman di-refresh saat formulir disubmit

            // mendapatkan data formulir
            var formData = new FormData(this);

            var form = document.getElementById('create-story-form');

            // Melakukan request AJAX untuk menyimpan story
            $.ajax({
            url: storyForm.attr('action'), // URL dari action pada formulir
            method: storyForm.attr('method'), // method dari formulir
            data: formData, // data formulir yang akan dikirim
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                // jika sukses, tambahkan elemen baru
                var i = $('.nav-link').length;
                var story = response.story;
                var html = '<div id="story-'+story.id+'" class="nav-link">' +
                    '<div class="cover_img">' +
                    '<picture>' +
                    '<source srcset="/storage/stories/' + story.src + '" type="image/png">' +
                    '<img src="images/other/11.jpg" alt="">' +
                    '</picture>' +
                    '<div class="txt">' +
                    '<h2>My Story ' + (i + 1) + ' (' + story.id + ')</h2>' +
                    '</div>' +
                    '</div>' +
                    '<div class="other-side">' +
                    '<a onclick="deletestory('+story.id+')" data-story-id="' + story.id + '" class="delete-story out-link-danger visited">' +
                    '<i class="ri-delete-bin-5-line"></i>' +
                    '</a>' +
                    '</div>' +
                    '</div>';

                // Jika penyimpanan berhasil, tampilkan pesan sukses dan tutup modal
                let toast = `
                    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">
                    <div id="liveToastFive" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-autohide="true" data-bs-delay="3000">
                        <div class="toast-body">
                        <div class="icon color-white">
                            <i class="ri-checkbox-circle-fill"></i>
                        </div>
                        <div class="content">
                            <div class="display__text">
                            <p class="text-white">Story has been created successfully.</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                            <i class="ri-close-fill"></i>
                        </button>
                        </div>
                    </div>
                    </div>
                `;

                $('body').append(toast);
                $('.toast').toast('show');
                $('#mdllAddStory').modal('hide');
                $('.un-myItem-list').append(html);
                form.reset();
                $('#image-source').attr('srcset', '');
                $('#image-source').next().attr('src', '');
                } else {
                // Jika penyimpanan gagal, tampilkan pesan error
                console.log(response);
                alert('Failed to create story');
                }
            },
            error: function() {
                // Jika terjadi error pada request, tampilkan pesan error
                // alert('An error occurred');
            }
            });
        });
        });
    </script>


@include('layouts.footer')
