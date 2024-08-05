<?php snippet('header') ?>


<?php
if ($page->title_options() == 'spa') {
  $titleLang = "alt";
} else {
  $titleLang = "";
}
?>



<article class="publication">

  <figure class="publication__cover">
    <a href="<?= $page->cover()->toFile()->url() ?>" data-fslightbox>
      <?php snippet('image', [
        'image' => $page->cover()->toFile(),
        'sizes' => "(min-width: 1200px) 33vw, 
                  (min-width: 900px) 50vw, 
                  (min-width: 600px) 100vw, 
                  100vw"
      ]) ?>
    </a>
    <?php
    /*
      <div>
      <?php snippet('image', [
        'image' => $page->cover()->toFile(),
        'sizes' => "(min-width: 1200px) 33vw, 
                  (min-width: 900px) 50vw, 
                  (min-width: 600px) 100vw, 
                  100vw"
      ]) ?>
    </div>
    */
    ?>
  </figure>

  <section class="page__section publication__header">
    <header class="publication__titles">
      <h1 class="page__title publication__title <?= $titleLang ?>">
        <?= $page->title() ?>
        <?php if ($page->title_options() == 'both') : ?>
          <?php if ($page->title_alt()->isNotEmpty()) : ?>
            <span class="alt"> / <?= $page->title_alt() ?></span>
          <?php endif ?>
        <?php endif ?>
      </h1>
      <?php if ($page->subtitle()->isNotEmpty()) : ?>
        <h2 class="publication__subtitle"><?= $page->subtitle() ?></h2>
      <?php endif ?>
      <?php if ($page->author_editor()->isNotEmpty()) : ?>
        <h3 class="publication__author"><?= $page->author_editor() ?></h3>
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
      <?php if ($page->collaborators()->isNotEmpty()) : ?>
        <dt>Collaborators</dt>
        <dd><?= $page->collaborators() ?></dd>
      <?php endif ?>
      <?php if ($page->publisher()->isNotEmpty()) : ?>
        <dt>Publisher</dt>
        <dd><?= $page->publisher() ?></dd>
      <?php endif ?>
      <?php if ($page->external_url()->isNotEmpty()) : ?>
        <dt><a href="<?= $page->external_url() ?>" target="_blank" class="publication__link">Publication link</a></dt>
      <?php endif ?>
    </dl>

  </section>






  <?php /* Publication gallery */ ?>
  <div class="publication__gallery">
    <?php foreach ($page->gallery()->toFiles() as $image) : ?>
      <?php
      if ($image->orientation() == 'portrait') {
        $orientationClass = "portrait";
      } else {
        $orientationClass = "landscape";
      }
      ?>
      <a href="<?= $image->url() ?>" data-alt="An example description." data-fslightbox class="publication__image <?= $orientationClass ?>">
        <figure>
          <?php snippet('image', [
            'image' => $image,
            'sizes' => "(min-width: 1200px) 25vw, 
                      (min-width: 900px) 50vw, 
                      (min-width: 600px) 50vw, 
                      100vw"
          ]) ?>
          <?php if ($image->caption()->isNotEmpty()) : ?>
            <figcaption><?= $image->caption() ?></figcaption>
          <?php endif ?>
        </figure>
      </a>
      <?php
      /*
        <div class="publication__image <?= $orientationClass ?>">
        <figure>
          <?php snippet('image', [
            'image' => $image,
            'sizes' => "(min-width: 1200px) 25vw, 
                      (min-width: 900px) 50vw, 
                      (min-width: 600px) 50vw, 
                      100vw"
          ]) ?>
          <?php if ($image->caption()->isNotEmpty()) : ?>
            <figcaption><?= $image->caption() ?></figcaption>
          <?php endif ?>
        </figure>
      </div>
      */
      ?>
    <?php endforeach ?>
  </div>

</article>

<?php snippet('prevnext') ?>

<?php snippet('footer') ?>