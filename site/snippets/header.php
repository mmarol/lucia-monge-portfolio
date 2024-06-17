<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
  ?>
  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/main.css',
    '@auto'
  ]) ?>

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
  <?php
  $backgroundColor = $site->site_colors()->toObject()->background_color();
  $primaryColor = $site->site_colors()->toObject()->primary_color();
  $secondaryColor = $site->site_colors()->toObject()->secondary_color();
  $tertiaryColor = $site->site_colors()->toObject()->tertiary_color();
  $gradientColorA = $site->site_colors()->toObject()->gradient_color_a();
  $gradientColorB = $site->site_colors()->toObject()->gradient_color_b();
  ?>
  <style>
    :root {
      --c-bg: <?= $backgroundColor ?>;
      --c-a: <?= $primaryColor ?>;
      --c-b: <?= $secondaryColor ?>;
      --c-stroke: <?= $tertiaryColor ?>;
      --c-grad-a: <?= $gradientColorA ?>;
      --c-grad-b: <?= $gradientColorB ?>;
    }
  </style>
</head>

<body>
  <header class="header">
    <nav class="menu">
      <?php
      /*
        Multiselect field to choose nav order
      */
      ?>
      <?php foreach ($site->navigation_order()->split() as $item) : ?>
        <?php $nav_item = page($item) ?>
        <a <?php e($nav_item->isOpen(), 'aria-current="page" class="active"') ?> href="<?= $nav_item->url() ?>"><?= $nav_item->title()->esc() ?></a>
      <?php endforeach ?>
    </nav>
  </header>

  <main class="main">