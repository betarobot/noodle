<?php // $Id$ ?>

<?php
/**
 * If you would like remove user picture wrapper if tehre is no user picture (or gravatar) available use following code:
 *
 *<?php if (!empty($account->picture) && file_exists($account->picture)): ?>
 *	<div class="picture">
 *	  <?php print $picture; ?>
 *	</div>
 *<?php endif; ?>
 *
 */
?>

<div class="picture">
  <?php print $picture; ?>
</div>
