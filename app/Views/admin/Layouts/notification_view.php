<div class="notification-api">
    <?php if (session()->getFlashdata('errors') && count(session()->getFlashdata('errors')) > 0) : ?>
        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
            <div class="alert alert-danger flash-message">
                <?= $error ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="flash-message" class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>