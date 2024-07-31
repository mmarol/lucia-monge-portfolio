<?php
if ($item->title_options() == 'spa') {
  $titleLang = "alt";
} else {
  $titleLang = "";
}
?>

<?php if ($item->link()->isNotEmpty()) : ?>

  <li class="box__item link">

    <a href="<?= $item->link() ?>" target="_blank">

      <?php /* title */ ?>
      <h3 class="box__item-title <?= $titleLang ?>"><?= $item->title() ?>
        <?php if ($item->title_options() == 'both') : ?>
          <?php if ($item->title_alt()->isNotEmpty()) : ?>
            <span class="alt"> / <?= $item->title_alt() ?></span>
          <?php endif ?>
        <?php endif ?>
      </h3>
      <?php if ( $item->subtitle()->isNotEmpty() ) : ?>
        <h4 class="box__item-subtitle"><?= $item->subtitle() ?></h4>
      <?php endif ?>

      <?php /* dates */ ?>
      <?php if ($dates = $item->dates()->toObject()) : ?>
        <?php snippet('dates', ['dates' => $dates]) ?>
      <?php endif ?>
    </a>

  </li>

<?php else : ?>

  <li class="box__item no-link">

    <div>

      <?php /* title */ ?>
      <h3 class="box__item-title"><?= $item->title() ?>
        <?php if ($item->title_alt()->isNotEmpty()) : ?>
          <span class="alt"> / <?= $item->title_alt() ?></span>
        <?php endif ?>
      </h3>
      <?php if ( $item->subtitle()->isNotEmpty() ) : ?>
        <h4 class="box__item-subtitle"><?= $item->subtitle() ?></h4>
      <?php endif ?>

      <?php /* dates */ ?>
      <?php if ($dates = $item->dates()->toObject()) : ?>
        <?php snippet('dates', ['dates' => $dates]) ?>
      <?php endif ?>
    </div>

  </li>

<?php endif ?>