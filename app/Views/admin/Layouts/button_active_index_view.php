<label class="switch1">
    <?php if ($is_active) { ?>
        <input type="checkbox" checked onclick="onChangeStatus(<?= $id ?>)">
    <?php } else { ?>
        <input type="checkbox" onclick="onChangeStatus(<?= $id ?>)">
    <?php } ?>
    <span class="slider1"></span>
</label>