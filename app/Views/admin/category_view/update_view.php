<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div id="flash-message" class="alert alert-danger">
        <?= session()->getFlashdata('errors'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div id="flash-message" class="alert alert-success">
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
                    <?= $title_label ?>
                    <!-- <span>>
                    Normal Tables
                </span> -->
                </h1>
            </div>

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-6">

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

                            <form class="form-horizontal" action="<?= base_url('admin/category/updateMethod'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend><?= $title_info_label ?></legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><?= $name_label ?></label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['name'] ?>" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><?= $image_label ?></label>
                                        <div class="col-md-10">
                                            <input type="file" class="btn btn-default" id="images" name="images[]" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><?= $description_label ?></label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="description_record" name="description_record">
                                            <?= $data['description'] ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="submit">
                                                <?= $cancel_button_label ?>
                                            </button>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-save"></i>
                                                <?= $save_button_label ?>
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

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-6">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false">
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

                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="superbox col-sm-12">
                                <?php $images = explode(', ', $data['images']);
                                foreach ($images as $img) : ?>
                                    <div class="superbox-list">
                                        <img src="<?= base_url($img) ?>" data-img="<?= base_url($img) ?>" alt="<?= base_url($img) ?>" title="<?= base_url($img) ?>" width="100px" height="100px" />
                                    <?php endforeach
                                    ?>
                                    </div>
                                    <div class="superbox-float"></div>
                            </div>
                        </div>
                        <!-- end widget content -->

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                            <!-- /SuperBox -->

                            <div class="superbox-show" style="height:300px; display: none"></div>
                        </div>
                        <!-- end widget edit box -->

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