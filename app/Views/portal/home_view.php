<?= $this->extend('portal/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>

<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Vận chuyển</h5>
                        <p class="mb-0">Miên phí với đơn hàng trên 300k</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Thanh toán</h5>
                        <p class="mb-0">Nhận hàng mới thanh toán</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>7 ngày</h5>
                        <p class="mb-0">7 ngày miễn phí đổi trả</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>24/7 hỗ trợ</h5>
                        <p class="mb-0">Hỗ trợ khách hàng nhanh chóng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <?php if (isset($categories) && is_array($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <?php if ($category['id'] == session()->get('web_configs')['tab_active_home_page']): ?>
                                    <li class="nav-item">
                                        <a class="d-flex py-2 m-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-<?= $category['id'] ?>">
                                            <span class="text-dark" style="width: 130px;"><?= $category['name'] ?></span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item">
                                        <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-<?= $category['id'] ?>">
                                            <span class="text-dark" style="width: 130px;"><?= $category['name'] ?></span>
                                        </a>
                                    </li>
                                <?php endif ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <?php foreach ($data as $key => $value): ?>
                    <div id="tab-<?= $key ?>" class="tab-pane fade show p-0 <?= session()->get('web_configs')['tab_active_home_page'] == $key ? 'active' : '' ?>">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <?php foreach ($value as $item): ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img" style="overflow: hidden;height: 300px;">
                                                    <?php if (isset($item['image']) && $item['image'] !== ''): ?>
                                                        <img src="<?= base_url(trim($item['image'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                                    <?php else: ?>
                                                        <img src="<?= base_url(trim(session()->get('web_configs')['image_product_default'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                                    <?php endif ?>

                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?= $item['category_name'] ?></div>
                                                <?php if (isset($item['discount']) && is_array($item['discount'])): ?>
                                                    <div class="text-white bg-danger px-3 py-1 rounded position-absolute" style="top: 60px;left: 10px;">Giảm giá</div>
                                                <?php endif ?>
                                                <div class="p-4 rounded-bottom">
                                                    <h5><?= $item['name'] ?></h5>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-1" style="display: flex;">
                                                            <?php if (isset($item['discount']) && is_array($item['discount'])): ?>
                                                                <p style="width: 100%;" class="text-dark fs-7  text-decoration-line-through">
                                                                    <?= format_currency($item['price'], get_current_symboy()) ?>
                                                                </p>
                                                                <!-- <p style="width: 100%;">></p> -->
                                                                <p style="width: 100%;" class="text-dark fs-7 ">
                                                                    <?= format_currency($item['discount']['price_sale'], get_current_symboy()) ?>
                                                                </p>
                                                            <?php else: ?>
                                                                <p style="width: 100%;" class="text-dark fs-7 "><?= format_currency($item['price'], get_current_symboy()) ?></p>
                                                            <?php endif ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-1">
                                                            <a onclick="onAddCart('<?= $item['id'] ?>','<?= $item['name'] ?>','<?= $item['price'] ?>','buyNow')" class="btn border border-secondary rounded-pill px-3 text-primary"> Mua ngay</a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-1">
                                                            <a onclick="onAddCart('<?= $item['id'] ?>','<?= $item['name'] ?>','<?= $item['price'] ?>','addToCart')" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
<?= $this->endSection(); ?>