<?php snippet('header') ?>

<section class="home__logo">
  <h1 class="home__title"><?= $page->page_title()->esc() ?></h1>
</section>

<?php /* News Ticker */ ?>
<?php if ($selectedNews = $page->selected_news()->toPages()) : ?>
  <aside class="ticker__container">
    <ul class="ticker">
      <?php foreach ($selectedNews as $newsItem) : ?>
        <li class="ticker__item">
          <a href="<?= $newsItem->link() ?>">
            <?php if ($newsItem->title_alt()->isNotEmpty()) : ?>
              <p class="ticker__title"><?= $newsItem->title() ?>
                <span class="alt"> / <?= $newsItem->title_alt() ?>&nbsp;•&nbsp;</span>
              </p>
            <?php else : ?>
              <p class="ticker__title"><?= $newsItem->title() ?>&nbsp;•&nbsp;</p>
            <?php endif ?>

            <?php /* Dates logic */ ?>
            <?php $dates = $newsItem->dates()->toObject() ?>

            <?php if ($dates->dates_type() == 'single') : ?>
              <?php /* Single date */ ?>
              <p><?= $dates->dates_single()->toDate('M j, Y') ?></p>

            <?php elseif ($dates->dates_type() == 'multiple') : ?>
              <?php /* Multiple dates */ ?>
              <?php
              $datesArray = [];
              foreach ($dates->dates_multiple()->toStructure() as $date) {
                $datesArray[] = $date->date()->toDate('M j, Y');
              } ?>
              <p><?= implode(" | ", $datesArray); ?></p>

            <?php elseif ($dates->dates_type() == 'range') : ?>
              <?php /* Date range */ ?>
              <p class="news-ticker__dates"><?= $dates->dates_range_start()->toDate('M j, Y') ?> - <?= $dates->dates_range_end()->toDate('M j, Y') ?></p>
            <?php endif ?>

          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </aside>
<?php endif ?>

<?php /* Selected Projects */ ?>
<?php if ($selectedProjects = $page->selected_projects()->toPages()) : ?>
  <ul class="box-grid projects-grid">
    <?php foreach ($selectedProjects as $project) : ?>
      <?php snippet('projects-grid-item', ['item' => $project]) ?>
    <?php endforeach ?>
  </ul>

  <?php /* More */ ?>
  <?php if ($projectPage = page('works')) : ?>
    <div class="more">
      <a href="<?= $projectPage->url() ?>" class="more__pages"><?= $page->more_projects() ?></a>
    </div>
  <?php endif ?>
<?php endif ?>

<?php snippet('footer') ?>