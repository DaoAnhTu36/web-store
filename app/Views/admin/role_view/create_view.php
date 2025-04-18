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
                            <form class="form-horizontal" action="<?= base_url('admin/role/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên vai trò, chức vụ</label>
                                        <div class="col-md-10">
                                            <input autofocus class="form-control" value="" placeholder="" type="text" id="name" name="name">
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
                                                            <input type="checkbox" value="<?= $permission['id'] ?>" id="<?= $permission['id'] ?>" name="permission_id[]">
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
                                                Lưu
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
<?= $this->endSection(); ?>