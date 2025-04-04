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
            <form>
                <div class="modal-body d-flex align-items-center">
                    <table class="table">
                        <tr>
                            <td><span class="required-field"></span>Họ</td>
                            <td>
                                <input required type="text" name="first_name_register" value="" id="first_name_register" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required-field"></span>Tên</td>
                            <td>
                                <input required type="text" name="last_name_register" value="" id="last_name_register" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required-field"></span>Email</td>
                            <td>
                                <input required type="text" name="email_register" value="" id="email_register" class="form-control input-type-email">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required-field"></span>Số điện thoại</td>
                            <td>
                                <input required type="text" name="phone_register" value="" id="phone_register" class="form-control" autocomplete="tel">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required-field"></span>Mật khẩu</td>
                            <td>
                                <input type="password" name="password_register" autocomplete="new-password" value="" id="password_register" class="form-control">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="login-register">
                        <div class="area-action area-login">
                            <button type="button" id="" class="btn border-secondary rounded-pill px-4 py-3 text-primary" onclick="onClearNoti()" style="color:white" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signinModal">Đăng nhập</button>
                        </div>
                        <div class="area-action area-verify">
                            <button type="button" id="active_now" class="btn border-secondary rounded-pill px-4 py-3 text-primary" style="color:white;display: none;" onclick="onActiveCustomer()">Kích hoạt ngay</button>
                        </div>
                        <div class="area-action area-submit">
                            <button type="button" id="register_now" class="btn border-secondary rounded-pill px-4 py-3 text-primary" style="color:white" onclick="onRegisterCustomer()">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>