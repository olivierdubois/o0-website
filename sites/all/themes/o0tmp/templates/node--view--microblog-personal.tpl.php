<div id="node-<?php print $node->nid; ?>" class="node<?php print ' type-'.$type; ?><?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php if (!$page): ?>

  <h2 class="title"><a href="<?php print $node_url; ?>" title="<?php print $title; ?>"><?php print $title; ?></a></h2>

  <?php if ($node->created): ?><div class="feed-item-timestamp"><?php print format_date($node->created, 'custom', 'd/m/Y H:i'); ?></div><?php endif; ?>

  <div class="content">
    <?php print render($content); ?>
  </div>

  <div class="comments">
    <a href="<?php print $node_url; ?>#comments">Add comment</a>
  </div>

<?php endif; ?>

<?php if ($page): ?>

  <h2 class="title"><?php print $title; ?></h2>

  <?php if ($node->created): ?><div class="feed-item-timestamp"><?php print format_date($node->created, 'custom', 'd/m/Y H:i'); ?></div><?php endif; ?>

  <div class="content">
    <?php print render($content); ?>
  </div>

  <div class="comments">
    <a href="<?php print $node_url; ?>#comments">Add comment</a>
  </div>

<?php endif; ?>

</div>