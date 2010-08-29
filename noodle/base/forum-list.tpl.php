<?php // $Id$ ?>

<table id="forum-<?php print $forum_id; ?>">
	<thead>
		<tr>
			<th><?php print t('Forum'); ?></th>
			<th><?php print t('Topics');?></th>
			<th><?php print t('Posts'); ?></th>
			<th><?php print t('Last post'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($forums as $child_id => $forum): ?>
		<tr id="forum-list-<?php print $child_id; ?>" class="<?php print $forum->zebra; ?>">
			<td <?php print $forum->is_container ? 'colspan="4" class="container"' : 'class="forum"'; ?>>
				<?php /* Enclose the contents of this cell with X divs, where X is the
							 * depth this forum resides at. This will allow us to use CSS
							 * left-margin for indenting.
							 */ ?>
				<?php print str_repeat('<div class="indent">', $forum->depth); ?>
					<div class="name"><a href="<?php print $forum->link; ?>"><?php print $forum->name; ?></a></div>
					<?php if ($forum->description): ?>
						<div class="description"><?php print $forum->description; ?></div>
					<?php endif; ?>
				<?php print str_repeat('</div>', $forum->depth); ?>
			</td>
			<?php if (!$forum->is_container): ?>
				<td class="topics">
					<?php print $forum->num_topics ?>
					<?php if ($forum->new_topics): ?>
						<br />
						<a href="<?php print $forum->new_url; ?>"><?php print $forum->new_text; ?></a>
					<?php endif; ?>
				</td>
				<td class="posts"><?php print $forum->num_posts ?></td>
				<td class="last-reply"><?php print $forum->last_reply ?></td>
			<?php endif; ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
