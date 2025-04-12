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
                            <form class="form-horizontal" action="<?= base_url('admin/product-attributes/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới thuộc tính sản phẩm</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên thuộc tính</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="attribute_name" name="attribute_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Giá trị thuộc tính</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="attribute_value" name="attribute_value">
                                        </div>
                                    </div>
                                </fieldset>
                                <?= view("admin/Layouts/group_button_action_form_view.php") ?>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>