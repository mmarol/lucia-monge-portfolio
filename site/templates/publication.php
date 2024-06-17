<?php snippet('header') ?>

<article class="publication">

  <header class="page__section">
    <h1 class="page__title publication__title">
      <?= $page->title() ?>
      <?php if ($page->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $page->title_alt() ?></span>
      <?php endif ?>
    </h1>
    <?php if ($page->subtitle()->isNotEmpty()) : ?>
        <h2 class="publication__subtitle"><?= $page->subtitle() ?></h2>
      <?php endif ?>
  </header>

  <article class="publication__summary">
    <div class="publication__description">
      <?= $page->english_description() ?>
    </div>
    <div class="publication__description alt">
      <?= $page->spanish_description() ?>
    </div>
  </article>

  <dl class="publication__details">
    <?php if ( $page->collaborators()->isNotEmpty() ) : ?>
      <dt>Collaborators</dt>
      <dd><?= $page->collaborators() ?></dd>
    <?php endif ?>
    <?php if ( $page->publisher()->isNotEmpty() ) : ?>
      <dt>Publisher</dt>
      <dd><?= $page->publisher() ?></dd>
    <?php endif ?>
    <?php if ( $page->external_url()->isNotEmpty() ) : ?>
      <dt><a href="<?= $page->external_url() ?>" target="_blank" class="publication__link">Publication link</a></dt>
    <?php endif ?>
  </dl>

  <figure class="publication__cover">
    <?php snippet('image', [
      'image' => $page->cover()->toFile(),
      'sizes' => "(min-width: 90rem) 33vw, 
                  (min-width: 50rem) 50vw, 
                  (min-width: 30rem) 100vw, 
                  100vw"
      ]) ?>
  </figure>

</article>

<?php snippet('prevnext') ?>

<?php snippet('footer') ?>