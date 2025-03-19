<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('errors')): ?>
    <div id="flash-message" class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')): ?>
    <div id="flash-message" class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>
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
                                            <input class="form-control" value="" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Danh sách quyền</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <?php foreach ($permissions as $permission): ?>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                                <?= $permission['name'] ?>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                                <input class="form-control" value="<?= $permission['id'] ?>" placeholder="" type="checkbox" id="<?= $permission['id'] ?>" name="permission_id[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
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