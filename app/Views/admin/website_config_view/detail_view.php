<?= $this->extend('admin/Layouts/main_view.php'); ?><?= $this->section('content'); ?><div id="content">
    <section id="widget-grid" class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark"> <i class="fa fa-pencil-square-o fa-fw "></i> <?= $title ?> </h1>
            </div>
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header> </header>
                    <div>
                        <div class="jarviswidget-editbox"> </div>
                        <div class="widget-body">
                            <form class="form-horizontal" action="<?= base_url('admin/website-config/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Chỉnh sửa cấu hình</legend>
                                    <div class="form-group"> <label class="col-md-2 control-label">Khóa</label>
                                        <div class="col-md-4"> <input class="form-control" value="<?= $data['config_key'] ?>" placeholder="" type="text" id="config_key" name="config_key"> </div>
                                    </div>
                                    <div class="form-group"> <label class="col-md-2 control-label">Giá trị</label>
                                        <div class="col-md-4"> <input class="form-control" value="<?= $data['config_value'] ?>" placeholder="" type="text" id="config_value" name="config_value"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="col-md-2" for="type_normal">Loại thường</label>
                                                <div class="col-md-10">
                                                    <input type="radio" <?= $data['type'] == 0 ? 'checked' : '' ?> checked class="btn btn-default" id="type_normal" name="type" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2" for="type_image">Loại ảnh</label>
                                                <div class="col-md-10">
                                                    <input type="radio" <?= $data['type'] == 1 ? 'checked' : '' ?> class="btn btn-default" id="type_image" name="type" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"> <label class="col-md-2 control-label">Mô tả</label>
                                        <div class="col-md-4"> <input class="form-control" value="<?= $data['description'] ?>" placeholder="" type="text" id="description" name="description"> </div>
                                    </div>
                                    <div class="form-group"> <label class="col-md-2 control-label">Hình ảnh</label>
                                        <div class="col-md-10"> <input type="file" class="btn btn-default" id="images" name="images[]">
                                            <p class="help-block"> Chọn ảnh dưới 150kb </p>
                                        </div>
                                    </div>
                                    <div class="form-group"> <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10"> <?php if ($data['images'] !== ''): ?> <img src="<?= base_url($data['images']) ?>" alt="" style="width: 100px; height: 100px;"> <?php endif ?> </div>
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
</div><?= $this->endSection(); ?>