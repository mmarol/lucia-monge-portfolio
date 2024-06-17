<li class="box__item">
  <a href="<?= $item->link() ?>" target="_blank">

    <?php /* title */ ?>
    <h3 class="box__item-title"><?= $item->title() ?>
      <?php if ($item->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $item->title_alt() ?></span>
      <?php endif ?>
    </h3>

    <?php /* dates */ ?>
    <?php if ($dates = $item->dates()->toObject()) : ?>
      <?php snippet('dates', ['dates' => $dates]) ?>
    <?php endif ?>
  </a>
</li>