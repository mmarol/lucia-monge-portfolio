<?php snippet('header') ?>

<h1 class="page__title"><?= $page->title()->esc() ?></h1>

<?php /* Projects */ ?>
<?php if ($projects) : ?>
  
  <ul class="box-grid projects-grid">
    <?php foreach ($projects as $project) : ?>
      <?php snippet('projects-grid-item', ['item' => $project]) ?>
    <?php endforeach ?>
  </ul>

  <?php /* Pagination */ ?>
  <?php if ($pagination->hasPages()) : ?>
    <?php snippet('pagination', ['pagination' => $pagination]) ?>
  <?php endif ?>

<?php endif ?>

<?php snippet('footer') ?>