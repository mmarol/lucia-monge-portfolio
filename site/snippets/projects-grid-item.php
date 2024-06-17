<li class="box__item">
  <a href="<?= $item->url() ?>">

    <?php /* image */ ?>
    <?php if ($item->cover()->isNotEmpty()) : ?>
      <?php snippet('image', [
        'image' => $item->cover()->toFile(),
        'sizes' => "(min-width: 90rem) 33vw, 
                    (min-width: 50rem) 50vw, 
                    (min-width: 30rem) 100vw, 
                    100vw"
        ]) ?>
    <?php endif ?>

    <?php /* title */ ?>
    <h2 class="box__item-title"><?= $item->title() ?>
      <?php if ($item->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $item->title_alt() ?></span>
      <?php endif ?>
    </h2>
  </a>
</li>