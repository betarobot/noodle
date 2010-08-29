<?php // $Id$ ?>

<?php if ($page == 0): ?>

  <div class="node <?php print $node->type ?> teaser<?php print($node->sticky) ? " sticky" : ""; ?><?php print($node->promote) ? " promoted" : ""; ?>">

    <h2><a href="<?php print $node_url ?>" rel="bookmark" title="Permanent link to: <?php print $title ?>"><?php print $title ?></a></h2>

    <?php if ($submitted): ?>
      <div class="info submitted"><?php print $submitted ?></div>
    <?php endif; ?>

    <?php print $picture ?>

    <div class="content"><?php print $content ?></div>

    <div class="clear"></div>

    <?php if ($terms): ?>
      <div class="info">
        <div class="links">
          <?php // taxonomy terms split by vocabulary ?>
          <?php print $terms_split; ?>
          <?php // taxonomy terms merged in one line ?>
          <?php // print "<span>" . t("Tags: ") . "</span>" . $terms ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($links): ?>
      <div class="info">
        <div class="links">
          <div><?php print $links ?></div>
        </div>
      </div>
    <?php endif; ?>

  </div>

<?php else: ?>

  <div class="node <?php print $node->type ?> body<?php print($node->sticky) ? " sticky" : ""; ?><?php print($node->promote) ? " promoted" : ""; ?>">

    <?php if ($submitted): ?>
      <div class="info submitted"><?php print $submitted ?></div>
    <?php endif; ?>

    <?php print $picture ?>

    <div class="content"><?php print $content ?></div>

    <?php if ($terms): ?>
      <div class="info">
        <div class="links">
          <?php // taxonomy terms split by vocabulary ?>
          <?php print $terms_split; ?>
          <?php // taxonomy terms merged in one line ?>
          <?php // print "<span>" . t("Tags: ") . "</span>" . $terms ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($links): ?>
      <div class="info">
        <div class="links"><?php print "<span>" . t("More: ") . "</span>" . $links ?></div>
      </div>
    <?php endif; ?>

    <?php if ($content_inside): ?> 
      <div id="content-inside"><?php print $content_inside ?></div>
    <?php endif; ?>

  </div>

<?php endif; ?>