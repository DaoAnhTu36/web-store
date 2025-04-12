<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<div id="content">
    <section id="widget-grid" class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-pencil-square-o fa-fw "></i>
                    <?= $title ?>
                </h1>
            </div>
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">
                            <form class="form-horizontal" action="<?= base_url('admin/role/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên vài trò chức vụ</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['name'] ?>" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Tên quyền</td>
                                                <td>Trạng thái</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $idx = 1;
                                            foreach ($permissions as $permission): ?>
                                                <tr>
                                                    <td><?= $idx ?></td>
                                                    <td>
                                                        <div class="col-md-12"><?= $permission['name'] ?></div>
                                                    </td>
                                                    <td>
                                                        <label class="switch1">
                                                            <?php if ($permission['is_checked']) { ?>
                                                                <input type="checkbox" checked onclick="onChangeRolePermission(<?= $data['id'] ?>,<?= $permission['id'] ?>)">
                                                            <?php } else { ?>
                                                                <input type="checkbox" onclick="onChangeRolePermission(<?= $data['id'] ?>,<?= $permission['id'] ?>)">
                                                            <?php } ?>
                                                            <span class="slider1"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php $idx++;
                                            endforeach ?>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="submit">
                                                Hủy
                                            </button>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-save"></i>
                                                Cập nhật
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script>
    function onChangeRolePermission(role_id, permission_id) {
        $.ajax({
            url: '<?= base_url('admin/role-permission/change-role-permission') ?>',
            type: 'POST',
            data: {
                'role_id': role_id,
                'permission_id': permission_id,
            },
            success: function(response) {
                Toastify({
                    text: response.message ?? 'Cập nhật quyền thành công',
                    duration: 1500,
                }).showToast();
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>
<?= $this->endSection(); ?>