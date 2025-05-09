<?= $this->extend('portal/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?= $data['name'] ?></h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        <li class="breadcrumb-item active text-white">Chi tiết sản phẩm</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a>
                                <?php if (isset($data['image']) && $data['image'] !== ''): ?>
                                    <img src="<?= base_url(trim($data['image'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                <?php else: ?>
                                    <img src="<?= base_url(trim(session()->get('web_configs')['image_product_default'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                <?php endif ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3"><?= $data['name'] ?></h4>
                        <p class="mb-3">Danh mục: <?= $data['category_name'] ?></p>
                        <h5 class="fw-bold mb-3"><?= format_currency($data['price'], get_current_symboy()) ?></h5>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <!-- <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                        <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p> -->
                        <!-- <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div> -->
                        <a onclick="onAddCart('<?= $data['id'] ?>','<?= $data['name'] ?>','<?= $data['price'] ?>','buyNow')" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Mua ngay</a>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Giới thiệu sản phẩm</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Đánh giá sản phẩm</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <?= $data['description'] ?>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <form action="#">
                                    <h4 class="mb-5 fw-bold">Đánh giá sản phẩm</h4>
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="border-bottom rounded">
                                                <input type="text" name="fullname" id="fullname" value="<?= isset(session()->get('customer_infor')['first_name']) ? session()->get('customer_infor')['first_name'] . ' ' . session()->get('customer_infor')['last_name'] : '' ?>" class="form-control border-0 me-4" placeholder="Tên người bình luận" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="border-bottom rounded">
                                                <input type="email" name="email" id="email" value="<?= isset(session()->get('customer_infor')['email']) ? session()->get('customer_infor')['email'] : '' ?>" class="form-control border-0" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="border-bottom rounded my-4">
                                                <textarea name="content" id="content" class="form-control border-0" cols="30" rows="8" placeholder="Nội dung đánh giá" spellcheck="false" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between py-3 mb-5">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 me-3">Đanh giá:</p>
                                                    <div class="d-flex align-items-center" style="font-size: 12px;">
                                                        <i class="fa fa-star text-muted"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <a onclick="onFeedback('<?= $data['id'] ?>')" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Bình luận</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="fb-comments"
                                                data-href="https://peatum.com/portal/chi-tiet-san-pham/<?= $data['slug'] ?>.html"
                                                data-width="100%"
                                                data-numposts="5"
                                                data-order-by="reverse_time">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="comments" id="comments">
                                    <?php foreach ($reviews as $review): ?>
                                        <div class="d-flex mb-2">
                                            <!-- <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt=""> -->
                                            <div class="" style="width: 100%;">
                                                <p class="mb-2" style="font-size: 14px;"><?= $review['created_at'] ?></p>
                                                <div class="d-flex justify-content-between">
                                                    <h5><?= $review['created_by'] ?></h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    </div>
                                                </div>
                                                <p style="width:100%; word-wrap: break-word;"><?= $review['comment'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <div class="input-group w-100 mx-auto d-flex mb-4">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                        <div class="mb-4">
                            <h4>Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Apples</a>
                                        <span>(3)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                        <span>(5)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                        <span>(2)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                        <span>(8)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                        <span>(5)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="mb-4">Featured products</h4>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="img/featur-1.jpg" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="img/featur-2.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="img/featur-3.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/vegetable-item-4.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/vegetable-item-5.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/vegetable-item-6.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <h1 class="fw-bold mb-0">Sản phẩm cùng danh mục</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php foreach ($data_relations as $item) { ?>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <a href="<?= base_url('portal/chi-tiet-san-pham/' . $item['slug']) . '.html' ?>">
                            <div class="vesitable-img">
                                <?php if (isset($item['image']) && $item['image'] !== ''): ?>
                                    <img src="<?= base_url(trim($item['image'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                <?php else: ?>
                                    <img src="<?= base_url(trim(session()->get('web_configs')['image_product_default'])) ?>" class="img-fluid w-100 rounded-top" alt="">
                                <?php endif ?>
                            </div>
                            <!--                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">-->
                            <!--                                --><?php //= $item['category_name'] 
                                                                    ?>
                            <!--                            </div>-->
                            <?php if (isset($item['discount']) && is_array($item['discount'])): ?>
                                <div class="text-white bg-danger px-3 py-1 rounded position-absolute" style="top: 60px;right: 10px;">Giảm giá</div>
                            <?php endif ?>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4><?= $item['name'] ?></h4>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold"><?= format_currency($item['price'], get_current_symboy()) ?></p>
                                    <a onclick="onAddCart('<?= $item['id'] ?>','<?= $item['name'] ?>','<?= $item['price'] ?>','buyNow')" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Mua ngay</a>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->


<?= $this->endSection(); ?>