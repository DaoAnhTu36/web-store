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
                    <input type="text" name="profile_first_name" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['first_name'] : '' ?>" id="profile_first_name" placeholder=" " required>
                    <label for="profile_first_name">Họ</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_last_name" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['last_name'] : '' ?>" id="profile_last_name" placeholder=" " required>
                    <label for="profile_last_name">Tên</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_email" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['email'] : '' ?>" id="profile_email" placeholder=" " required>
                    <label for="profile_email">Email</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_phone" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['phone'] : '' ?>" id="profile_phone" placeholder=" " required autocomplete="tel">
                    <label for="profile_phone">Số điện thoại</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_address" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['address'] : '' ?>" id="profile_address" placeholder=" " required>
                    <label for="profile_address">Địa chỉ</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_city" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['city'] : '' ?>" id="profile_city" placeholder=" " required>
                    <label for="profile_city">Thành phố</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_state" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['state'] : '' ?>" id="profile_state" placeholder=" " required>
                    <label for="profile_state">Quận huyện</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_country" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['country'] : '' ?>" id="profile_country" placeholder=" " required>
                    <label for="profile_country">Quốc gia</label>
                </div>
                <div class="form-item">
                    <input type="text" name="profile_postal_code" value="<?= session()->get('customer_infor') != null ? session()->get('customer_infor')['postal_code'] : '' ?>" id="profile_postal_code" placeholder=" " required>
                    <label for="profile_postal_code">Mã bưu chính</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-danger" style="color:white;" onclick="onSignupCustomer()">Đăng xuất tài khoản</button>
            </div>
        </div>
    </div>
</div>