<div class="modal fade" id="formRegisterModal" tabindex="-1" role="dialog" aria-labelledby="formRegisterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div style="display: none;" id="flash-message" class="alert alert-danger">
            </div>
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
                <button type="button" class="btn btn-primary" onclick="onRegisterCustomer()">Đăng ký</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url($libUrl . '/js/jquery-3.7.1.min.js'); ?>"></script>
<script src="<?= base_url($libUrl . '/bootstrap-4.6.2/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url($libUrl . '/bootstrap-4.6.2/js/bootstrap.bundle.min.js'); ?>"></script>

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
                if (response.status) {
                    $("#flash-message").hide();
                    $("#formRegisterModal").click();
                } else {
                    $("#flash-message").show().text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>
</body>

</html>