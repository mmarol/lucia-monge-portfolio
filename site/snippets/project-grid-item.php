<li class="projects__item">
  <a href="<?= $project->url() ?>">
    <!-- image -->
    <?php
    $sizes = "(min-width: 1200px) 25vw, (min-width: 900px) 33vw, (min-width: 600px) 50vw, 100vw";
    $image = $project->cover()->toFile();
    ?>
    <picture>
      <source 
        srcset="<?= $image->srcset('webp') ?>" 
        sizes="<?= $sizes ?>" 
        type="image/webp"
      >
      <img 
        alt="<?= $image->alt() ?>" 
        src="<?= $image->resize(300)->url() ?>" 
        srcset="<?= $image->srcset() ?>" 
        sizes="<?= $sizes ?>" 
        width="<?= $image->resize(1800)->width() ?>" 
        height="<?= $image->resize(1800)->height() ?>"
      >
    </picture>
    <!-- project title -->
    <h2 class="projects__item-title"><?= $project->title() ?>
      <?php if ($project->title_alt()->isNotEmpty()) : ?>
        <span class="alt"> / <?= $project->title_alt() ?></span>
      <?php endif ?>
    </h2>
  </a>
</li>