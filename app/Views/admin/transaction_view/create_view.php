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

                            <form class="form-horizontal">
                                <fieldset>
                                    <legend>Thông tin giao dịch</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Loại giao dịch</label>
                                        <div class="col-md-10">
                                            <select class="form-control" value="" placeholder="" id="transaction_type" name="transaction_type">
                                                <option value="import">Nhập</option>
                                                <option value="export">Xuất</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ngày giao dịch</label>
                                        <div class="col-md-10">
                                            <input type="date" class="form-control" value="" placeholder="" id="transaction_date" name="transaction_date" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên nhà cung cấp</label>
                                        <div class="col-md-10">
                                            <select class="form-control" value="" placeholder="" id="supplier_id" name="supplier_id">
                                                <?php foreach ($suppliers as $supplier) : ?>
                                                    <option value="<?= $supplier['id'] ?>"><?= $supplier['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên khách hàng</label>
                                        <div class="col-md-10">
                                            <select class="form-control" value="" placeholder="" id="customer_id" name="customer_id">
                                                <?php foreach ($customers as $customer) : ?>
                                                    <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Thông tin chi tiết giao dịch</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên hàng hóa</label>
                                        <div class="col-md-10">
                                            <select class="form-control" value="" placeholder="" id="product_id" name="product_id">
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số lượng</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="" placeholder="" id="quantity" name="quantity" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Đơn giá</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="" placeholder="" id="unit_price" name="unit_price" />
                                        </div>
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="button">
                                                Hủy
                                            </button>
                                            <button class="btn btn-primary" type="button" onclick="addTransDetailTemp()">
                                                <i class="fa fa-plus"></i>
                                                <span id="label_button">Thêm</span>
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%"> -->
                                <table id="" class="table table-striped table-bordered table-hover table-realtime-data" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã hàng hóa</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div id="group-button-transaction" class="form-actions" style="text-align: center; display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="button">
                                                Hủy
                                            </button>
                                            <button class="btn btn-primary" onclick="onSubmit()" type="button">
                                                <i class="fa fa-save"></i>
                                                Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script>
    const labelUpdate = 'Cập nhật';
    const labelSaveTemp = 'Thêm';
    var labelButton = labelSaveTemp
    var dataTransDetail = [];
    var indexEdit = 0;

    function addTransDetailTemp() {
        let product_id = $('#product_id').val();
        let quantity = $('#quantity').val();
        let unit_price = $('#unit_price').val();
        if (product_id === '' || quantity === '' || unit_price === '') {
            return;
        }

        let data = {
            "product_id": product_id,
            "quantity": parseFloat(quantity),
            "unit_price": parseFloat(unit_price),
        };
        if (labelButton === labelSaveTemp) {
            const indexItemExist = dataTransDetail.findIndex(x => x.product_id === product_id);
            if (indexItemExist === -1) {
                dataTransDetail.push(data);
            } else {
                data.quantity += dataTransDetail[indexItemExist].quantity;
                if (confirm('Hàng hóa đã tồn tại! Bạn có muốn cập nhật số lượng không?')) {
                    dataTransDetail.splice(indexItemExist, 1, data);
                } else {
                    return;
                }
            }
        } else {
            dataTransDetail.splice(indexEdit, 1, data)
        }
        renderDataTransDetail();
        $('#product_id').val('');
        $('#quantity').val('');
        $('#unit_price').val('');
        labelButton = labelSaveTemp;
        renderLabelButton();
    }

    function editTransDetail(idx) {
        indexEdit = idx - 1;
        const item = dataTransDetail[idx - 1];
        $('#product_id').val(item.product_id);
        $('#quantity').val(item.quantity);
        $('#unit_price').val(item.unit_price);
        labelButton = labelUpdate;
        renderLabelButton()
    }

    function deleteTransDetail(idx) {
        if (confirm('Bạn chắc chắn muốn xóa dữ liệu này không?')) {
            dataTransDetail.splice(idx - 1, 1);
            renderDataTransDetail();
        }
    }

    function renderDataTransDetail() {
        $("table.table-realtime-data tbody").empty();
        let idx = 1;
        let formatter = new Intl.NumberFormat('vi-VN');
        dataTransDetail.forEach(element => {
            let sub_total = parseFloat(element.quantity) * parseFloat(element.unit_price);
            $("table.table-realtime-data tbody").append(`
                <tr>
                    <td>${idx}</td>
                    <td>${element.product_id}</td>
                    <td>${formatter.format(element.quantity)}</td>
                    <td>${formatter.format(element.unit_price)} ₫</td>
                    <td>${formatter.format(sub_total)} ₫</td>
                    <td class="action-icons">
                        <a href="javascript:void(0)" class="btn btn-default" onclick="editTransDetail(${idx})"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" onclick="deleteTransDetail(${idx})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            `);
            idx++;
        });
        if (dataTransDetail.length === 0) {
            $("table#dt_basic tbody").html(`<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>`);
            $("#group-button-transaction").css('display', 'none');
        } else {
            $("#group-button-transaction").css('display', 'block');
        }
    }

    function renderLabelButton() {
        $("#label_button").html(labelButton);
    }

    function onSubmit() {
        $.ajax({
            url: '<?= base_url('admin/transaction/save') ?>',
            type: 'POST',
            data: {
                transaction_type: $("#transaction_type").val(),
                transaction_date: $("#transaction_date").val(),
                customer_id: $("#customer_id").val(),
                supplier_id: $("#supplier_id").val(),
                list_trans_detail: dataTransDetail
            },
            success: function(response) {
                Toastify({
                    text: response.message,
                    duration: 1500,
                    callback: function() {
                        window.location.reload(true);
                    }
                }).showToast();
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });

    }
</script>
<!-- END MAIN CONTENT -->
<?= $this->endSection(); ?>