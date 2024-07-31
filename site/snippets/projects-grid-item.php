<?php
if ($item->title_options() == 'spa') {
  $titleLang = "alt";
} else {
  $titleLang = "";
}
?>

<li class="box__item">
  <a href="<?= $item->url() ?>">

    <?php /* image */ ?>
    <?php if ($item->cover()->isNotEmpty()) : ?>
      <?php snippet('image', [
        'image' => $item->cover()->toFile(),
        'sizes' => "(min-width: 1200px) 33vw, 
                    (min-width: 900px) 50vw, 
                    (min-width: 600px) 100vw, 
                    100vw"
      ]) ?>
    <?php endif ?>

    <?php /* title */ ?>
    <h2 class="box__item-title <?= $titleLang ?>"><?= $item->title() ?>
      <?php if ($item->title_options() == 'both') : ?>
        <?php if ($item->title_alt()->isNotEmpty()) : ?>
          <span class="alt"> / <?= $item->title_alt() ?></span>
        <?php endif ?>
      <?php endif ?>
    </h2>
  </a>
</li>