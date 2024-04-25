<?php snippet('header') ?>

<section class="intro">
  <h1 class="page__title"><?= $page->title()->esc() ?></h1>
  <article class="intro__desc">
    <p class="intro__text"><?= $page->description() ?></p>
    <p class="intro__text alt"><?= $page->description_alt() ?></p>
    <p class="intro__cv"><a href="<?= $page->cv_url()->toFile() ?>"><?= $page->cv_text() ?></a></p>
  </article>
  <?php
  $sizes = "(min-width: 1200px) 25vw,
        (min-width: 900px) 33vw,
        (min-width: 600px) 50vw,
        100vw";
  $image = $page->headshot()->toFile();
  ?>
  <picture>
    <source srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp">
    <img alt="<?= $image->alt() ?>" src="<?= $image->resize(300)->url() ?>" srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
  </picture>
</section>

<section class="publications">
  <h2 class="publications__title"><?= $page->pub_title()->esc() ?></h2>
  <?php
  // using the `toStructure()` method, we create a structure collection
  $publications = $page->publications()->toStructure();
  // we can then loop through the entries and render the individual fields
  foreach ($publications as $publication) : ?>
    <article class="publication">
      <h3><a href="<?= $publication->url() ?>"><?= $publication->title() ?></a></h3>
      <?php if ($publication->subtitle()->isNotEmpty()) : ?>
        <h4><?= $publication->subtitle() ?></h4>
      <?php endif ?>
      <?= $publication->collaborators()->list() ?>
      <p><?= $publication->publisher() ?></p>
    </article>
  <?php endforeach ?>
</section>

<?php snippet('footer') ?>