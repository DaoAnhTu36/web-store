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

                            <form class="form-horizontal" action="<?= base_url('admin/discount/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới khuyến mại</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên chương trình KM</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['name'] ?>" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Loại KM</label>
                                        <div class="col-md-10">
                                            <select name="discount_type_id" id="discount_type_id" class="form-control">
                                                <?php foreach ($discount_types as $item) { ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Giá trị</label>
                                        <div class="col-md-10">
                                            <input class="form-control currency-input" value="<?= convert_decimal_to_int($data['discount_value']); ?>" placeholder="" type="text" id="discount_value" name="discount_value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Giá trị tối thiểu đơn hàng</label>
                                        <div class="col-md-10">
                                            <input class="form-control currency-input" value="<?= convert_decimal_to_int($data['min_order_amount']); ?>" placeholder="" type="text" id="min_order_amount" name="min_order_amount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Giá trị tối đa của KM</label>
                                        <div class="col-md-10">
                                            <input class="form-control currency-input" value="<?= convert_decimal_to_int($data['max_discount']); ?>" placeholder="" type="text" id="max_discount" name="max_discount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mã giảm giá</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['coupon_code'] ?>" placeholder="" type="text" id="coupon_code" name="coupon_code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thời gian bắt đầu</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= format_datetime_input($data['start_date']); ?>" placeholder="" type="datetime-local" id="start_date" name="start_date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thời gian kết thúc</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= format_datetime_input($data['end_date']); ?>" placeholder="" type="datetime-local" id="end_date" name="end_date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số lượng giới hạn</label>
                                        <div class="col-md-10">
                                            <input class="form-control currency-input" value="<?= $data['usage_limit'] ?>" placeholder="" type="text" id="usage_limit" name="usage_limit">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" type="submit">
                                                Hủy
                                            </button>
                                            <button class="btn btn-primary" type="submit">
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
<!-- END MAIN CONTENT -->
<?= $this->endSection(); ?>