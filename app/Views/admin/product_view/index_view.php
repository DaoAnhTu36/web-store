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
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-table fa-fw "></i>
                Danh sách sản phẩm
                <!-- <span>>
                    Normal Tables
                </span> -->
            </h1>
        </div>
        <!-- <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <ul id="sparks" class="">
                <li class="sparks-info">
                    <h5> My Income <span class="txt-color-blue">$47,171</span></h5>
                    <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
                        1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
                    </div>
                </li>
                <li class="sparks-info">
                    <h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
                    <div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
                        110,150,300,130,400,240,220,310,220,300, 270, 210
                    </div>
                </li>
                <li class="sparks-info">
                    <h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
                    <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
                        110,150,300,130,400,240,220,310,220,300, 270, 210
                    </div>
                </li>
            </ul>
        </div> -->
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">


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
                                    <th>Tên sản phẩm</th>
                                    <th>ID Danh mục</th>
                                    <th>Giá</th>
                                    <th>Số lượng tồn</th>
                                    <!-- <th>Mô tả</th> -->
                                    <th>Ảnh</th>
                                    <th>Thời gian tạo</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $item) {
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['category_id'] ?></td>
                                        <td><?= number_format($item['price'], 0, ',', '.'); ?> ₫</td>
                                        <td><?= number_format($item['stock'], 0, ',', '.'); ?></td>
                                        <!-- <td><?= $item['description'] ?></td> -->
                                        <td>
                                            <?php
                                            $images = trim(explode(', ', $item['images'])[0]);
                                            ?>
                                            <img src="<?= base_url($images) ?>" alt="" width="50">
                                            <?php  ?>
                                        </td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td class="action-icons">
                                            <a href="<?= site_url('admin/product/detail/' . $item['id']); ?>" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?= site_url('admin/product/detail/' . $item['id']); ?>" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?= site_url('admin/product/delete/' . $item['id']); ?>" class="btn btn-default" onclick="return confirm('Bạn có chắc muốn xóa?');"><i class="fa fa-trash" aria-hidden="true"></i></a>

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

        <!-- end row -->

    </section>
    <!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->

<?= $this->endSection(); ?>