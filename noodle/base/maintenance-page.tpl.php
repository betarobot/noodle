<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>

<title> <?php $page_title = $head_title; $page_title = mb_strtolower($page_title); print $page_title; ?> </title>

<meta http-equiv="Content-Style-Type" content="text/css" />
<?php print $head ?>
<?php print $styles ?>
<?php print $scripts ?>

<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta name="robots" content="index,follow" />
<meta name="robots" content="all" />

</head>

<body>

<div id="page-wrapper" class="<?php print str_replace('.', '-', $_SERVER['SERVER_NAME']); ?> maintenance">

  <?php //--------- content ---------- ?>
  <div id="content-wrapper">
  
    <div id="content-container">
    
      <?php if ($db_is_active != ""): ?>
        <div class="maintenance-ico"><?php print '<img src="' . path_to_theme() . '/img/ico-maintenance.png" />' ?></div>
      <?php else: ?>
        <div class="maintenance-ico"><?php print '<img src="' . path_to_theme() . '/img/ico-maintenance-nodb.png" />' ?></div>
      <?php endif; ?>
      
      <div id="content">
        <?php if ($title != ""): ?>
          <h2 class="title"><?php print $title ?></h2>
        <?php endif; ?>
        
        <?php print($content) ?>
      </div>				
      
    </div>

  </div>

  <div class="clear"></div>

  <?php //--------- footer ---------- ?>
  <div id="footer-wrapper">
    <div id="footer">
      <?php print $footer_message;?>
    </div>
  </div>

  <div class="clear"></div>

</div>


<?php print $closure;?>
</body>
</html>