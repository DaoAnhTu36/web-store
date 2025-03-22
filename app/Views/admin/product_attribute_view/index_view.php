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
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-list-alt fa-fw "></i>
                <?= $title ?>
                <!-- <span>>
                    Normal Tables
                </span> -->
            </h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well">
                <div class="btn-group">
                    <a href="<?= site_url('admin/product-attributes/create'); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
                </div>
            </div>
        </div>
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
                    <div class="widget-body">

                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">

                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên thuộc tính</th>
                                    <th>Giá trị thuộc tính</th>
                                    <th>#</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idx = 1;
                                foreach ($data as $item): ?>
                                    <tr>
                                        <td><?= $idx ?></td>
                                        <td><?= $item['attribute_name'] ?></td>
                                        <td><?= $item['attribute_value'] ?></td>
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
                                            <a href="<?= site_url('admin/product-attributes/detail/' . $item['id']); ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?= site_url('admin/product-attributes/detail/' . $item['id']); ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?= site_url('admin/product-attributes/delete/' . $item['id']); ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php $idx++;
                                endforeach ?>
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