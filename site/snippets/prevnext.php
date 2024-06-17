<?php 
if ($page->prevListed() == null and $page->nextListed() != null) {
  $containerAlignment = "end";
} elseif ($page->prevListed() != null and $page->nextListed() == null) {
  $containerAlignment = "start";
} else {
  $containerAlignment = "both";
}
?>

<nav class="more <?= $containerAlignment ?>">
  <?php if ($prev = $page->prevListed()) : ?>
    <a href="<?= $prev->url() ?>" class="more__prev">
      <?= $prev->title() ?>
      <?php if ($prev->title_alt()->isNotEmpty()) : ?>
        <?= $prev->title_alt() ?>
      <?php endif ?>
    </a>
  <?php endif ?>

  <?php if ($next = $page->nextListed()) : ?>
    <a href="<?= $next->url() ?>" class="more__next">
      <?= $next->title() ?>
      <?php if ($next->title_alt()->isNotEmpty()) : ?>
        <?= $next->title_alt() ?>
      <?php endif ?>
    </a>
  <?php endif ?>
</nav>