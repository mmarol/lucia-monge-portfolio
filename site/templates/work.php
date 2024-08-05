<?php snippet('header') ?>

<article class="project">

  <?php /* Title */ ?>
  <?php
  if ($page->title_options() == 'spa') {
    $titleLang = "alt";
  } else {
    $titleLang = "";
  }
  ?>
  <h1 class="project__title <?= $titleLang ?>">
    <?= $page->title() ?>
    <?php if ($page->title_options() == 'both') : ?>
      <?php if ($page->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $page->title_alt() ?></span>
      <?php endif ?>
    <?php endif ?>
  </h1>

  <?php /* Project cover image */ ?>
  <figure class="project__cover">
      <a href="<?= $page->cover()->toFile()->url() ?>" data-fslightbox>
      <?php snippet('image', [
        'image' => $page->cover()->toFile(),
        'sizes' => "100vw"
      ]) ?>
    </a>
    <?php
    /*
    <div>
      <?php snippet('image', [
        'image' => $page->cover()->toFile(),
        'sizes' => "100vw"
      ]) ?>
    </div>
    */
    ?>
    <?php if ($page->cover()->toFile()->caption()->isNotEmpty()) : ?>
      <figcaption><?= $page->cover()->toFile()->caption() ?></figcaption>
    <?php endif ?>
  </figure>

  <?php /* Intro block */ ?>
  <div class="project__intro">

    <?php /* Project info */ ?>
    <?php if (
      $page->year()->isNotEmpty() or
      $page->collaborators()->isNotEmpty()
    ) : ?>
      <aside class="project__info">
        <?php if ($page->year()->isNotEmpty()) : ?>
          <p class="project__detail year"><?= $page->year() ?></p>
        <?php endif ?>
        <?php if ($page->collaborators()->isNotEmpty()) : ?>
          <p class="project__detail collaborators"><?= $page->collaborators() ?></p>
        <?php endif ?>
      </aside>
    <?php endif ?>

    <?php /* Project summaries */ ?>
    <?php
    /*
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
    */
    ?>

  </div>


  <?php /* Project descriptions */ ?>
  <div class="project__descriptions">
    <?php if ($page->materials()->isNotEmpty()) : ?>
      <p class="project__materials eng"><?= $page->materials() ?></p>
    <?php endif ?>

    <?php if ($page->materials_spa()->isNotEmpty()) : ?>
      <p class="project__materials spa"><?= $page->materials_spa() ?></p>
    <?php endif ?>

    <?php if ($page->description()->isNotEmpty()) : ?>
      <article class="project__description eng">
        <?= $page->description() ?>
      </article>
    <?php endif ?>

    <?php if ($page->description_alt()->isNotEmpty()) : ?>
      <article class="project__description spa alt">
        <?= $page->description_alt() ?>
      </article>
    <?php endif ?>
  </div>


  <?php /* Project gallery */ ?>
  <div class="project__gallery">
    <?php /* Images */ ?>
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
      <div class="project__image <?= $orientationClass ?>">
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

    <?php /* Videos */ ?>
    <?php foreach ($page->video_gallery()->toStructure() as $video) : ?>
      <div class="project__video-container">
        <?= vimeo( 
          $video->video_link(), [ 
            'portrait'    => 'false',
            'byline'      => 'false',
            'chromecast'  => 'false',
            'vimeo_logo'  => 'false',
            'responsive'  => 'true',
          ], [
            'class' => 'project__video'
          ] ) ?>
      </div>
      
    <?php endforeach ?>

  </div>
</article>



<?php snippet('prevnext') ?>

<?php snippet('footer') ?>