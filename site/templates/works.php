<?php snippet('header') ?>

<h1 class="page__title"><?= $page->title()->esc() ?></h1>

<!-- Projects -->
<?php if ($projects) : ?>
  
  <ul class="projects-grid">
    <?php foreach ($projects as $project) : ?>
      <?php snippet('project-grid-item', ['project' => $project]) ?>
    <?php endforeach ?>
  </ul>

  <!-- Pagination -->
  <?php if ($pagination->hasPages()) : ?>
    <?php snippet('pagination', ['pagination' => $pagination]) ?>
  <?php endif ?>

<?php endif ?>

<?php snippet('footer') ?>