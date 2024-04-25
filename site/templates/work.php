<?php snippet('header') ?>

<article class="project">

  <h1 class="page__title">
    <?= $page->title() ?>
    <?php if ($page->title_alt()->isNotEmpty()) : ?>
      <span class="alt"> / <?= $page->title_alt() ?></span>
    <?php endif ?>
  </h1>

  <div class="project__intro">
    <?php if ($page->intro()->isNotEmpty()) : ?>
      <p><?= $page->intro() ?></p>
    <?php endif ?>
    <?php if ($page->intro_alt()->isNotEmpty()) : ?>
      <p><?= $page->intro_alt() ?></p>
    <?php endif ?>
    <?php if (
      $page->year()->isNotEmpty() or
      $page->collaborators()->isNotEmpty() or
      $page->materials()->isNotEmpty()
    ) : ?>
      <aside>
        <p><?= $page->year() ?></p>
        <?= $page->collaborators() ?>
        <p><?= $page->materials() ?></p>
      </aside>
    <?php endif ?>
  </div>

  <figure class="project__cover">
    <!-- image -->
    <?php
    $sizes = "100vw";
    $image = $page->cover()->toFile();
    ?>
    <picture>
      <source srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp">
      <img alt="<?= $image->alt() ?>" src="<?= $image->resize(300)->url() ?>" srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
    </picture>
    <?php if ($image->caption()->isNotEmpty()) : ?>
      <figcaption><?= $image->caption() ?></figcaption>
    <?php endif ?>
  </figure>

  <?php if ($page->description()->isNotEmpty()) : ?>
    <p class="project__description"><?= $page->description() ?></p>
  <?php endif ?>
  <?php if ($page->description_alt()->isNotEmpty()) : ?>
    <p class="project__description alt"><?= $page->description_alt() ?></p>
  <?php endif ?>

  <?php foreach ($page->gallery()->toFiles() as $image) : ?>
    <figure class="project__cover">
      <!-- image -->
      <?php
      $sizes = "(min-width: 1200px) 25vw, (min-width: 900px) 33vw, (min-width: 600px) 50vw, 100vw";
      ?>
      <picture> 
        <source srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp">
        <img alt="<?= $image->alt() ?>" src="<?= $image->resize(300)->url() ?>" srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
      </picture>
      <?php if ($image->caption()->isNotEmpty()) : ?>
        <figcaption><?= $image->caption() ?></figcaption>
      <?php endif ?>
    </figure>
  <?php endforeach ?>
</article>

<?php snippet('prevnext') ?>

<?php snippet('footer') ?>