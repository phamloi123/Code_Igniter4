<?php if (session('errorsMessage')) :
    foreach (session('errorsMessage') as $error) :
?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Lỗi!</strong> <?= $error ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break ?>
    <?php endforeach ?>
<?php endif ?>
<?php if (session('successMessage')) :
    foreach (session('successMessage') as $success) :
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $success ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break ?>
    <?php endforeach ?>
<?php endif ?>