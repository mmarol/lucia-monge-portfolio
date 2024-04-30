<nav class="pagination">

  <?php if ($pagination->hasNextPage()) : ?>
    <a class="next" href="<?= $pagination->nextPageURL() ?>">
      ‹ older posts
    </a>
  <?php endif ?>

  <?php if ($pagination->hasPrevPage()) : ?>
    <a class="prev" href="<?= $pagination->prevPageURL() ?>">
      newer posts ›
    </a>
  <?php endif ?>

</nav>