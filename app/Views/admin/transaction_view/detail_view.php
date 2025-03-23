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
                    <?= $title ?>
                    <!-- <span>>
                    Normal Tables
                </span> -->
                </h1>
            </div>

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-12">

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

                            <form class="form-horizontal" action="<?= base_url('admin/category/save'); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mã giao dịch</label>
                                        <div class="col-md-10">
                                            <input readonly class="form-control" value="<?= $transaction['trans_id'] ?>" placeholder="" type="text" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ngày giao dịch</label>
                                        <div class="col-md-10">
                                            <input readonly class="form-control" value="<?= $transaction['transaction_date'] ?>" placeholder="" type="text" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên nhà cung cấp</label>
                                        <div class="col-md-10">
                                            <input readonly class="form-control" value="<?= $transaction['supplier_name'] ?>" placeholder="" type="text" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên kho hàng</label>
                                        <div class="col-md-10">
                                            <input readonly class="form-control" value="<?= $transaction['warehouse_name'] ?>" placeholder="" type="text" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ngày tạo</label>
                                        <div class="col-md-10">
                                            <input readonly class="form-control" value="<?= $transaction['created_at'] ?>" placeholder="" type="text" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ngày cập nhật</label>
                                        <div class="col-md-10">
                                            <input readonly class="form-control" value="<?= $transaction['updated_at'] ?>" placeholder="" type="text" id="" name="">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã chi tiết dịch</th>
                                        <th>Mã hàng hóa</th>
                                        <th>Tên hàng hóa</th>
                                        <th>Thuộc tính</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $idx = 1;
                                    foreach ($transactionDetail as $transDetail): ?>
                                        <tr>
                                            <td><?= $idx ?></td>
                                            <td><?= $transDetail['trans_detail_id'] ?></td>
                                            <td><?= $transDetail['product_id'] ?></td>
                                            <td><?= $transDetail['product_name'] ?></td>
                                            <td><?= $transDetail['attribute_value'] ?></td>
                                            <td><?= $transDetail['quantity'] ?></td>
                                            <td><?= number_format($transDetail['unit_price'], 0, ',', '.'); ?> ₫</td>
                                            <td><?= number_format($transDetail['subtotal'], 0, ',', '.'); ?> ₫</td>
                                        </tr>
                                    <?php $idx++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->

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