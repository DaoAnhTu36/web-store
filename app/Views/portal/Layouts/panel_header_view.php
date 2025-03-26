<header>
    <div class="container-fluid">
        <div class="row py-3 border-bottom">
            <div class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                <!-- <div class="d-flex align-items-center my-3 my-sm-0">
                    <a href="index.html">
                        <img src="images/logo.svg" alt="logo" class="img-fluid" />
                    </a>
                </div> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#menu"></use>
                    </svg>
                </button>
            </div>

            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-4">
                <div class="search-bar row bg-light p-2 rounded-4">
                    <div class="col-md-4 d-none d-md-block">
                        <select class="form-select border-0 bg-transparent">
                            <option>Danh mục</option>
                            <option>Tinh dầu</option>
                            <option>Máy xông tinh dầu</option>
                        </select>
                    </div>
                    <div class="col-11 col-md-7">
                        <form id="search-form" class="text-center" action="index.html" method="post">
                            <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm" />
                        </form>
                    </div>
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
                    <li class="nav-item active">
                        <a href="index.html" class="nav-link">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pe-3" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Danh mục khác</a>
                        <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
                            <li><a href="index.html" class="dropdown-item">Giới thiệu </a></li>
                            <li><a href="index.html" class="dropdown-item">Cửa hàng </a></li>
                            <li><a href="index.html" class="dropdown-item">Giỏ hàng </a></li>
                            <li><a href="index.html" class="dropdown-item">Liên hệ </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    <li>
                        <a data-toggle="modal" data-target="#formRegisterModal" class="p-2 mx-1">
                            <svg width="24" height="24">
                                <use xlink:href="#user"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="p-2 mx-1">
                            <svg width="24" height="24">
                                <use xlink:href="#wishlist"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg width="24" height="24">
                                <use xlink:href="#shopping-bag"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <!-- Modal -->
                <div class="modal fade" id="formRegisterModal" tabindex="-1" role="dialog" aria-labelledby="formRegisterModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formRegisterModalLabel">Đăng ký</h5>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>Họ</td>
                                        <td>
                                            <input type="text" name="first_name" value="Tran" id="first_name" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tên</td>
                                        <td>
                                            <input type="text" name="last_name" value="Tu" id="last_name" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <input type="text" name="email" value="tutran.mta.it@gmail.com" id="email" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td>
                                            <input type="text" name="phone" value="0975924428" id="phone" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mật khẩu</td>
                                        <td>
                                            <input type="password" name="password" value="123@123" id="password" class="form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="onRegisterCustomer()">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onRegisterCustomer() {
            let first_name = $("#first_name").val();
            let last_name = $("#last_name").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let password = $("#password").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/customer/save') ?>",
                data: {
                    first_name,
                    last_name,
                    email,
                    phone,
                    password
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        }
    </script>
</header>