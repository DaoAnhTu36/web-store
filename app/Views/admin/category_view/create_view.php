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
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">
                            <form action="<?= base_url('admin/category/save') ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <fieldset>
                                    <legend><?= $title ?></legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Tên danh mục</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="description">Mô tả</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="description_" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="images">Ảnh</label>
                                        <div class="col-md-10">
                                            <input type="file" class="btn btn-default" id="images" name="images[]" multiple>
                                        </div>
                                    </div>
                                    <div class="form-group" id="image_preview_container">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10" id="item_preview">

                                        </div>
                                    </div>
                                </fieldset>
                                <?= view(
                                    "admin/Layouts/group_button_action_form_view.php",
                                    [
                                        'type_button' => "submit",
                                        'label' => 'Lưu'
                                    ]
                                ) ?>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script src="<?= base_url('services/category_service.js') ?>"></script>
<?= $this->endSection(); ?>