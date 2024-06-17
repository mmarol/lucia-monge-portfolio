<li class="box__item">
  <a href="<?= $item->url() ?>">

    <?php /* title */ ?>
    <h3 class="box__item-title"><?= $item->title() ?>
      <?php if ($item->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $item->title_alt() ?></span>
      <?php endif ?>
    </h3>

    <?php /* subtitle */ ?>
    <?php if ($item->subtitle()->isNotEmpty()) : ?>
      <h4><?= $item->subtitle() ?></h4>
    <?php endif ?>

    <?php /* publisher */ ?>
    <?php if ($item->publisher()->isNotEmpty()) : ?>
      <p><?= $item->publisher() ?></p>
    <?php endif ?>

  </a>
</li>