        <!-- ===================================
          START THE BOTTOM NAVIGATION
        ==================================== -->
        @include('layouts.navigator')
    </div>
    <!-- ===================================
      START THE MODAL SIDEBAR MENU - CONNECTED
    ==================================== -->
        @include('layouts.sidebar')
    <!-- ===================================
      START THE CREATE STORY MODAL
    ==================================== -->
    <div class="modal sidebarMenu -left --fullScreen modal-filter fade" id="mdllAddStory" tabindex="-1"
        aria-labelledby="sidebarMenuLabel3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="title-modal">Create Story</h1>
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
                                <input type="file">
                                <div class="content-input">
                                    <div class="icon"><i class="ri-upload-cloud-line"></i></div>
                                    <span>PNG, GIF, JPG, MP4 . Max 5 mb.</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-right">
                            <label>Add Link</label>
                            <div class="input_group">
                                <input type="url" class="form-control" placeholder='e. g. "www.example.com"'>
                                <div class="icon">
                                    <i class="ri-link"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Link Text</label>
                            <div class="inpust_group">
                                <input type="text" class="form-control" placeholder='e. g. "INSTALL APP"'>
                            </div>
                        </div>
                    </div>
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
                            <a href="page-home-stories.html" class="btn btn-bid-items">
                                <p>Create Story</p>
                                <div class="ico">
                                    <i class="ri-arrow-drop-right-line"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===================================
      START STATUS CONNECTION
    ==================================== -->
    <div class="d-flex justify-content-center">
        <div class="toast status-connection" role="alert" aria-live="assertive" aria-atomic="true"></div>
    </div>


    @include('layouts.jses')

</body>

</html>
