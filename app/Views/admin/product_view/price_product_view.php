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
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá bán hiện tại</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $idx = 1;
                                    foreach ($data as $item) { ?>
                                        <tr title="Chọn để xem lịch sử giá sản phẩm">
                                            <td><?= $idx ?></td>
                                            <td><?= $item['product_id'] ?></td>
                                            <td><?= $item['product_name'] ?></td>
                                            <td><?= number_format($item['price'], 0, ',', '.'); ?> ₫</td>
                                            <td><?= $item['start_date'] == '0000-00-00' ? 'Không xác định' : $item['start_date'] ?></td>
                                            <td><?= $item['end_date'] ?? 'Không xác định' ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-xs" onclick="onShowHistoryPrice(<?= $item['product_id'] ?>)"><i class="fa fa-eye"></i></button>
                                            </td>
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

<!-- Bootstrap Modal -->
<div class="modal fade" id="modal-history-price" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lịch sử giá sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="tbl-transactions" class="table table-striped table-bordered table-hover" width="100%">
                    <caption><strong>Lịch sử giao dịch</strong></caption>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Giá</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <table id="tbl-product-prices" class="table table-striped table-bordered table-hover" width="100%">
                    <caption><strong>Lịch sử giá</strong></caption>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Giá</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function onShowHistoryPrice(product_id) {
        $.ajax({
            url: '<?= site_url('admin/product/show-history-price') ?>',
            type: 'POST',
            data: {
                product_id: product_id
            },
            success: function(response) {
                response.data.price_transaction_detail.forEach((item, idx) => {
                    $('#modal-history-price #tbl-transactions tbody').append(`
                        <tr>
                            <td>${idx + 1}</td>
                            <td>${formatCurrency(item.price,getDefaultSymbolCurrency())}</td>
                            <td>${item.created_at}</td>
                            <td>${item.is_active == 1 ? '<span class="label label-success">Hoạt động</span>' : '<span class="label label-danger">Không hoạt động</span>'}</td>
                        </tr>
                    `);
                });
                response.data.price_product_prices.forEach((item, idx) => {
                    $('#modal-history-price #tbl-product-prices tbody').append(`
                        <tr>
                            <td>${idx + 1}</td>
                            <td>${formatCurrency(item.price,getDefaultSymbolCurrency())}</td>
                            <td>${item.created_at}</td>
                            <td>${item.is_active == 1 ? '<span class="label label-success">Hoạt động</span>' : '<span class="label label-danger">Không hoạt động</span>'}</td>
                        </tr>
                    `);
                });
                $('#modal-history-price').modal('show');
            }
        });
    }
</script>
<?= $this->endSection(); ?>