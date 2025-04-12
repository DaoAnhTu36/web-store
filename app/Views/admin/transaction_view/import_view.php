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
                    <a href="<?= site_url('admin/transaction/create'); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
                </div>
            </div>
        </div>
    </div>


    <section id="widget-grid" class="">


        <div class="row">



            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                <div>

                    <div class="jarviswidget-editbox">

                    </div>



                    <div class="widget-body no-padding">

                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">

                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Ngày giao dịch</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Kho hàng</th>
                                    <!-- <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th> -->
                                    <th>Trạng thái</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idx = 1;
                                foreach ($data as $item) { ?>
                                    <tr>
                                        <td><?= $idx ?></td>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['transaction_date'] ?></td>
                                        <td><?= $item['supplier_name'] ?></td>
                                        <td><?= $item['warehouse_name'] ?></td>
                                        <!-- <td><?= $item['created_at'] ?></td>
                                        <td><?= $item['updated_at'] ?></td> -->
                                        <td>
                                            <label class="switch1">
                                                <?php if ($item['is_active']) { ?>
                                                    <input type="checkbox" checked onclick="onChangeStatus(<?= $item['id'] ?>)">
                                                <?php } else { ?>
                                                    <input type="checkbox" onclick="onChangeStatus(<?= $item['id'] ?>)">
                                                <?php } ?>
                                                <span class="slider1"></span>
                                            </label>
                                        </td>
                                        <td class="action-icons">
                                            <a href="<?= site_url('admin/transaction/detail/' . $item['id']); ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?= site_url('admin/transaction/detail/' . $item['id']); ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?= site_url('admin/transaction/delete/' . $item['id']); ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php $idx++;
                                } ?>
                            </tbody>
                        </table>

                    </div>


                </div>


            </div>


        </div>



    </section>

</div>


<?= $this->endSection(); ?>