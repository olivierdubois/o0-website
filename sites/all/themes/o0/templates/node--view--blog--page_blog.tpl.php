<?php
/**
 * @file
 * 'Article' content type.
 * 'Blog' view (page).
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <a class="blocklevel" href="<?php print $node_url; ?>">
    <div class="node-content clearfix"<?php print $content_attributes; ?>>
      <?php
        // Hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
      ?>

      <?php if (!empty($content['field_article_image'])): ?>
        <?php //print render($content['field_article_image']); ?>
        <div class="field field-name-field-article-image field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('article_image_view_page_grid', $node->field_article_image['und'][0]['uri']); ?>" alt="<?php print $node->field_article_image['und'][0]['alt']; ?>" title="<?php print $node->field_article_image['und'][0]['title']; ?>" /></div></div></div>
      <?php else: ?>
        <div class="field field-name-field-article-image field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('article_image_view_page_grid', $content_placeholder_image); ?>" alt="Placeholder image" class="<?php print $content_placeholder_image_classes; ?>" /></div></div></div>
      <?php endif; ?>

      <?php print render($title_prefix); ?>
      <h2<?php print $title_attributes; ?> class="node-title title"><?php print $title; ?></h2>
      <?php print render($title_suffix); ?>

      <div class="meta">
        <?php if (!empty($content['field_global_pub_date'])): ?>
          <?php print render($content['field_global_pub_date']); ?>
        <?php endif; ?>
      </div>

    </div>
  </a>

  <footer>
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
  </footer>

</article>
