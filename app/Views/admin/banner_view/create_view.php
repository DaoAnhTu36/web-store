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
                            <form class="form-horizontal" id="form-create" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới banner</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            Tiêu đề
                                        </label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="title" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            Mô tả
                                        </label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="description" name="description">
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
                                </fieldset>
                                <?= view("admin/Layouts/group_button_action_form_view.php", ['function' => 'onSubmitCreate()', 'label' => 'Lưu']) ?>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script>
    function onSubmitCreate() {
        let title = $("#title").val();
        let description = $("#description").val();
        let images = $("#images")[0].files;
        let formData = new FormData();
        formData.append('title', title);
        formData.append('description', description);
        for (let i = 0; i < images.length; i++) {
            formData.append('images[]', images[i]);
        }

        $.ajax({
            url: '<?= base_url('admin/banner/save') ?>',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status) {
                    onToastrSuccess(response.message);
                } else {
                    onToastrError(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>
<?= $this->endSection(); ?>