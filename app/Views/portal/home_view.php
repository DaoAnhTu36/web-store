<?= $this->extend('portal/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <?php foreach ($data as $key => $value): ?>
            <div class="tab-class text-center mt-5">
                <div class="row g-4 mt-5">
                    <div class="col-lg-4 text-start">
                        <h1>
                            <span class="text-secondary"><?= $categories[array_search($key, array_column($categories, 'id'))]['name'] ?></span>
                        </h1>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row g-4 mt-5">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                <?php foreach ($value as $item): ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <a href="<?= base_url('portal/chi-tiet-san-pham/' . $item['slug']) . '.html' ?>">
                                                <div class="fruite-img" style="overflow: hidden;">
                                                    <?php if (isset($item['image']) && $item['image'] !== ''): ?>
                                                        <img src="<?= base_url(trim($item['image'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                                    <?php else: ?>
                                                        <img src="<?= base_url(trim(session()->get('web_configs')['image_product_default'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                                    <?php endif ?>
                                                </div>
                                            </a>
                                            <?php if (isset($item['discount']) && is_array($item['discount'])): ?>
                                                <div class="text-white bg-danger px-3 py-1 rounded position-absolute" style="top: 10px;right: 10px;">
                                                    <?php if ($item['discount']['discount_type_id'] == 1): ?>
                                                        <?= format_currency($item['discount']['discount_value']) ?>%
                                                    <?php endif ?>
                                                </div>
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
                    <!-- </div> -->
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- Fruits Shop End-->
<?= $this->endSection(); ?>