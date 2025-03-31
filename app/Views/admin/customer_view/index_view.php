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
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Xác thực?</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idx = 1;
                                foreach ($data as $item): ?>
                                    <tr>
                                        <td><?= $idx ?></td>
                                        <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['phone'] ?></td>
                                        <td><?= $item['is_verified'] ?></td>
                                        <td>
                                            <?= view(
                                                "admin/Layouts/button_active_index_view.php",
                                                [
                                                    'is_active' => $item['is_active'],
                                                    'id' => $item['id'],
                                                ]
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php $idx++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>