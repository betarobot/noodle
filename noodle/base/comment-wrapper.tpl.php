<?php if ($content): ?>
	<div id="comments">
		<?php if ($node->type != 'forum'): ?>
			<h2 id="comments-title"><?php print t('Comments').' ('.$node->comment_count.')'; ?></h2>
		<?php endif; ?>
		<?php print $content; ?>
	</div>
<?php endif; ?>
