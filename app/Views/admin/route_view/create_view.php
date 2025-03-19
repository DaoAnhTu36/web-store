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
                            <form class="form-horizontal" action="<?= base_url('admin/route/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Method</label>
                                        <div class="col-md-10">
                                            <select name="method" id="method" class="form-control">
                                                <option value="GET">GET</option>
                                                <option value="POST">POST</option>
                                                <option value="">Empty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Uri</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="uri" name="uri">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Controller</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="controller" name="controller">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Filters</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="filters" name="filters">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Is group</label>
                                        <div class="col-md-10">
                                            <input value="1" placeholder="" type="checkbox" id="is_group" name="is_group">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Level</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="3" placeholder="" type="text" id="level" name="level">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Parent ID</label>
                                        <div class="col-md-10">
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <?php foreach ($data as $item) : ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['uri'] ?></option>
                                                <?php endforeach; ?>
                                                <option value="">Empty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Permission ID</label>
                                        <div class="col-md-10">
                                            <select name="permission_id" id="permission_id" class="form-control">
                                                <?php foreach ($permissions as $item) : ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                <?php endforeach; ?>
                                                <option value="">Empty</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <button class="btn btn-default" type="submit">
                                                Hủy
                                            </button> -->
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