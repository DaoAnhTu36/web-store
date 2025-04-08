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
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">

                            <form class="form-horizontal" action="<?= base_url('admin/product/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Thông tin chi tiết sản phẩm</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên</label>
                                        <div class="col-md-10">
                                            <input class="form-control" value="<?= $data['name'] ?>" placeholder="" type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Danh mục</label>
                                        <div class="col-md-10">
                                            <select name="category_id" id="category_id" class="form-control">
                                                <?php foreach ($categories as $category): ?>
                                                    <option <?= $category['id'] == $data['category_id'] ? 'selected' : '' ?> value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2 control-label">Thuộc tính</div>
                                        <div class="col-md-10">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Thuộc tính</th>
                                                        <th>Giá trị</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($product_attributes as $attribute): ?>
                                                        <tr>
                                                            <td><?= $attribute['attribute_name']; ?></td>
                                                            <td>
                                                                <?php foreach (explode(', ', $attribute['id_value_list']) as $value): ?>
                                                                    <?php if (in_array(explode(':', $value)[0], $product_attribute_values)): ?>
                                                                        <input type="checkbox" checked name="attribute_ids[]" value="<?= explode(':', $value)[0]; ?>"> <?= explode(':', $value)[1]; ?><br>
                                                                    <?php else: ?>
                                                                        <input type="checkbox" name="attribute_ids[]" value="<?= explode(':', $value)[0]; ?>"> <?= explode(':', $value)[1]; ?><br>
                                                                    <?php endif ?>
                                                                <?php endforeach; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Hình ảnh</label>
                                        <div class="col-md-10">
                                            <input type="file" class="btn btn-default" id="images" name="images[]" multiple>
                                            <p class="help-block">
                                                Chọn ảnh dưới 150kb
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group" id="image_preview_container">
                                        <label class="col-md-2 control-label"> </label>
                                        <div class="col-md-10" id="item_preview">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Hình ảnh</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <?php $array_image = explode(',', $data['images']);
                                                foreach ($array_image as $image): ?>
                                                    <div class="col-md-4">
                                                        <img width="100%" src="<?= base_url($image) ?>" alt="" srcset="">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mô tả</label>
                                        <div class="col-md-10">
                                            <textarea name="description" id="description"><?= $data['description'] ?></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <?= view(
                                    "admin/Layouts/group_button_action_form_view.php",
                                    [
                                        'type_button' => "submit",
                                        'label' => 'Cập nhật'
                                    ]
                                ) ?>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>