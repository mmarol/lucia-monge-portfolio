<?php snippet('header') ?>
<h1 class="page__title"><?= $page->title()->esc() ?></h1>

<?php
/*
Article filtering logic in 
../controllers/news.php
*/
?>

<?php /* Upcoming News */ ?>
<?php if ($upcomingArticles->isNotEmpty()) : ?>
  <section class="page__section">
    <h2 class="page__subtitle">Upcoming</h2>
    <ul class="box-grid news-grid">
      <?php foreach ($upcomingArticles as $article) : ?>
        <?php snippet('news-grid-item', ['item' => $article]) ?>
      <?php endforeach ?>
    </ul>
  </section>
<?php endif ?>


<?php
/*
control past articles limit in 
../controllers/news.php 
and 
../controllers/news.json.php
*/
?>

<?php /* Past News */ ?>
<?php if ($pastArticles->isNotEmpty()) : ?>
  <section class="page__section">
    <h2 class="page__subtitle">Past</h2>
    <ul class="box-grid news-grid ajax-grid" data-page="<?= $pagination->nextPage() ?>">
      <?php foreach ($pastArticles as $article) : ?>
        <?php snippet('news-grid-item', ['item' => $article]) ?>
      <?php endforeach ?>
    </ul>

    <?php /* More articles button */ ?>
    <?php if ($pastArticles->count() > $limit) : ?>
      <button class="load-more" accesskey="m">Load more</button>
    <?php endif ?>
  </section>
<?php endif ?>

<?php /* Pagination for no-js */ ?>
<?php if ($pagination->hasPages()) : ?>
  <?php snippet('pagination', ['pagination' => $pagination]) ?>
<?php endif ?>

<?php snippet('footer') ?>