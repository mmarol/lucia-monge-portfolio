<?php 
if ($pagination->hasPrevPage() == null and $pagination->hasNextPage() != null) {
  $containerAlignment = "end";
} elseif ($pagination->hasPrevPage() != null and $pagination->hasNextPage() == null) {
  $containerAlignment = "start";
} else {
  $containerAlignment = "both";
}
?>

<nav class="pagination <?= $containerAlignment ?>">
  <?php if ($prev = $pagination->prevPageURL()) : ?>
    <a href="<?= $prev ?>" class="more__prev">
      Newer items
    </a>
  <?php endif ?>

  <?php if ($next = $pagination->nextPageURL()) : ?>
    <a href="<?= $next ?>" class="more__next">
      Older items
    </a>
  <?php endif ?>
</nav>