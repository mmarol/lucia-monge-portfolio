<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
</main>

<footer class="footer">
  <?php $footerItem = $site->footer()->toObject() ?>
  <p class="footer__item"><?= $footerItem->copyright() ?></p>
  <p class="footer__item"><?= $footerItem->email() ?></p>
  <?= $footerItem->socials() ?>
</footer>

<?= js([
  'assets/js/main.js',
  '@auto'
]) ?>

</body>

</html>