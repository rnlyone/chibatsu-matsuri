    {{-- script backup no story-001 --}}
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
                        url: '/story/' + storyId,
                        method: 'DELETE',
                        data: {
                            _token: token // Menambahkan CSRF token ke dalam data request
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                // Jika penghapusan berhasil, hapus elemen story dari halaman
                                // console.log('#story-' + storyId);
                                $('#mdllOtherOpen').modal('hide');
                                $('#story-' + storyId).remove();
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
                                                        <p class="text-white">Story has been deleted successfully.</p>
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
                                alert('Failed to delete story');
                            }
                        },
                        error: function() {
                            // Jika terjadi error pada request, tampilkan pesan error
                            alert('An error occurred');
                        }
                    });
                });
            });
    </script>
