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
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-list-alt fa-fw "></i>
                <?= $title ?>
                <!-- <span>>
                    Normal Tables
                </span> -->
            </h1>
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">


            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">

                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Ngày giao dịch</th>
                                    <th>Mã nhà cung cấp</th>
                                    <th>Mã khách hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idx = 1;
                                foreach ($data as $item) { ?>
                                    <tr>
                                        <td><?= $idx ?></td>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['transaction_date'] ?></td>
                                        <td><?= $item['supplier_id'] ?></td>
                                        <td><?= $item['customer_id'] ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td><?= $item['updated_at'] ?></td>
                                    </tr>
                                <?php $idx++;
                                } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </div>

        <!-- end row -->

    </section>
    <!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->

<?= $this->endSection(); ?>