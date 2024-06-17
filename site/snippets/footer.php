</main>

<footer class="footer">
  <?php $footerItem = $site->footer()->toObject() ?>
  <p class="footer__item"><?= $footerItem->copyright() ?></p>
  <p class="footer__item"><?= $footerItem->email() ?></p>
  <?= $footerItem->socials() ?>
</footer>

<div id="cursor"></div>

<?= js([
  'assets/js/main.js',
  '@auto'
]) ?>

</body>

</html>