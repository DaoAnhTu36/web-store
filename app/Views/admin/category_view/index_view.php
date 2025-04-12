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
                    <a href="<?= site_url('admin/category/create'); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Ảnh</th>
                                        <th>Thời gian tạo</th>
                                        <th>Trạng thái</th>
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
                                            <td>
                                                <?php
                                                $images = trim(explode(', ', $item['images'])[0]);
                                                ?>
                                                <img src="<?= base_url($images) ?>" alt="" width="50">
                                                <?php  ?>
                                            </td>
                                            <td><?= $item['created_at'] ?></td>
                                            <td>
                                                <?= view(
                                                    "admin/Layouts/button_active_index_view.php",
                                                    [
                                                        'is_active' => $item['is_active'],
                                                        'id' => $item['id'],
                                                    ]
                                                ) ?>
                                            </td>
                                            <td class="action-icons">
                                                <?= view(
                                                    "admin/Layouts/group_button_action_index_view.php",
                                                    [
                                                        'uri_update' => site_url('admin/category/detail/' . $item['id']),
                                                        'uri_delete' => site_url('admin/category/delete/' . $item['id']),
                                                    ]
                                                ) ?>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    }  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>