<?php if ($page == 0): ?>

	<div class="node <?php print $node->type ?> teaser<?php print ($node->sticky) ? " sticky" : ""; ?><?php print ($node->promote) ? " promoted" : ""; ?>">

		<h2><a href="<?php print $node_url ?>" rel="bookmark" title="Permanent link to: <?php print $title ?>"><?php print $title ?></a></h2>

		<?php print $picture ?>
			
		<div class="info submitted"><?php print $submitted ?></div>
		
		<div class="content"><?php print $content ?></div>
			
		<div class="clear"></div>

		<?php if ($links): ?>
			<div class="links">
				<div id=""><?php print $links ?></div>
			</div>
		<?php endif; ?>

	</div>

<?php else: ?>

	<?php drupal_set_title($title = "<span class=\"title-alt\">" . l(t("Forums"), "forum") . " | " . strip_tags($terms, "<a>") . " | " . "</span> " . $title) ?>

	<div class="node <?php print $node->type ?> body<?php print ($node->sticky) ? " sticky" : ""; ?><?php print ($node->promote) ? " promoted" : ""; ?> comment">
	
		<div class="comment-content">
	
			<?php print $content ?>
	
			<?php if ($signature): ?>
				<div class="user-signature">
					<?php print $signature ?>
				</div>
			<?php endif; ?>
	
		</div>
		
		<div class="comment-author">
			<?php print $picture ?>
			<div class="submitted"><?php print $name ?> <br /> <?php print $date ?></div>
		</div>
		<div class="links"><?php print $links ?></div>


		<?php if ($content_inside): ?> 
			<div id="content-inside"><?php print $content_inside ?></div>
		<?php endif; ?>

	</div>

<?php endif; ?>