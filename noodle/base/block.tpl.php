<?php // $Id$ ?>

<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">
  
  <?php if ($block->region == "sidebar_accordion"): ?>
    <h2><a href="#accordion-link-<?php print $block_id ?>" class="accordionlink"><?php print $block->subject ?></a></h2>
    
  <?php else:?>
  
    <?php if ($block->subject): ?>
      <h2><?php print $block->subject ?></h2>
    <?php endif;?>
  
  <?php endif;?>


  <?php if ($block->region == "sidebar_accordion"): ?>
    <div id="accordion-link-<?php print $block_id ?>" class="content">
      <?php print $block->content ?>
    </div>
  <?php else:?>
    <div class="content">
      <?php print $block->content ?>
    </div>
  <?php endif;?>
  
  <div class="clear"></div>
</div>