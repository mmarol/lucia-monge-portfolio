<?php snippet('header') ?>

<article class="project">

  <?php /* Title */ ?>
  <h1 class="project__title">
    <?= $page->title() ?>
    <?php if ($page->title_alt()->isNotEmpty()) : ?>
      <span class="alt"> / <?= $page->title_alt() ?></span>
    <?php endif ?>
  </h1>

  <?php /* Intro block */ ?>
  <div class="project__intro">

    <?php /* Project info */ ?>
    <?php if (
      $page->year()->isNotEmpty() or
      $page->collaborators()->isNotEmpty() or
      $page->materials()->isNotEmpty()
    ) : ?>
      <aside class="project__info">
        <?php if ($page->year()->isNotEmpty()) : ?>
          <p class="project__detail year"><?= $page->year() ?></p>
        <?php endif ?>
        <?php if ($page->materials()->isNotEmpty()) : ?>
          <p class="project__detail materials"><?= $page->materials() ?></p>
        <?php endif ?>
        <?php if ($page->collaborators()->isNotEmpty()) : ?>
          <p class="project__detail collaborators"><?= $page->collaborators() ?></p>
        <?php endif ?>
      </aside>
    <?php endif ?>

    <?php /* Project summaries */ ?>
    <?php if ($page->intro()->isNotEmpty()) : ?>
      <div class="project__summary">
        <p><?= $page->intro() ?></p>
      </div>
    <?php endif ?>
    <?php if ($page->intro_alt()->isNotEmpty()) : ?>
      <div class="project__summary alt">
        <p><?= $page->intro_alt() ?></p>
      </div>
    <?php endif ?>

  </div>

  <?php /* Project cover image */ ?>
  <figure class="project__cover">
    <?php snippet('image', [
      'image' => $page->cover()->toFile(),
      'sizes' => "100vw"
    ]) ?>
    <?php if ($page->cover()->toFile()->caption()->isNotEmpty()) : ?>
      <figcaption><?= $page->cover()->toFile()->caption() ?></figcaption>
    <?php endif ?>
  </figure>

  <?php /* Project descriptions */ ?>
  <?php if ($page->description()->isNotEmpty()) : ?>
    <div class="project__description"><?= $page->description() ?></div>
  <?php endif ?>
  <?php if ($page->description_alt()->isNotEmpty()) : ?>
    <div class="project__description alt"><?= $page->description_alt() ?></div>
  <?php endif ?>

  <?php /* Project gallery */ ?>
  <div class="project__gallery">
    <?php foreach ($page->gallery()->toFiles() as $image) : ?>
      <?php
      if ($image->orientation() == 'portrait') {
        $orientationClass = "portrait";
      } else {
        $orientationClass = "landscape";
      }
      ?>

      <a href="<?= $image->url() ?>" data-alt="An example description." data-fslightbox class="project__image <?= $orientationClass ?>">
        <figure>
          <?php snippet('image', [
            'image' => $image,
            'sizes' => "(min-width: 90rem) 25vw, 
                      (min-width: 50rem) 50vw, 
                      (min-width: 30rem) 50vw, 
                      100vw"
          ]) ?>
          <?php if ($image->caption()->isNotEmpty()) : ?>
            <figcaption><?= $image->caption() ?></figcaption>
          <?php endif ?>
        </figure>
      </a>
    <?php endforeach ?>
  </div>
</article>

<?php snippet('prevnext') ?>

<?php snippet('footer') ?>