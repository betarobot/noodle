<div class="comment<?php print ($comment->status) ? ' comment-unpublished-wrapper' : ''; print ($comment->uid == $node->uid) ? ' comment-author-wrapper' : ''; print ($comment->new) ? ' comment-new' : '' ?>">

	
	<?php if ($node->type == 'forum'): ?> 

		<?php
		 // Comment rendered for forum layout
		?>
		
		<?php if ($comment->status): ?>
			<span class="unpublished"><?php print t("unpublished") ?></span>
		<?php endif; ?>
		
		<?php if ($comment->new): ?> 
			<span class="new"><?php print $new ?></span>
		<?php endif; ?>
	
		<div class="comment-content">
		
			<h2><?php print $title ?></h2>
	
			<?php print $content ?>
	
			<?php if ($signature): ?>
				<div class="user-signature">
					<?php print $signature ?>
				</div>
			<?php endif; ?>
	
		</div>
		
		<div class="comment-author">
			<?php print $picture ?>
			<div class="submitted"><?php print $author ?> <br /> <?php print $date ?></div>
		</div>
		<div class="links"><?php print $links ?></div>		
		

	<?php else: ?>

		<?php
		 // Comment rendered for non-forum nodes
		?>

		<?php if ($comment->status): ?>
			<span class="unpublished"><?php print t("unpublished") ?></span>
		<?php endif; ?>
		
		<?php if ($comment->new): ?> 
			<span class="new"><?php print $new ?></span>
		<?php endif; ?>
	
		<div class="comment-content">
		
			<h2><?php print $title ?></h2>
	
			<?php print $content ?>
	
			<?php if ($signature): ?>
				<div class="user-signature">
					<?php print $signature ?>
				</div>
			<?php endif; ?>
	
		</div>
		
		<div class="comment-author">
			<?php print $picture ?>
			<div class="submitted"><?php print $author ?> <br /> <?php print $date ?></div>
		</div>
		<div class="links"><?php print $links ?></div>

	<?php endif; ?>

</div>