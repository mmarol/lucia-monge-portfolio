<li class="news-list__item">
  <a href="<?= $article->link() ?>">
    <h2 class="news-list__item-title"><?= $article->title() ?>
      <?php if ($article->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $article->title_alt() ?></span>
      <?php endif ?>
    </h2>
  </a>
</li>