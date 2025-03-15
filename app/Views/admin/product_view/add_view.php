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
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-pencil-square-o fa-fw "></i>
                    <?= $title ?>
                    <!-- <span>>
                    Normal Tables
                </span> -->
                </h1>
            </div>

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
                    <header>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">

                            <form class="form-horizontal" action="<?= base_url('admin/product/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <!-- <legend>Thêm mới sản phẩm</legend> -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Giá</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số lượng</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="stock" name="stock">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Hình ảnh</label>
                                        <div class="col-md-10">
                                            <input type="file" class="btn btn-default" id="images" name="images[]" multiple>
                                            <p class="help-block">
                                                Chọn ảnh sản phẩm
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Danh mục</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" list="list" id="category_id" name="category_id">
                                            <datalist id="list">
                                                ?<?php foreach ($data as $category): ?>
                                                <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                            <?php endforeach; ?>
                                            </datalist>
                                            <!-- <p class="note"><strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.</p> -->
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mô tả</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="description_record" name="description_record"></textarea>
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
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->
            </article>
            <!-- WIDGET END -->
        </div>

    </section>
</div>
<!-- END MAIN CONTENT -->

<?= $this->endSection(); ?>