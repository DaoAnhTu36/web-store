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

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-12">


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


                        <div class="jarviswidget-editbox">


                        </div>



                        <div class="widget-body">

                            <form class="form-horizontal" action="<?= base_url('admin/email-template/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <!-- <legend>Thêm mới danh mục</legend> -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên định danh</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tiêu đề mail</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="subject" name="subject">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nội dung mail</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="description_ckeditor" name="body"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="button">
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
            <!-- WIDGET END -->
        </div>

    </section>
</div>


<?= $this->endSection(); ?>