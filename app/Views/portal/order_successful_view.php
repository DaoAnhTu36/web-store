<?= $this->extend('portal/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive" style="margin-top:100px; text-align:center">
            <div class="col-md-12">
                <?php if (isset(session()->get('web_configs')['logo_order_successful'])): ?>
                    <img src="<?= base_url(session()->get('web_configs')['logo_order_successful']) ?>" alt="" srcset="">
                <?php endif ?>
            </div>
            <div class="col-md-12">
                <h1>Đặt hàng thành công</h1>
            </div>
            <div class="col-md-12">
                <p>
                    Đơn hàng của bạn đang trong thời gian phê duyệt. <strong>Peatun Essence of Nature</strong> sẽ liên hệ sớm với quý khách. Trân trọng cảm ơn!
                </p>
            </div>
            <div class="col-md-12">
                <a href="<?= base_url('portal/home') ?>" class="btn border-secondary rounded-pill px-4 py-3 text-primary">
                    Tiếp tục mua hàng
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->
<?= $this->endSection(); ?>