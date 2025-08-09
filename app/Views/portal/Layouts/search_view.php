<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="position-relative mx-auto">
                <input class="form-control border-2 border-warning w-100 py-3 px-4 rounded-pill"
                    type="text" id="word-search" placeholder="Tìm kiếm"
                    onkeyup="onSearchProduct()" autocomplete="off">

                <div id="search-result" class="search-dropdown shadow-sm border rounded mt-1 bg-white position-absolute w-100 d-none" style="z-index: 1000; max-height: 300px; overflow-y: auto;">
                </div>
            </div>
        </div>
    </div>
</div>