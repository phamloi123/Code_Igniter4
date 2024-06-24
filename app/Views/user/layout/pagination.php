<?php
$pager->setSurroundCount(1);
?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item"><a class="page-link" href="<?= $pager->getFirst() ?>">First</a></li>
            <li class="page-item"><a class="page-link" href="<?= $pager->getPreviousPage() ?>">Previous</a></li>
        <?php endif ?>
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? ' active' : "" ?> ">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item"><a class="page-link" href="<?= $pager->getNextPage() ?>">Next</a></li>
            <li class="page-item"><a class="page-link" href="<?= $pager->getLast() ?>">Last</a></li>
        <?php endif ?>
    </ul>
</nav>