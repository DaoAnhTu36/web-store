<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>

<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-list-alt fa-fw "></i>
                <?= $title ?>

            </h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well">
                <div class="btn-group">
                    <a href="<?= site_url('admin/category/create'); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
                </div>
            </div>
        </div>
    </div>

    <section id="widget-grid" class="">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <div>


                        <div class="jarviswidget-editbox">


                        </div>



                        <div class="widget-body no-padding">

                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">

                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Loại giảm giá</th>
                                        <th>Giá trị</th>
                                        <th>Thời gian tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $idx = 1;
                                    foreach ($data as $item) { ?>
                                        <tr>
                                            <td><?= $idx ?></td>
                                            <td><?= $item['product_id'] ?></td>
                                            <td><?= $item['product_name'] ?></td>
                                            <td><?= $item['start_date'] ?></td>
                                            <td><?= $item['end_date'] ?></td>
                                            <td><?= $item['discount_type'] === 'percentage' ? 'Phần trăm' : 'Cố định' ?></td>
                                            <td><?= $item['discount_value'] ?>
                                            <td><?= $item['created_at'] ?></td>
                                        </tr>
                                    <?php $idx++;
                                    } ?>
                                </tbody>
                            </table>

                        </div>


                    </div>


                </div>

            </div>
        </div>

    </section>

</div>


<?= $this->endSection(); ?>