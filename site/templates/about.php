<?php snippet('header') ?>

<section class="page__section intro">
  <h1 class="page__title"><?= $page->title()->esc() ?></h1>
  <article class="intro__desc">
    <div class="intro__text"><?= $page->description() ?></div>
    <div class="intro__text alt"><?= $page->description_alt() ?></div>
    <div class="intro__cv"><a href="<?= $page->cv_url()->toFile() ?>"><?= $page->cv_text() ?></a></div>
  </article>
  <?php snippet('image', [
    'image' => $page->headshot()->toFile(),
    'sizes' => "(min-width: 1200px) 25vw, 
                (min-width: 900px) 33vw, 
                (min-width: 600px) 100vw, 
                100vw"
    ]) ?>
</section>

<section class="page__section publications">
  <h2 class="publications__title" id="publications"><?= $page->pub_title()->esc() ?></h2>

  <?php /* Selected publications */ ?>
  <?php if ($selectedPublications = $page->publications()->toPages()) : ?>
    <ul class="box-grid publications-grid">
      <?php foreach ($selectedPublications as $publication) : ?>
        <?php snippet('publications-grid-item', ['item' => $publication]) ?>
      <?php endforeach ?>
    </ul>
  <?php endif ?>

</section>

<?php snippet('footer') ?>