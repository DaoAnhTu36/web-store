<label class="switch1">
    <?php if ($is_display) { ?>
        <input type="checkbox" checked onclick="onChangeStatus('<?= $id ?>', 'display')">
    <?php } else { ?>
        <input type="checkbox" onclick="onChangeStatus('<?= $id ?>', 'display')">
    <?php } ?>
    <span class="slider1"></span>
</label>