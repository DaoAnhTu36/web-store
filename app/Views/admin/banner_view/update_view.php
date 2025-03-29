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
                            <form class="form-horizontal" action="<?= base_url('admin/banner/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend><?= $title ?></legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            Tiêu đề
                                        </label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['title'] ?>" placeholder="" type="text" id="title" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            Mô tả
                                        </label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['description'] ?>" placeholder="" type="text" id="description" name="description">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            Chọn ảnh
                                        </label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="file" multiple id="images" name="images[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Hình ảnh</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <?php $array_image = explode(',', $data['images']);
                                                foreach ($array_image as $image): ?>
                                                    <div class="col-md-4">
                                                        <img width="100%" src="<?= base_url($image) ?>" alt="" srcset="">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="image_preview_container">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10" id="item_preview">

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
<?= $this->endSection(); ?>