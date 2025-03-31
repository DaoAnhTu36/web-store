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
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">
                            <form class="form-horizontal" action="<?= base_url('admin/discount/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới khuyến mại</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tên chương trình KM</label>
                                        <div class="col-md-4">
                                            <input class="form-control" value="<?= $data['name'] ?>" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Loại KM</label>
                                        <div class="col-md-4">
                                            <select name="discount_type_id" id="discount_type_id" class="form-control">
                                                <?php foreach ($discount_types as $item) { ?>
                                                    <option <?= $item['id'] == $data['discount_type_id'] ? 'selected' : '' ?> value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Giá trị</label>
                                        <div class="col-md-4">
                                            <input class="form-control currency-input" value="<?= format_currency(convert_decimal_to_int($data['discount_value'])); ?>" placeholder="" type="text" id="discount_value" name="discount_value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Giá trị tối thiểu đơn hàng</label>
                                        <div class="col-md-4">
                                            <input class="form-control currency-input" value="<?= format_currency(convert_decimal_to_int($data['min_order_amount'])); ?>" placeholder="" type="text" id="min_order_amount" name="min_order_amount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Giá trị tối đa của KM</label>
                                        <div class="col-md-4">
                                            <input class="form-control currency-input" value="<?= format_currency(convert_decimal_to_int($data['max_discount'])); ?>" placeholder="" type="text" id="max_discount" name="max_discount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Mã giảm giá</label>
                                        <div class="col-md-4">
                                            <input class="form-control" value="<?= $data['coupon_code'] ?>" placeholder="" type="text" id="coupon_code" name="coupon_code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Thời gian bắt đầu</label>
                                        <div class="col-md-4">
                                            <input class="form-control datetime-picker" value="<?= format_datetime_input($data['start_date']); ?>" placeholder="" type="datetime-local" id="start_date" name="start_date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Thời gian kết thúc</label>
                                        <div class="col-md-4">
                                            <input class="form-control datetime-picker" value="<?= format_datetime_input($data['end_date']); ?>" placeholder="" type="datetime-local" id="end_date" name="end_date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Số lượng giới hạn</label>
                                        <div class="col-md-4">
                                            <input class="form-control currency-input" value="<?= format_currency(convert_decimal_to_int($data['usage_limit'])); ?>" placeholder="" type="text" id="usage_limit" name="usage_limit">
                                        </div>
                                    </div>
                                </fieldset>
                                <?= view(
                                    "admin/Layouts/group_button_action_form_view.php",
                                    [
                                        'type_button' => "submit",
                                        'label' => 'Cập nhật'
                                    ]
                                ) ?>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>