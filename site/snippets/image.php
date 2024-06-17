<?php
  $sizes = $sizes ?? "100vw";
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