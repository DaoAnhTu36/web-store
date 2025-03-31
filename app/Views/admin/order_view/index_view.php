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
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng giá trị đơn hàng</th>
                                        <th>Thời gian đặt hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $idx = 1;
                                    foreach ($data as $item): ?>
                                        <tr onclick="getOrderDetail(<?= $item['id'] ?>)">
                                            <td><?= $idx ?></td>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['customer_first_name'] . ' ' . $item['customer_last_name'] ?></td>
                                            <td><?= format_currency($item['total_price'], get_current_symboy()) ?></td>
                                            <td><?= $item['order_created_at'] ?></td>
                                            <td><?= $item['status'] ?></td>
                                        </tr>
                                    <?php $idx++;
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="status-order"></div>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <form class="form-horizontal">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function getOrderDetail(orderId) {
        $.ajax({
            url: '<?= site_url('admin/order/get-order-detail') ?>',
            type: 'POST',
            data: {
                order_id: orderId
            },
            success: function(response) {
                let statusText = '';
                let stylehHtml = ''
                switch (response.data[0].order_status) {
                    case 'pending':
                        statusText = 'Chờ phê duyệt';
                        stylehHtml = `<div class="alert text-center alert-secondary" role="alert">{{content}}</div>`;
                        break;
                    case 'processing':
                        statusText = 'Đang đóng hàng';
                        stylehHtml = `<div class="alert text-center alert-info" role="alert">{{content}}</div>`;
                        break;
                    case 'shipped':
                        statusText = 'Đã gửi shipper';
                        stylehHtml = `<div class="alert text-center alert-warning" role="alert">{{content}}</div>`;
                        break;
                    case 'delivered':
                        statusText = 'Đã giao hàng';
                        stylehHtml = `<div class="alert text-center alert-success" role="alert">{{content}}</div>`;
                        break;
                    case 'cancelled':
                        statusText = 'Đã hủy';
                        stylehHtml = `<div class="alert text-center alert-danger" role="alert">{{content}}</div>`;
                        break;
                }
                stylehHtml = stylehHtml.replace('{{content}}', statusText);
                $('.status-order').html(stylehHtml);
                let html = '';
                if (Array.isArray(response.data) && response.data.length > 0) {
                    response.data.forEach((item, index) => {
                        html += `<tr>
                            <td>  ${index+1}  </td>
                            <td>  ${item.order_id}  </td>
                            <td>  ${item.product_name}  </td>
                            <td>  ${formatCurrency(item.price,getDefaultSymbolCurrency())}  </td>
                            <td>  ${item.quantity}  </td>
                            <td>  ${formatCurrency(item.sub_total,getDefaultSymbolCurrency())}  </td>
                        </tr>`;
                    });
                    html += `<tr>
                            <td>Trạng thái</td>
                            <td colspan="5"><button type="button" class="btn btn-default">Chờ phê duyệt</button>
                            <button type="button" onclick="onChangeOrderStatus(${response.data[0].order_id},2)" class="btn btn-primary">Đang đóng hàng</button>
                            <button type="button" onclick="onChangeOrderStatus(${response.data[0].order_id},3)" class="btn btn-info">Đã gửi shipper</button>
                            <button type="button" onclick="onChangeOrderStatus(${response.data[0].order_id},4)" class="btn btn-success">Đã giao hàng</button>
                            <button type="button" onclick="onChangeOrderStatus(${response.data[0].order_id},5)" class="btn btn-danger">Đã hủy</button></td>
                    </tr>`
                    $("#detailModal tbody").html(html);
                    $('#detailModal').modal('show');
                } else {
                    $("#detailModal tbody").html('<tr><td colspan="6">Không có dữ liệu chi tiết đơn hàng.</td></tr>');
                    $('#detailModal').modal('show');
                }
            }
        });
    }

    function onChangeOrderStatus(order_id, status) {
        $.ajax({
            url: '<?= site_url('admin/order/change-status-order') ?>',
            type: 'POST',
            data: {
                order_id,
                status
            },
            success: function(response) {
                if (response.status) {
                    onToastrSuccess(response.message);
                    $('#detailModal').modal('hide');
                } else {
                    onToastrError(response.message);
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>