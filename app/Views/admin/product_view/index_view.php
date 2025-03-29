<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<!-- MAIN CONTENT -->
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
    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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

                    <!-- widget div-->
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
                                                    <img src="<?= base_url($item['image']) ?>" alt="" width="50">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <label class="switch1">
                                                    <?php if ($item['is_active']) { ?>
                                                        <input class="switch-button" type="checkbox" checked onclick="onChangeStatus(<?= $item['id'] ?>)">
                                                    <?php } else { ?>
                                                        <input class="switch-button" type="checkbox" onclick="onChangeStatus(<?= $item['id'] ?>)">
                                                    <?php } ?>
                                                    <span class="slider1"></span>
                                                </label>
                                            </td>
                                            <td class="action-icons">
                                                <a href="<?= site_url('admin/product/detail/' . $item['id']); ?>" class="btn btn-info item-action"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="<?= base_url('admin/product/delete/' . $item['id']); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    }  ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->
            </div>
        </div>
        <!-- end row -->
    </section>
    <!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
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
                        <div class="form-group">
                            <label class="col-md-2 control-label">Giá bán</label>
                            <div class="col-md-10">
                                <input class="form-control" value="" placeholder="" type="text" id="price" name="price">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">
                                    Hủy
                                </button>
                                <button class="btn btn-primary" type="button" onclick="savePrice()">
                                    <i class="fa fa-save"></i>
                                    Lưu
                                </button>
                            </div>
                        </div>
                    </div>
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
                let formatter = new Intl.NumberFormat('vi-VN');
                let html = '';
                if (Array.isArray(response.data) && response.data.length > 0) {
                    response.data.forEach((item, index) => {
                        html += '<tr>';
                        html += '<td>' + (index + 1) + '</td>';
                        html += '<td>' + formatter.format(item.unit_price) + ' ₫</td>';
                        html += '<td>' + item.created_at + '</td>';
                        html += '</tr>';
                    });
                    $("#detailModal tbody").html(html);
                    $('#detailModal').modal('show');
                }
            }
        });
    }

    function savePrice() {
        let price = $('#price').val();
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
                    Toastify({
                        text: response.message ?? 'Thành công',
                        duration: 1500,
                    }).showToast();
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>