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
                    <a href="<?= site_url('admin/website-config/create'); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
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
                    <div class="widget-body">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Khóa</th>
                                    <th>Giá trị</th>
                                    <th>Loại</th>
                                    <th>Mô tả</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idx = 1;
                                foreach ($data as $item): ?>
                                    <tr>
                                        <td><?= $idx ?></td>
                                        <td><?= $item['config_key'] ?></td>
                                        <td><?= $item['config_value'] ?></td>
                                        <td><?= $item['type'] == 1 ? "Ảnh" : 'Thường' ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td class="action-icons">
                                            <?= view(
                                                "admin/Layouts/group_button_action_index_view.php",
                                                [
                                                    'uri_update' => site_url('admin/website-config/detail/' . $item['id']),
                                                    'uri_delete' => site_url('admin/website-config/delete/' . $item['id']),
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