<?php if ($prev || $next): ?>
  <div class="forum-topic-navigation clear-block">
    <h3><?php print t("Forum navigation"); ?></h3>
    <?php if ($prev): ?>
      <a href="<?php print $prev_url; ?>" class="topic-previous" title="<?php print t('Go to previous forum topic') ?>">&larr; <?php print $prev_title ?></a>
    <?php endif; ?>
    <?php if ($next): ?>
      <a href="<?php print $next_url; ?>" class="topic-next" title="<?php print t('Go to next forum topic') ?>"><?php print $next_title ?> &rarr;</a>
    <?php endif; ?>
  </div>
<?php endif; ?>
