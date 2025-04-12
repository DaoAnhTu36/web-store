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
                                            <input type="datetime-local" class="form-control" value="<?= get_current_datetime_local() ?>" placeholder="" id="transaction_date" name="transaction_date" />
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
                                        <label class="col-md-2 control-label">Kho hàng</label>
                                        <div class="col-md-10">
                                            <select class="form-control" value="" placeholder="" id="warehouse_id" name="warehouse_id">
                                                <?php foreach ($warehouses as $warehouse) : ?>
                                                    <option value="<?= $warehouse['id'] ?>"><?= $warehouse['name'] ?></option>
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
                                            <input type="hidden" id="product_id" name="product_id">
                                            <input type="text" name="product_input" id="product_input" class="form-control" placeholder="Nhập tên hàng hóa" list="product_list" onkeyup="onGetAttributeProduct()" />
                                            <datalist id="product_list">
                                                <?php foreach ($products as $product) : ?>
                                                    <option data-id="<?= $product['id'] ?>" value="<?= $product['name'] ?>"><?= $product['name'] . ' - ' . $product['category_name'] . ' - ' . $product['total_quantity'] ?></option>
                                                <?php endforeach; ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group" id="attribute-product" style="display: none;">
                                        <label class="col-md-2 control-label">Thuộc tính</label>
                                        <div class="col-md-10">
                                            <div class="row" id="product-attribute-value">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số lượng</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="10" placeholder="Nhập số lượng" id="quantity" name="quantity" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Đơn giá</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="3000" placeholder="Nhập đơn giá" id="unit_price" name="unit_price" />
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
                                            <th>Thuộc tính</th>
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
                                                <span id="saveBtnText">Lưu</span>
                                                <span id="saveBtnLoader" class="spinner-border spinner-border-sm ms-2" style="display:none;" role="status"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>


                </div>

            </article>

        </div>

    </section>
</div>
<script>
    const labelUpdate = 'Cập nhật';
    const labelSaveTemp = 'Thêm';
    let labelButton = labelSaveTemp;
    let dataTransDetail = [];
    let indexEdit = 0;
    let productArray = <?php echo json_encode($products); ?>;
    let productAttributeList = [];

    function addTransDetailTemp() {
        let product_attribute_id = '';
        const productAttributeId = document.querySelector('input[name="product_attribute_id"]:checked');
        if (productAttributeId) {
            product_attribute_id = productAttributeId.value;
        }
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
            "product_attribute_id": product_attribute_id,
        };
        if (labelButton === labelSaveTemp) {
            const indexItemExist = dataTransDetail.findIndex(x => x.product_id === product_id && x.product_attribute_id === product_attribute_id);
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
        $('#product_input').val('');
        $('#product-attribute-value').html('');
        $("#attribute-product").slideUp();
        labelButton = labelSaveTemp;
        renderLabelButton();
    }

    function editTransDetail(idx) {
        indexEdit = idx - 1;
        const item = dataTransDetail[idx - 1];
        $('#product_id').val(item.product_id);
        $('#quantity').val(item.quantity);
        $('#unit_price').val(item.unit_price);
        $('#product_input').val(productArray.find(x => x.id === item.product_id).name);
        labelButton = labelUpdate;
        $('#product_input').keyup();

        setTimeout(() => {
            document.querySelectorAll('input[name="product_attribute_id"]').forEach(element => {
                if (element.value == item.product_attribute_id) {
                    element.checked = true;
                }
            });
        }, 200);

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
            let productAttributeName = productAttributeList.find(x => x.id === element.product_attribute_id)?.attribute_value;
            let productName = productArray.find(x => x.id === element.product_id).name;
            $("table.table-realtime-data tbody").append(`
                <tr>
                    <td>${idx}</td>
                    <td>${productName}</td>
                    <td>${productAttributeName}</td>
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
        $('#saveBtnText').text('Đang lưu...');
        $('#saveBtnLoader').show();
        let requestData = {
            transaction_type: $("#transaction_type").val(),
            transaction_date: $("#transaction_date").val(),
            supplier_id: $("#supplier_id").val(),
            warehouse_id: $("#warehouse_id").val(),
            list_trans_detail: dataTransDetail
        };
        $.ajax({
            url: '<?= base_url('admin/transaction/save') ?>',
            type: 'POST',
            data: requestData,
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

    document.getElementById('product_input').addEventListener('input', function() {
        const input = this.value;
        const options = document.querySelectorAll('#product_list option');
        const hiddenInput = document.getElementById('product_id');
        hiddenInput.value = ''; // Reset
        options.forEach(option => {
            if (option.value === input) {
                hiddenInput.value = option.getAttribute('data-id');
            }
        });
    });


    function onGetAttributeProduct() {
        let product_id = $('#product_id').val();
        if (product_id === '') {
            $('#product-attribute-value').html('');
            $("#attribute-product").slideUp();
            return;
        }
        $.ajax({
            url: '<?= base_url('admin/product-attribute-value/get-product-attribute-value') ?>',
            type: 'POST',
            data: {
                product_id: product_id
            },
            success: function(response) {
                if (response.length === 0) {
                    $('#product-attribute-value').html('');
                    $("#attribute-product").slideUp();
                    return;
                }
                productAttributeList = response;
                $("#attribute-product").slideDown();
                let html = '';
                response.forEach(element => {
                    html += `
                            <div class="col-md-3">
                                <input type="radio" name="product_attribute_id" value="${element.id}"> ${element.attribute_value}
                            </div>
                    `;
                });
                $('#product-attribute-value').html(html);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>

<?= $this->endSection(); ?>