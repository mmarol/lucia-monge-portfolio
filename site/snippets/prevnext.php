<nav class="project__prevnext">
  <?php if ($prev = $page->prevListed()) : ?>
    <a href="<?= $prev->url() ?>">
      <?= $prev->title() ?>
      <?php if ($prev->title_alt()->isNotEmpty()) : ?>
        <?= $prev->title_alt() ?>
      <?php endif ?>
    </a>
  <?php endif ?>

  <?php if ($next = $page->nextListed()) : ?>
    <a href="<?= $next->url() ?>">
      <?= $next->title() ?>
      <?php if ($next->title_alt()->isNotEmpty()) : ?>
        <?= $next->title_alt() ?>
      <?php endif ?>
    </a>
  <?php endif ?>
</nav>