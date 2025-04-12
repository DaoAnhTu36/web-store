<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">221 Yên Xá, Tân Triều, Thanh Trì, Hà Nội</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">trailangnd96@gmail.com</a></small>
            </div>
            <!-- <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div> -->
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="<?= base_url('portal/home') ?>" class="navbar-brand">
                <h1 class="text-primary display-6"><?= session()->get('web_configs')['site_name']; ?></h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <!-- <a href="index.html" class="nav-item nav-link active">Trang chủ</a> -->
                    <!-- <a href="index.html" class="nav-item nav-link">Trang chủ</a> -->
                    <!-- <a href="shop.html" class="nav-item nav-link">Shop</a>
                    <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a> -->
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Trang</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="#" class="dropdown-item">Giỏ hàng</a>
                            <a href="#" class="dropdown-item">Chackout</a>
                            <a href="#" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <!-- <a href="contact.html" class="nav-item nav-link">Liên hệ</a> -->
                </div>
                <div class="d-flex m-3 me-0">
                    <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"><i class="fas fa-search text-primary"></i></button> -->
                    <a href="<?= base_url('portal/cart-client') ?>" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" id="total-item-in-cart" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo (session()->get('cart') != null ? array_sum(array_column(session()->get('cart'), 'quantity')) : 0); ?></span>
                    </a>
                    <?php if (session()->get('customer_infor')): ?>
                        <div class="customer-profile">
                            <a data-bs-toggle="modal" data-bs-target="#profileModal" class="my-auto">
                                Xin chào <br />
                                <i><?= session()->get('customer_infor')['first_name'] . ' ' . session()->get('customer_infor')['last_name'] ?></i>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="customer-profile">
                            <a data-bs-toggle="modal" data-bs-target="#signinModal" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->