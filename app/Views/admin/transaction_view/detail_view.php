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
                                        <th>Danh mục</th>
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
                                            <td><?= $transDetail['category_name'] ?></td>
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
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>