<div class="notification-api">
    <?php if (is_array(session()->getFlashdata('errors'))): ?>
        <?php if (session()->getFlashdata('errors') && count(session()->getFlashdata('errors')) > 0) : ?>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <div class="alert alert-danger flash-message">
                    <?= $error ?>
                </div>
            <?php endforeach ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger flash-message">
                <?= session()->getFlashdata('errors') ?>
            </div>
        <?php endif; ?>
    <?php endif ?>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success flash-message">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
</div>