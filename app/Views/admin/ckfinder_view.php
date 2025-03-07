<?php
foreach ($fileList as $file) : ?>

    <div class="col-md-3">
        <img src="<?= $file['url'] ?>" class="img-fluid" alt="<?= $file['name'] ?>">
    </div>
<?php endforeach; ?>