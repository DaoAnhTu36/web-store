<?= $this->extend('portal/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>

<!-- start content here -->
<section class="pb-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between my-4">
                    <h2 class="section-title">Sản phẩm</h2>

                    <div class="d-flex align-items-center">
                        <a href="#" class="btn btn-primary rounded-1">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                    <?php foreach ($data as $item): ?>
                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="<?= site_url('portal/product/detail_product/' . $item['id']) ?>" title="Product Title">

                                        <img src="<?= $images = trim(explode(', ', $item['images'])[0]);
                                                    base_url($images) ?>" alt="Product Thumbnail" class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal"><?= $item['name'] ?></h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use xlink:href="#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use xlink:href="#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use xlink:href="#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use xlink:href="#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use xlink:href="#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <!-- <del>$24.00</del> -->
                                        <span class="text-dark fw-semibold"><?= number_format($item['price'], 0, ',', '.'); ?> ₫</span>
                                        <!-- <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10%
                                            OFF</span> -->
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3"><input type="number" name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity" value="1" /></div>
                                            <div class="col-7">
                                                <a href="#" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use xlink:href="#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a href="#" class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use xlink:href="#heart"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                    <!-- / product-grid -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end content here -->

<?= $this->endSection(); ?>