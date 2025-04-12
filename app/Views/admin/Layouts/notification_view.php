<div class="notification-api">
    <?php if (is_array(session()->getFlashdata('errors'))): ?>
        <?php if (session()->getFlashdata('errors') && count(session()->getFlashdata('errors')) > 0) : ?>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <?= "<script>onToastrError('" . $error . "')</script>" ?>
            <?php endforeach ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <?= "<script>onToastrError('" . session()->getFlashdata('errors') . "')</script>" ?>
        <?php endif; ?>
    <?php endif ?>
    <?php if (session()->getFlashdata('success')): ?>
        <?= "<script>onToastrSuccess('" . session()->getFlashdata('success') . "')</script>" ?>
    <?php endif; ?>
</div>