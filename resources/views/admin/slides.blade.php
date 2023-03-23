@include('layouts.headersub')
@include('layouts.pagetitle')

<section class="stories-list-page">
    <!-- DISPLAY STRORIES -->
    <div class="display-stories">
        <h3 class="name_list">add Slide</h3>
        <button type="button" class="btn add-my-story" data-bs-toggle="modal" data-bs-target="#mdllAddStory">
            <div class="my_img">
                <img src="/storage/profile_pict/itsupp.png" alt="my story">
                <div class="icon">
                    <i class="ri-add-fill"></i>
                </div>
            </div>
            <div class="display-text">
                <h4>Web Slide</h4>
                <span>Add to website</span>
            </div>
        </button>
</section>

<div class="un-myItem-list bg-white">
    @foreach ($slides as $i => $slide)
    <nav id="slide-{{$slide->id}}"  class="nav flex-column">
        <div class="nav-link">
            <div class="cover_img">
                <picture>
                    <source srcset="/storage/public/slides/{{$slide->photo}}" type="image/png">
                    <img src="images/other/11.jpg" alt="">
                </picture>
                <div class="txt">
                    <h2>Slide {{$i+1}} ({{$slide->id}})</h2>
                    <p>{{$slide->timestamp}}</p>
                </div>
            </div>
            <div class="other-side">
                <a  data-story-id="{{$slide->id}}" class="delete-story out-link-danger visited">
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
                    <form id="create-story-form" action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-header">
                        <h1 class="title-modal">Buat Slide</h1>
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
                                    <input type="file" name="photo" id="file">
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
                                    <input name="link" type="text" class="form-control" placeholder='e. g. "www.example.com"'>
                                    <div class="icon">
                                        <i class="ri-link"></i>
                                    </div>
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
                                    <p>Create Slide</p>
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
                                Yakin Ingin Menghapus Slide?
                            </h2>
                        </div>

                        <div class="action-links">
                            <button type="button" class="btn border color-text rounded-pill margin-r-20" data-bs-dismiss="modal">Lihat Kembali</button>
                            <a href="javascript: void(0)"  class="delete-story btn bg-primary text-white rounded-pill">Hapus</a>
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

    <script>
        // Mendapatkan element input file
        var input = document.querySelector('input[type="file"]');

        // Menambahkan event listener ketika file diupload
        input.addEventListener('change', function() {
            // Mendapatkan nama file yang diupload
            var filename = input.files[0].name;

            // Mendapatkan element span untuk menampilkan nama file
            var span = document.querySelector('.content-input span');

            // Mendapatkan element source untuk menampilkan gambar
            var source = document.querySelector('#image-source');

            // Menampilkan nama file pada span
            span.textContent = filename;

            // Mendapatkan file yang diupload
            var file = input.files[0];

            // Membuat objek URL untuk preview gambar
            var url = URL.createObjectURL(file);

            // Mengubah srcset pada tag source
            source.srcset = url +  " 2000w";

            const imageSource = document.getElementById("image-source");
            imageSource.sizes = "(max-width: " + window.innerWidth + "px) 100vw, " + window.innerWidth + "px";
        });

    </script>

    {{-- script backup no story-002 --}}
    {{-- script backup no story-002 --}}
    <script>
        // Mendapatkan tombol delete story dan menambahkan event click
        $('.delete-story').on('click', function() {
                const storyId = $(this).data('story-id'); // Mendapatkan id dari story
                const token = $('meta[name="csrf-token"]').attr('content'); // Mendapatkan CSRF token

                // Menampilkan modal konfirmasi sebelum menghapus story
                $('#mdllOtherOpen').modal('show');

                // Menambahkan event click pada tombol hapus di dalam modal
                $('#mdllOtherOpen .bg-primary').on('click', function() {
                    // Melakukan request AJAX untuk menghapus story
                    $.ajax({
                        url: '/slide/' + storyId,
                        method: 'DELETE',
                        data: {
                            _token: token // Menambahkan CSRF token ke dalam data request
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                // Jika penghapusan berhasil, hapus elemen story dari halaman
                                // console.log('#story-' + storyId);
                                $('#mdllOtherOpen').modal('hide');
                                $('#slide-' + storyId).remove();
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
                                                        <p class="text-white">Slide has been deleted successfully.</p>
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
                            } else {
                                // Jika penghapusan gagal, tampilkan pesan error
                                console.log(response);
                                alert('Failed to delete Slide');
                            }
                        },
                        error: function(response) {

                        }
                    });
                });
            });

            function deleteslide(id) {
                const storyId = id; // Mendapatkan id dari story
                const token = $('meta[name="csrf-token"]').attr('content'); // Mendapatkan CSRF token

                // Menampilkan modal konfirmasi sebelum menghapus story
                $('#mdllOtherOpen').modal('show');

                // Menambahkan event click pada tombol hapus di dalam modal
                $('#mdllOtherOpen .bg-primary').on('click', function() {
                    // Melakukan request AJAX untuk menghapus story
                    $.ajax({
                        url: '/slide/' + storyId,
                        method: 'DELETE',
                        data: {
                            _token: token // Menambahkan CSRF token ke dalam data request
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                // Jika penghapusan berhasil, hapus elemen story dari halaman
                                // console.log('#story-' + storyId);
                                $('#mdllOtherOpen').modal('hide');
                                $('#slide-' + storyId).remove();
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
                                                        <p class="text-white">Slide has been deleted successfully.</p>
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
                            } else {
                                // Jika penghapusan gagal, tampilkan pesan error
                                console.log(response);
                                alert('Failed to delete Slide');
                            }
                        },
                        error: function(response) {

                        }
                    });
                });
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
                var story = response.slide;
                var html = '<div id="slide-'+story.id+'" class="nav-link">' +
                    '<div class="cover_img">' +
                    '<picture>' +
                    '<source srcset="/storage/public/slides/' + story.photo + '" type="image/png">' +
                    '<img src="images/other/11.jpg" alt="">' +
                    '</picture>' +
                    '<div class="txt">' +
                    '<h2>Slide ' + ' (' + story.id + ')</h2>' +
                    '</div>' +
                    '</div>' +
                    '<div class="other-side">' +
                    '<a onclick="deleteslide('+story.id+')" data-story-id="' + story.id + '" class="delete-story out-link-danger visited">' +
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
                            <p class="text-white">Slide has been created successfully.</p>
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
                alert('Failed to create story');
                }
            },
            error: function() {
                // Jika terjadi error pada request, tampilkan pesan error
                alert('wow')
            //     let toast = `
            //         <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center place__top w-100">
            //         <div id="errortoast" class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true"
            //             data-bs-autohide="true" data-bs-delay="3000">
            //             <div class="toast-body">
            //             <div class="icon color-white">
            //                 <i class="ri-checkbox-circle-fill"></i>
            //             </div>
            //             <div class="content">
            //                 <div class="display__text">
            //                 <p class="text-white">Ada Error.</p>
            //                 </div>
            //             </div>
            //             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
            //                 <i class="ri-close-fill"></i>
            //             </button>
            //             </div>
            //         </div>
            //         </div>
            //     `;
            }

            // $('#errortoast').toast('show');
            });
        });
        });
    </script>


@include('layouts.footer')
