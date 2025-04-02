<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($function_back)): ?>
                <button class="btn btn-danger" type="button" onclick="<?= $function_back ?>">
                    Hủy
                </button>
            <?php endif ?>
            <?php if (isset($function)): ?>
                <button class="btn btn-primary" type="button" onclick="<?= $function ?>">
                    <i class="fa fa-save"></i>
                    <?php if (isset($label)): ?>
                        <?= $label ?>
                    <?php endif ?>
                </button>
            <?php elseif (isset($type_button)): ?>
                <button class="btn btn-primary" type="<?= $type_button ?>">
                    <i class="fa fa-save"></i>
                    <?php if (isset($label)): ?>
                        <?= $label ?>
                    <?php endif ?>
                </button>
            <?php endif ?>
        </div>
    </div>
</div>