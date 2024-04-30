<?php snippet('header') ?>
<h1 class="home__title"><?= $page->page_title()->esc() ?></h1>

<!-- News Ticker -->
<?php if ($selectedNews = $page->selected_news()->toPages()) : ?>
  <aside class="news-ticker">
    <div class="news-ticker__wrap">
      <ul class="news-ticker__container">
        <?php foreach ($selectedNews as $newsItem) : ?>
          <li class="news-ticker__item">
            <a href="<?= $newsItem->link() ?>">
              <?php if ($newsItem->title_alt()->isNotEmpty()) : ?>
                <p class="news-ticker__title"><?= $newsItem->title() ?>
                  <span class="alt"> / <?= $newsItem->title_alt() ?>&nbsp;•&nbsp;</span>
                </p>
              <?php else : ?>
                <p class="news-ticker__title"><?= $newsItem->title() ?>&nbsp;•&nbsp;</p>
              <?php endif ?>

              <!-- Dates logic -->
              <?php $dates = $newsItem->dates()->toObject() ?>
              <?php if ($dates->dates_type() == 'single') : ?>
                <!-- Single date -->
                <p><?= $dates->dates_single()->toDate('M j, Y') ?></p>
              <?php elseif ($dates->dates_type() == 'multiple') : ?>
                <!-- Multiple dates -->
                <?php
                $datesArray = [];
                foreach ($dates->dates_multiple()->toStructure() as $date) {
                  $datesArray[] = $date->date()->toDate('M j, Y');
                } ?>
                <p><?= implode(" | ", $datesArray); ?></p>
              <?php elseif ($dates->dates_type() == 'range') : ?>
                <!-- Date range -->
                <p class="news-ticker__dates"><?= $dates->dates_range_start()->toDate('M j, Y') ?> - <?= $dates->dates_range_end()->toDate('M j, Y') ?></p>
              <?php endif ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>

    <!-- Duplicate items for continuous ticker -->
    <div class="news-ticker__wrap duplicate" aria-hidden="true">
      <ul class="news-ticker__container duplicate">
        <?php foreach ($selectedNews as $newsItem) : ?>
          <li class="news-ticker__item">
            <a href="<?= $newsItem->link() ?>">
              <?php if ($newsItem->title_alt()->isNotEmpty()) : ?>
                <p class="news-ticker__title"><?= $newsItem->title() ?>
                  <span class="alt"> / <?= $newsItem->title_alt() ?>&nbsp;•&nbsp;</span>
                </p>
              <?php else : ?>
                <p class="news-ticker__title"><?= $newsItem->title() ?>&nbsp;•&nbsp;</p>
              <?php endif ?>

              <!-- Dates logic -->
              <?php $dates = $newsItem->dates()->toObject() ?>
              <?php if ($dates->dates_type() == 'single') : ?>
                <!-- Single date -->
                <p><?= $dates->dates_single()->toDate('M j, Y') ?></p>
              <?php elseif ($dates->dates_type() == 'multiple') : ?>
                <!-- Multiple dates -->
                <?php
                $datesArray = [];
                foreach ($dates->dates_multiple()->toStructure() as $date) {
                  $datesArray[] = $date->date()->toDate('M j, Y');
                } ?>
                <p><?= implode(" | ", $datesArray); ?></p>
              <?php elseif ($dates->dates_type() == 'range') : ?>
                <!-- Date range -->
                <p class="news-ticker__dates"><?= $dates->dates_range_start()->toDate('M j, Y') ?> - <?= $dates->dates_range_end()->toDate('M j, Y') ?></p>
              <?php endif ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </aside>
<?php endif ?>

<!-- Selected Projects -->
<?php if ($selectedProjects = $page->selected_projects()->toPages()) : ?>
  <ul class="projects-grid">
    <?php foreach ($selectedProjects as $project) : ?>
      <li class="projects__item">
        <a href="<?= $project->url() ?>">
          <!-- image -->
          <?php
          $sizes = "(min-width: 1200px) 25vw, (min-width: 900px) 33vw, (min-width: 600px) 50vw, 100vw";
          $image = $project->cover()->toFile();
          ?>
          <picture>
            <source srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp">
            <img alt="<?= $image->alt() ?>" src="<?= $image->resize(300)->url() ?>" srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
          </picture>
          <!-- project title -->
          <h2 class="projects__item-title"><?= $project->title() ?></h2>
          <h2 class="projects__item-title alt"><?= $project->title_alt() ?></h2>
        </a>
      </li>
    <?php endforeach ?>
  </ul>

  <!-- More -->
  <?php if ($projectPage = page('works')) : ?>
    <div class="more">
      <a href="<?= $projectPage->url() ?>"><?= $page->more_projects() ?></a>
    </div>
  <?php endif ?>
<?php endif ?>

<?php snippet('footer') ?>