<?php snippet('header') ?>
<h1 class="home__title"><?= $page->page_title()->esc() ?></h1>
<?php
/*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
?>

<!-- News Ticker -->
<?php if ($selectedNews = $page->selected_news()->toPages()) : ?>
  <ul class="news-ticker">
    <?php foreach ($selectedNews as $newsItem) : ?>
      <li class="news-ticker__item">
        <a href="<?= $newsItem->link() ?>">
          <p class="news-ticker__title"><?= $newsItem->title() ?>
          <?php if ($newsItem->title_alt()->isNotEmpty()) : ?>
            <span class="alt"> / <?= $newsItem->title_alt() ?></span>
          <?php endif ?>
          </p>

          <!-- Dates logic -->
          <?php $dates = $newsItem->dates()->toObject() ?>
          <!-- Single date -->
          <?php if ($dates->dates_type() == 'single') : ?>
            <p><?= $dates->dates_single()->toDate('M j, Y') ?></p>
            <!-- Multiple dates -->
          <?php elseif ($dates->dates_type() == 'multiple') : ?>
            <?php
            $datesArray = [];
            foreach ($dates->dates_multiple()->toStructure() as $date) {
              $datesArray[] = $date->date()->toDate('M j, Y');
            }
            echo implode(" | ", $datesArray);
            ?>
            <!-- Date range -->
          <?php elseif ($dates->dates_type() == 'range') : ?>
            <p><?= $dates->dates_range_start()->toDate('M j, Y') ?> - <?= $dates->dates_range_end()->toDate('M j, Y') ?></p>
          <?php endif ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
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