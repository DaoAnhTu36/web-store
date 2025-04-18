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
                    <a href="<?= site_url('admin/product/create'); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
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
                                        <th>#</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data as $item) {
                                    ?>
                                        <tr onclick="profile_product(<?= $item['id'] ?>)">
                                            <td><?= $i ?></td>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['category_name'] ?></td>
                                            <td>
                                                <?php if ($item['image'] != '') : ?>
                                                    <img src="<?= base_url($item['image']) ?>" alt="<?= $item['name'] ?>" width="50">
                                                <?php endif; ?>
                                                <!-- <?php if ($item['images'] != '') : ?>
                                                    <?php if (count(explode(',', $item['images'])) > 0) : ?>
                                                        <img src="<?= base_url(explode(',', $item['images'])[0]) ?>" alt="<?= $item['name'] ?>" width="50">
                                                    <?php endif ?>
                                                <?php endif; ?> -->
                                            </td>
                                            <td>
                                                <?= view(
                                                    "admin/Layouts/button_active_index_view.php",
                                                    [
                                                        'is_active' => $item['is_active'],
                                                        'id' => $item['id'],
                                                    ]
                                                ) ?>
                                            </td>
                                            <td class="action-icons">
                                                <?= view(
                                                    "admin/Layouts/group_button_action_index_view.php",
                                                    [
                                                        'uri_update' => site_url('admin/product/detail/' . $item['id']),
                                                        'uri_delete' => site_url('admin/product/delete/' . $item['id']),
                                                    ]
                                                ) ?>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    }  ?>
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
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lịch sử giá sản phẩm nhập hàng</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Giá</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group" id="form-current-price" style="display: none;">
                            <label class="col-md-4 control-label text-left">Giá bán hiện tại</label>
                            <div class="col-md-6">
                                <input class="form-control currency-input" disabled value="" placeholder="" type="text" id="current_price" name="current_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label text-left">Thay đổi giá bán</label>
                            <div class="col-md-6">
                                <input class="form-control currency-input" value="" placeholder="" type="text" id="price" name="price">
                            </div>
                        </div>
                    </fieldset>
                    <?= view(
                        "admin/Layouts/group_button_action_form_view.php",
                        [
                            'function' => "savePrice()",
                            'label' => 'Cập nhật',
                            'function_back' => "onCloseModal()"
                        ]
                    ) ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var product_id = 0;

    function profile_product(id) {
        product_id = id;
        if ($(event.target).closest('.switch-button, .slider1, .switch1').length >= 1) {
            return;
        }

        $.ajax({
            url: '<?= site_url('admin/transaction/get-price-history') ?>',
            type: 'POST',
            data: {
                product_id: id
            },
            success: function(response) {
                let html = '';
                if (Array.isArray(response.data.history_price) && response.data.history_price.length > 0) {
                    response.data.history_price.forEach((item, index) => {
                        html += '<tr></tr><td>' + (index + 1) + '</td>';
                        html += '<td>' + formatCurrency(item.unit_price, getDefaultSymbolCurrency()) + ' </td>';
                        html += '<td>' + item.created_at + '</td></tr>';
                    });
                    if (response.data.current_price && response.data.current_price != null && response.data.current_price.price !== '') {
                        $("#form-current-price").show();
                        $("#current_price").val(formatCurrency(response.data.current_price.price))
                    } else {
                        $("#form-current-price").hide();
                        $("#current_price").val('')
                    }
                    $("#detailModal tbody").html(html);
                    $('#detailModal').modal('show');
                }
            }
        });
    }

    function savePrice() {
        let price = getValueWithoutDots(document.querySelector('#price'));
        $.ajax({
            url: '<?= site_url('admin/product/set-price-product') ?>',
            type: 'POST',
            data: {
                product_id: product_id,
                price: price
            },
            success: function(response) {
                if (response.status == true) {
                    $('#detailModal').modal('hide');
                    $('#price').val('');
                    onToastrSuccess(response.message);
                }
            }
        });
    }

    function onCloseModal() {
        $('#detailModal button[class="close"]').click();
    }
</script>
<?= $this->endSection(); ?>