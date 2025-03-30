<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
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
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Họ và tên</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['full_name'] ?>" placeholder="" type="text" id="full_name" name="full_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên đăng nhập</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['user_name'] ?>" placeholder="" type="text" id="user_name" name="user_name" autocomplete="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['email'] ?>" placeholder="" type="text" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số điện thoại</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['phone'] ?>" placeholder="" type="text" id="phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['address'] ?>" placeholder="" type="text" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Vai trò</label>
                                        <div class="col-md-10">
                                            <select name="role_id" id="role_id" class="form-control">
                                                <?php foreach ($roles as $role): ?>
                                                    <?php if ($role['id'] == $data['role_id']): ?>
                                                        <option selected value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <?= view("admin/Layouts/group_button_action_form_view.php", ['function' => 'onSubmitUpdateAccount(' . $data['id'] . ')', 'label' => 'Cập nhật']) ?>
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
    function onSubmitUpdateAccount(id) {
        let full_name = $("#full_name").val();
        let user_name = $("#user_name").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let address = $("#address").val();
        let role_id = $("#role_id").val();
        $.ajax({
            url: '<?= base_url('admin/account/update/') ?>' + id,
            type: 'POST',
            data: {
                full_name,
                user_name,
                email,
                phone,
                address,
                role_id,
            },
            success: function(response) {
                if (response.status) {
                    onToastrSuccess(response.message);
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