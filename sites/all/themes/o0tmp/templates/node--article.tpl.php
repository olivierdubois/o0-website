<?php
/**
 * @file
 * 'Article' content type.
 * 'Article' node template.
 *
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?> class="node-title title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php if ($page): ?>
    <h2<?php print $title_attributes; ?> class="node-title title"><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="meta submitted">
      <?php //print $user_picture; ?>
      <?php //print $submitted; ?>
    </div>
  <?php endif; ?>
  
  <div class="meta">
    <?php if (field_has_data('field_article_date')): ?>
      <?php print render($content['field_article_date']); ?>
    <?php endif; ?>
    <?php if ($node->created): ?><div class="feed-item-timestamp"><?php print format_date($node->created, 'custom', 'd/m/Y H:i'); ?></div><?php endif; ?>
  </div>
  
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // Hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <?php if (field_has_data('field_article_image')): ?>
      <?php print render($content['field_article_image']); ?>
      <?php /* <div class="field field-name-field-article-image field-type-image"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('article_image_modal_fullscreen', $node->field_article_image[$node->language][0]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('article_image_node', $node->field_article_image[$node->language][0]['uri']); ?>" alt="" /></a></div></div></div> */ ?>
    <?php endif; ?>

    <?php print render($content['body']); ?>
    
    <?php if (field_has_data('field_article_image_2')): ?>
      <div class="field-group-format field-group-div group-article-image-2 clearfix">
        <div class="field-group-format-wrapper" style="display: block;">
          <?php print render($content['field_article_image_2']); ?>
          <?php /* <?php foreach ($node->field_article_image_2[$node->language] as $key => $value) { ?>
            <div class="field field-name-field-article-image-2 field-type-image thumbnail"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('article_image_modal_fullscreen', $node->field_article_image_2[$node->language][$key]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('article_image_2_node', $node->field_article_image_2[$node->language][$key]['uri']); ?>" alt="" /></a></div></div></div>
          <?php } ?> */ ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (field_has_data('field_article_file')): ?>
      <?php print render($content['field_article_file']); ?>
    <?php endif; ?>
    
    <?php if (field_has_data('field_article_link')): ?>
      <?php print render($content['field_article_link']); ?>
    <?php endif; ?>

  </div>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
  ?>
  <?php if ($links): ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
