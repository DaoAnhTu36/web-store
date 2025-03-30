<td class="action-icons">
    <?php if (isset($uri_detail)): ?>
        <a href="<?= $uri_detail ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
    <?php endif ?>
    <?php if (isset($uri_update)): ?>
        <a href="<?= $uri_update ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <?php endif ?>
    <?php if (isset($uri_delete)): ?>
        <a href="<?= $uri_delete ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <?php endif ?>
</td>