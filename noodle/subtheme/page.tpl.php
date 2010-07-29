<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>

<title> <?php $page_title = $head_title; $page_title = mb_strtolower($page_title); print $page_title; ?> </title>

<meta http-equiv="Content-Style-Type" content="text/css" />
<?php print $head ?>
<?php print $styles ?>
<?php print $scripts ?>

<?php if ($message_bottom || $sidebar_accordion) : ?> 
<script type="text/javascript">

$(document).ready(function(){

	<?php if ($message_bottom) : ?>
		$('#message-bottom').meerkat({
			width: '100%',
			position: 'bottom',
			close: '.close-meerkat',
			dontShowAgain: '.forget-meerkat',
			animationIn: 'slide',
			animationSpeed: 500
		});
	<?php endif; ?>
	
	<?php if ($sidebar_accordion) : ?>
		$(".accordionlink").switchTarget({
		   effect : 'sliding',
		   startHidden : true,
		   speed : 'slow'
		});
	<?php endif; ?>

});

</script>
<?php endif; ?>


<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta name="robots" content="index,follow" />
<meta name="robots" content="all" />
<?php //--- shall we change it to something else? say slogan? ?>
<meta name="description" content="<?php print check_plain($mission) ?>" />


</head>

<body> 


	
<div id="page-wrapper" class="<?php //--- quite a nice feature to have: servername helps to style multisite installs ?><?php print str_replace('.', '-', $_SERVER['SERVER_NAME']); ?> user-<?php if (user_is_logged_in()) {print "loggedin";} else {print "anonymous";}?>">

	<?php //--------- message top ---------- ?>
	<div id="message-top">

		<?php //--- not sure where to put this on yet ?>
		<?php if ($messages != ""): ?> 
			<div id="message"><?php print $messages ?></div> 
		<?php endif; ?>

	</div>

	<div class="clear"></div>

	<?php //--------- header ---------- ?>
	<div id="header-wrapper">
		<div id="header">
			<div id="header-top">

				<?php if ($logo): ?>
					<div class="logo"><a href="<?php print url(); ?>" title="<?php print($site_name) ?>"><img src="<?php print $logo; ?>" alt="logo" /></a></div>
				<?php endif; ?>
		
				<?php if ($primary_links): ?>
					<div id="navigation-primary"><?php print theme('links', $primary_links, array('class' =>'links', 'id' => 'navlist')) ?></div>
				<?php endif; ?>
				
				<?php if ($header_top) : ?>
					<div class="clear"></div>
					<?php print $header_top;?>
				<?php endif; ?>
					
				<div class="clear"></div>
			</div>
			
			<?php if ($header_blocks_1) : ?> 
				<div id="header-blocks-1"><?php print $header_blocks_1;?></div>
			<?php endif; ?>
			
			<?php if ($header_blocks_2) : ?> 
				<div id="header-blocks-2"><?php print $header_blocks_2;?></div>
			<?php endif; ?>
			
			<?php if ($header_blocks_3) : ?> 
				<div id="header-blocks-3"><?php print $header_blocks_3;?></div>
			<?php endif; ?>
			
			<?php if ($header_bottom) : ?>
				<div class="clear"></div>
				<div id="header-bottom"><?php print $header_bottom;?></div>
			<?php endif; ?>

		</div>		
	</div>

	<div class="clear"></div>

	<?php //--------- content ---------- ?>
	<div id="content-wrapper">

		<div id="content-container">

			<div id="content">
			
			<?php if ($content_top) : ?> 
				<div id="content-top"><?php print $content_top;?></div>
			<?php endif; ?>

				<?php print $breadcrumb ?>

				<?php if ($title != ""): ?> 
					<h2 class="title"><?php print $title ?></h2> 
				<?php endif; ?> 

				<?php if ($tabs != ""): ?>
					<div id="tabs"><?php print $tabs ?></div>
				<?php endif; ?>

				<?php if ($help != ""): ?>
					<?php print $help ?>
				<?php endif; ?>

				<?php print($content) ?>
				
				<?php if ($content_bottom) : ?> 
					<div id="content-bottom"><?php print $content_bottom;?></div>
				<?php endif; ?>
			
			</div>

			<?php //--------- sidebar ---------- ?>
			<div id="content-sidebar-right">
			
				<?php //--- here? really? --- ?>			
				<?php if ($secondary_links): ?>
					<div id="navigation-secondary"><?php print theme('links', $secondary_links, array('class' =>'links', 'id' => 'subnavlist')) ?></div>
				<?php endif; ?>
			
				<?php if ($sidebar_top) : ?> 
					<div id="sidebar-blocks-top"><?php print $sidebar_top;?></div>
				<?php endif; ?>
				<?php if ($sidebar_accordion) : ?> 
					<div id="sidebar-accordion"><?php print $sidebar_accordion;?></div>
				<?php endif; ?>
				<?php if ($sidebar_bottom) : ?> 
					<div id="sidebar-blocks-bottom"><?php print $sidebar_bottom;?></div>
				<?php endif; ?>	
				
			</div>

		</div>

	</div>

	<div class="clear"></div>

	<?php //--------- footer ---------- ?>
	<div id="footer-wrapper">
		<div id="footer">

			<?php if ($footer_top) : ?> 
				<div id="footer-top"><?php print $footer_top;?></div>
				<div class="clear"></div>
			<?php endif; ?>

			<?php if ($footer_blocks_1) : ?> 
				<div id="footer-blocks-1"><?php print $footer_blocks_1;?></div>
			<?php endif; ?>

			<?php if ($footer_blocks_2) : ?> 
				<div id="footer-blocks-2"><?php print $footer_blocks_2;?></div>
			<?php endif; ?>
			
			<?php if ($footer_blocks_3) : ?> 
				<div id="footer-blocks-3"><?php print $footer_blocks_3;?></div>
			<?php endif; ?>


			<?php if ($footer_bottom) : ?>
				<div class="clear"></div>
				<div id="footer-bottom"><?php print $footer_bottom;?></div>
			<?php endif; ?>

				<div class="clear"></div>
				<div id="footer-message">
					<?php print $footer_message;?>
					<br /><small>theme by [<a href="http://nood.org">noodorg</a>]</small>
				</div>

			</div>
		</div>
	</div>

	<div class="clear"></div>

	<?php //--------- message bottom ---------- ?>
	<?php if ($message_bottom) : ?> 
		<div id="message-bottom">

			<div class="close-meerkat"><?php print t('close');?></div>
			<div class="forget-meerkat"><?php print t('forget');?></div>

			<?php print $message_bottom;?>

		</div>
	<?php endif; ?>

</div>


<?php print $closure;?> 
</body>
</html>