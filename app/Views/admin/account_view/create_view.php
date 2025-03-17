<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-list-alt fa-fw "></i>
                <?= $title ?>
                <!-- <span>>
                    Normal Tables
                </span> -->
            </h1>
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
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
                                            <input class="form-control" value="ntd060404" placeholder="" type="text" id="user_name" name="user_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mật khẩu</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="123456@b" placeholder="" type="password" id="password" name="password">
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
                                            <select name="role" id="role" class="form-control">
                                                <option value="customer">Người dùng</option>
                                                <option value="admin">Quản trị viên</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="button">
                                                Hủy
                                            </button>
                                            <button class="btn btn-primary" type="button" onclick="onSubmit()">
                                                <i class="fa fa-save"></i>
                                                Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                </div>
            </div>
            <!-- end widget -->

        </div>

        <!-- end row -->

    </section>
    <!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<script>
    function onSubmit() {
        let full_name = $("#full_name").val();
        let user_name = $("#user_name").val();
        let password = $("#password").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let address = $("#address").val();
        let role = $("#role").val();
        if (!full_name || !user_name || !password || !email || !phone || !address || !role) {
            Toastify({
                text: 'Vui lòng điền đầy đủ thông tin',
                duration: 1500,
            }).showToast();
            return;
        }
        $.ajax({
            url: '<?= base_url('admin/account/save') ?>',
            type: 'POST',
            data: {
                full_name,
                user_name,
                password,
                email,
                phone,
                address,
                role,
            },
            success: function(response) {
                if (response.status == 'fail') {
                    Toastify({
                        text: response.message,
                        duration: 1500,
                    }).showToast();
                } else {
                    Toastify({
                        text: response.message,
                        duration: 1500,
                        callback: function() {
                            window.location.reload(true);
                        }
                    }).showToast();
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>
<?= $this->endSection(); ?>