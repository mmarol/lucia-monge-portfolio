<?php /* Single date */ ?>
<?php if ($dates->dates_type() == 'single') : ?>
  <dl class="dates single">
    <dt><?= $dates->dates_single()->toDate('M j, Y') ?></dt>
    <dd><?= $dates->dates_single_details() ?></dd>
  </dl>

  <?php /* Multiple dates */ ?>
<?php elseif ($dates->dates_type() == 'multiple') : ?>
  <dl class="dates multiple">
    <?php foreach ($dates->dates_multiple()->toStructure() as $date) : ?>
      <dt><?= $date->date_multiple()->toDate('M j, Y') ?></dt>
      <dd><?= $date->date_details() ?></dd>
    <?php endforeach ?>
  </dl>

  <?php /* Date range */ ?>
<?php elseif ($dates->dates_type() == 'range') : ?>
  <dl class="dates range">
    <dt><?= $dates->dates_range_start()->toDate('M j, Y') ?> - <?= $dates->dates_range_end()->toDate('M j, Y') ?></dt>
    <dd><?= $dates->dates_range_details() ?></dd>
  </dl>
<?php endif ?>