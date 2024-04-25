<?php snippet('header') ?>
<h1 class="page__title"><?= $page->title()->esc() ?></h1>

<?php
/*
Article filtering logic in 
../controllers/news.php
*/
?>

<!-- Upcoming News -->
<?php if ($upcomingArticles->isNotEmpty()) : ?>
  <h2>Upcoming</h2>
  <ul class="news-grid">
    <?php foreach ($upcomingArticles as $article) : ?>
      <?php snippet('news-grid-item', ['article' => $article]) ?>
    <?php endforeach ?>
  </ul>
<?php endif ?>


<?php
/*
control past articles limit in 
../controllers/news.php and 
../controllers/news.json.php
*/
?>
<!-- Past News -->
<?php if ($pastArticles->isNotEmpty()) : ?>
  <h2>Past</h2>
  <ul class="news-list" data-page="<?= $pagination->nextPage() ?>">
    <?php foreach ($pastArticles as $article) : ?>
      <?php snippet('news-list-item', ['article' => $article]) ?>
    <?php endforeach ?>
  </ul>

  <!-- More articles button -->
  <?php if ($articles->count() > $limit) : ?>
    <button class="load-more" accesskey="m">Load more</button>
  <?php endif ?>
<?php endif ?>

<!-- Pagination for no-js -->
<?php if ($pagination->hasPages()) : ?>
  <?php snippet('pagination', ['pagination' => $pagination]) ?>
<?php endif ?>

<?php snippet('footer') ?>