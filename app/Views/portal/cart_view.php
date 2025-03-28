<?= $this->extend('portal/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <a href="<?= base_url('portal/home') ?>" style="margin-top:100px" class="btn border-secondary rounded-pill px-4 py-3 text-primary">Tiếp tục mua hàng</a>
            <?php if (session()->get('cart')): ?>
                <a href="<?= base_url('portal/cart-client/clear-cart') ?>" style="margin-top:100px" class="btn border-secondary rounded-pill px-4 py-3 text-danger">Xóa giỏ hàng</a>
            <?php endif ?>
            <table class="table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $idx = 1;
                        foreach ($cart as $item) { ?>
                            <tr class="table-cart-<?= $item['id'] ?>">
                                <td>
                                    <p class="mb-0 mt-4"><?= $idx ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?= $item['name'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?= format_currency($item['price'], get_current_symboy()) ?></p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button onclick="onChangeQuantity('<?= $item['id'] ?>','-')" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" id="quantity-<?= $item['id'] ?>" class="form-control form-control-sm text-center border-0" value="<?= format_currency($item['quantity']) ?>">
                                        <div class="input-group-btn">
                                            <button onclick="onChangeQuantity('<?= $item['id'] ?>','+')" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4 item-cart-<?= $item['id'] ?>"><?= format_currency($item['sub_total'], get_current_symboy()) ?></p>
                                </td>
                                <td>
                                    <button onclick="removeItemCart('<?= $item['id'] ?>')" class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>
                        <?php $idx++;
                        } ?>
                    </tbody>
                </table>
        </div>
        <div class="mt-5">
            <input type="text" style="outline: none;padding-left:15px" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Nhập mã giảm giá">
        </div>
        <div class="row g-4 justify-content-end">
            <form action="<?= site_url('admin/order/complete') ?>" method="POST">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Họ và tên</label>
                                <input type="full_name" name="full_name" class="form-control" value="<?= isset(session()->get('customer_infor')['first_name']) ? session()->get('customer_infor')['first_name'] . ' ' . session()->get('customer_infor')['last_name'] : '' ?>" id="full_name" placeholder="">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= isset(session()->get('customer_infor')['email']) ? session()->get('customer_infor')['email'] : '' ?>" id="email" placeholder="">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Số điện thoại</label>
                                <input type="phone" name="phone" class="form-control" value="<?= isset(session()->get('customer_infor')['phone']) ? session()->get('customer_infor')['phone'] : '' ?>" id="phone" placeholder="">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Địa chỉ nhận hàng</label>
                                <input type="address" name="address" class="form-control" value="<?= isset(session()->get('customer_infor')['address']) ? session()->get('customer_infor')['address'] : '' ?>" id="address" placeholder="">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="" class="form-label">Ghi chú</label>
                                <textarea class="form-control" id="note" value="" name="note" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Đơn hàng</h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Tổng tiền:</h5>
                                    <p class="mb-0" id="total_cart"><?= $total_cart ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Phi giao hàng</h5>
                                    <div class="">
                                        <p class="mb-0">Miễn phí</p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Tổng</h5>
                                <p class="mb-0 pe-4" id="total_cart_with_fee"><?= $total_cart ?></p>
                            </div>
                            <button onclick="return validateCustomerOrder();" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('libs/portal/js/cart.js') ?>"></script>
<!-- Cart Page End -->
<?= $this->endSection(); ?>