<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="">Đăng nhập tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="display: none;" id="flash-message">
                        <div class="alert"></div>
                    </div>
                    <div class="form-item">
                        <input type="text" name="username_signin" id="username_signin" value="" placeholder=" " required autocomplete="username">
                        <label for="username_signin">Email/Số điện thoại</label>
                    </div>
                    <div class="form-item">
                        <input type="password" name="password_signin" id="password_signin" value="" placeholder=" " required autocomplete="new-password">
                        <label for="password_signin">Mật khẩu</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="login-register">
                        <div class="area-action area-register">
                            <button type="button" class="btn border-secondary rounded-pill px-4 py-3 text-primary" style="color:white;" onclick="onClearNoti()" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</button>
                        </div>
                        <div class="area-action area-submit">
                            <button type="button" class="btn border-secondary rounded-pill px-4 py-3 text-primary" onclick="onSigninCustomer()">Đăng nhập</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>