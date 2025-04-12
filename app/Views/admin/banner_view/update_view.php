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
                            <form method="POST" action="<?= base_url('admin/banner/update/' . $data['id']) ?>" class="form-horizontal" id="form-create" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới banner</legend>
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
                                            <textarea class="form-control" value="<?= $data['description'] ?>" placeholder="" type="text" id="description" name="description"></textarea>
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
                                    <div class="form-group" id="image_preview_container">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10" id="item_preview">

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
                                </fieldset>
                                <?= view(
                                    "admin/Layouts/group_button_action_form_view.php",
                                    [
                                        'type_button' => "submit",
                                        'label' => 'Cập nhật'
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
<script src="<?= base_url('services/banner_service.js') ?>"></script>
<?= $this->endSection(); ?>