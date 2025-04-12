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
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng đã bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; ?>
                                    <?php foreach ($data as $item) : ?>
                                        <tr>
                                            <td><?= $stt; ?></td>
                                            <td><?= $item['product_name']; ?></td>
                                            <td><?= $item['total_sold']; ?></td>
                                        </tr>
                                        <?php $stt++; ?>
                                    <?php endforeach ?>
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