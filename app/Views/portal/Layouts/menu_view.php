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
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary display-6"><?= session()->get('web_configs')['site_name']; ?></h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <!-- <a href="index.html" class="nav-item nav-link active">Trang chủ</a> -->
                    <a href="index.html" class="nav-item nav-link">Trang chủ</a>
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
                    <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"><i class="fas fa-search text-primary"></i></button> -->
                    <a href="<?= base_url('portal/cart-client') ?>" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a>
                    <?php if (session()->get('customer_infor')): ?>
                        <div class="customer-profile">
                            <a data-bs-toggle="modal" data-bs-target="#profileModal" class="my-auto">
                                Xin chào <br />
                                <?= session()->get('customer_infor')['first_name'] . ' ' . session()->get('customer_infor')['last_name'] ?>
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

<!-- Modal register Start -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="">Đăng ký tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div style="display: none;" id="flash-message">
                <div class="alert"></div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <table class="table">
                    <tr>
                        <td>Họ</td>
                        <td>
                            <input type="text" name="first_name" value="" id="first_name_register" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>
                            <input type="text" name="last_name" value="" id="last_name_register" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="" id="email_register" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            <input type="text" name="phone" value="" id="phone_register" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="password2" value="" id="password_register" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-success" onclick="onClearNoti()" style="color:white" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signinModal">Đăng nhập</button>
                <button type="button" id="register_now" class="btn btn-primary" style="color:white" onclick="onRegisterCustomer()">Submit</button>
                <button type="button" id="active_now" class="btn btn-danger" style="color:white;display: none;" onclick="onActiveCustomer()">Kích hoạt ngay</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal register End -->

<!-- Modal signin Start -->
<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="">Đăng nhập tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="display: none;" id="flash-message">
                    <div class="alert"></div>
                </div>
                <div class="form-item">
                    <input type="text" name="username" id="username_signin" value="0975924428" placeholder=" " required>
                    <label for="username">Email/Số điện thoại</label>
                </div>
                <div class="form-item">
                    <input type="password" name="password1" id="password_signin" value="123@123" placeholder=" " required>
                    <label for="password1">Mật khẩu</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-success" style="color:white;" onclick="onSigninCustomer()">Submit</button>
                <button type="button" id="" class="btn btn-primary" style="color:white;" onclick="onClearNoti()" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</button>
            </div>
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="signinModal">Đăng nhập tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div style="display: none;" id="flash-message">
                <div class="alert"></div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <table class="table">
                    <tr>
                        <td>Email/Số điện thoại</td>
                        <td>
                            <input type="text" name="username" value="" id="username" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="password1" value="" id="password" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-success" style="color:white;" onclick="onSigninCustomer()">Submit</button>
                <button type="button" id="" class="btn btn-primary" style="color:white;" onclick="onClearNoti()" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</button>
            </div> -->
        </div>
    </div>
</div>
<!-- Modal signin End -->

<!-- Modal signin Start -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="">Thông tin tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="display: none;" id="flash-message">
                    <div class="alert"></div>
                </div>
                <div class="form-item">
                    <input type="text" name="first_name" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['first_name'] : '' ?>" id="first_name" placeholder=" " required>
                    <label for="first_name">Họ</label>
                </div>
                <div class="form-item">
                    <input type="text" name="last_name" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['last_name'] : '' ?>" id="last_name" placeholder=" " required>
                    <label for="last_name">Tên</label>
                </div>
                <div class="form-item">
                    <input type="text" name="email" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['email'] : '' ?>" id="email" placeholder=" " required>
                    <label for="email">Email</label>
                </div>
                <div class="form-item">
                    <input type="text" name="phone" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['phone'] : '' ?>" id="phone" placeholder=" " required>
                    <label for="phone">Số điện thoại</label>
                </div>
                <div class="form-item">
                    <input type="text" name="address" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['address'] : '' ?>" id="address" placeholder=" " required>
                    <label for="address">Địa chỉ</label>
                </div>
                <div class="form-item">
                    <input type="text" name="city" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['city'] : '' ?>" id="city" placeholder=" " required>
                    <label for="city">Thành phố</label>
                </div>
                <div class="form-item">
                    <input type="text" name="state" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['state'] : '' ?>" id="state" placeholder=" " required>
                    <label for="state">Quận huyện</label>
                </div>
                <div class="form-item">
                    <input type="text" name="country" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['country'] : '' ?>" id="country" placeholder=" " required>
                    <label for="country">Quốc gia</label>
                </div>
                <div class="form-item">
                    <input type="text" name="postal_code" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['postal_code'] : '' ?>" id="postal_code" placeholder=" " required>
                    <label for="postal_code">Mã bưu chính</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-danger" style="color:white;" onclick="onSignupCustomer()">Đăng xuất tài khoản</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal signin End -->