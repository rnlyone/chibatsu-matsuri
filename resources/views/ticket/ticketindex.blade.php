@include('layouts.header')
<section class="main-search-header style-border sticky-tab">
    <ul class="nav nav-pills nav-tab-search  mt-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="list-tiket-tab" data-bs-toggle="pill" data-bs-target="#list-tiket" type="button" role="tab" aria-controls="list-tiket" aria-selected="true">Tiket</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="belum-bayar-tab" data-bs-toggle="pill" data-bs-target="#belum-bayar" type="button" role="tab" aria-controls="belum-bayar" aria-selected="false">Belum Bayar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="terbayar-tab" data-bs-toggle="pill" data-bs-target="#terbayar" type="button" role="tab" aria-controls="terbayar" aria-selected="false">Terbayar</button>
        </li>
    </ul>
</section>
<section class="un-page-components mt-3">
    <div class="tab-content padding-t-40" id="pills-tabContent">
        <div class="tab-pane fade show active" id="list-tiket" role="tabpanel" aria-labelledby="list-tiket-tab">

            <div class="un-title-default">
                <div class="text">
                    <h2>Tab Header</h2>
                    <p>To fix the tab in the head, add the class <code>sticky-tab</code> </p>

                    <p class="size-14 color-text mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborum.
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="belum-bayar" role="tabpanel" aria-labelledby="belum-bayar-tab">

            <div class="un-title-default">
                <div class="text">
                    <h2>Tab Header</h2>
                    <p>To fix the tab in the head, add the class <code>sticky-tab</code> </p>

                    <p class="size-14 color-text mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborum.
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="terbayar" role="tabpanel" aria-labelledby="terbayar-tab">

            <div class="un-title-default">
                <div class="text">
                    <h2>Tab Header</h2>
                    <p>To fix the tab in the head, add the class <code>sticky-tab</code> </p>

                    <p class="size-14 color-text mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborum.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- End.content-comp -->
</section>

@include('layouts.footer')
