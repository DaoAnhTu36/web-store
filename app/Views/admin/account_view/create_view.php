<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-list-alt fa-fw "></i>
                <?= $title ?>
            </h1>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Họ và tên</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="Nguyen Thi Dao" placeholder="" type="text" id="full_name" name="full_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên đăng nhập</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="ntd060404" placeholder="" type="text" id="user_name" name="user_name" autocomplete="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mật khẩu</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="123456@b" placeholder="" type="password" id="password" name="password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="nguyenthidao@gmail.com" placeholder="" type="text" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số điện thoại</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="0947270032" placeholder="" type="text" id="phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội" placeholder="" type="text" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Vai trò</label>
                                        <div class="col-md-10">
                                            <select name="role_id" id="role_id" class="form-control">
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <?= view("admin/Layouts/group_button_action_form_view.php", ['function' => 'onSubmitCreateAccount()', 'label' => 'Lưu']) ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function onSubmitCreateAccount() {
        let full_name = $("#full_name").val();
        let user_name = $("#user_name").val();
        let password = $("#password").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let address = $("#address").val();
        let role_id = $("#role_id").val();
        $.ajax({
            url: '<?= site_url('admin/account/save') ?>',
            type: 'POST',
            data: {
                full_name,
                user_name,
                password,
                email,
                phone,
                address,
                role_id,
            },
            success: function(response) {
                if (response.status) {
                    // onToastrSuccess(response.message);
                    window.location.href = '<?= base_url('admin/account') ?>';
                } else {
                    onToastrError(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>
<?= $this->endSection(); ?>