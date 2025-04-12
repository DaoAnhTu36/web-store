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

                            <form class="form-horizontal" action="<?= base_url('admin/product-discount/update/' . $product_discounts[0]['product_discount_id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thêm mới sản phẩm khuyến mại</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tiêu đề</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $product_discounts[0]['product_discount_name'] ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Chương trình KM</label>
                                        <div class="col-md-10">
                                            <select name="discount_id" id="discount_id" class="form-control">
                                                <?php foreach ($discounts as $item) { ?>
                                                    <?php if ($product_discounts[0]['discount_id'] == $item['id']) { ?>
                                                        <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Danh sách sản phẩm</label>
                                        <div class="col-md-10">
                                            <?php foreach ($products as $item) { ?>
                                                <div class="col-md-6">
                                                    <?php if (in_array($item['product_id'], array_column($product_discounts, 'product_id'))) { ?>
                                                        <input onclick="onUpdateListProductDiscount(<?= $product_discounts[0]['product_discount_id'] ?>, <?= $item['id'] ?>)" checked type="checkbox" name="product_ids[]" id="" value="<?= $item['id'] ?>">
                                                    <?php } else { ?>
                                                        <input onclick="onUpdateListProductDiscount(<?= $product_discounts[0]['product_discount_id'] ?>, <?= $item['id'] ?>)" type="checkbox" name="product_ids[]" id="" value="<?= $item['id'] ?>">
                                                    <?php } ?>
                                                    <label for="product_ids"><?= $item['name'] ?></label>
                                                </div>
                                            <?php } ?>
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
                                                Cập nhật
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
    function onUpdateListProductDiscount(product_discount_id, product_id) {
        $.ajax({
            url: '<?= base_url('admin/product-discount/update-product-discount-detail') ?>',
            type: 'POST',
            data: {
                product_discount_id: product_discount_id,
                product_id: product_id
            },
            success: function(response) {
                Toastify({
                    text: response.message ?? 'Thành công',
                    duration: 1500,
                }).showToast();
            }
        });
    }
</script>
<?= $this->endSection(); ?>