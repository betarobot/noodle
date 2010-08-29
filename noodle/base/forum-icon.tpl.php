<?php // $Id$ ?>

<?php if ($new_posts): ?>
  <a name="new">
<?php endif; ?>
  
  <?php print theme('image', drupal_get_path('theme', 'noodle') . '/img/forum-' . $icon . '.png', t('forum icon ' . $icon)); ?>

<?php if ($new_posts): ?>
  </a>
<?php endif; ?>
