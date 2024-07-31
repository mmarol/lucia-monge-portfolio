<?php snippet('header') ?>

<h1 class="page__title"><?= $page->title()->esc() ?></h1>

<?php /* Projects */ ?>
<?php if ($projectsLimited->isNotEmpty()) : ?>

  <ul class="box-grid projects-grid ajax-grid" data-page="<?= $pagination->nextPage() ?>">
    <?php foreach ($projectsLimited as $project) : ?>
      <?php snippet('projects-grid-item', ['item' => $project]) ?>
    <?php endforeach ?>
  </ul>

  <?php /* More articles button */ ?>
  <?php if ($projects->count() > $limit) : ?>
    <button class="load-more" accesskey="m">Load more</button>
  <?php endif ?>

<?php endif ?>

<?php /* Pagination for no-js */ ?>
<?php if ($pagination->hasPages()) : ?>
  <?php snippet('pagination', ['pagination' => $pagination]) ?>
<?php endif ?>

<?php snippet('footer') ?>