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

                            <form class="form-horizontal" action="<?= base_url('admin/warehouse/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới kho hàng mới</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên kho</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="" placeholder="" type="text" id="location" name="location">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Người quản lý</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="account_id" id="account_id">
                                                <?php foreach ($lstAdmin as $account): ?>
                                                    <option value="<?= $account['id'] ?>"><?= $account['full_name'] ?> - <?= $account['user_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
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


<?= $this->endSection(); ?>