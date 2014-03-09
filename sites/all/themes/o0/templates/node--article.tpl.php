<?php
/**
 * @file
 * 'Article' content type.
 * 'Article' node template.
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?> class="node-title title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <div class="meta submitted">
        <?php //print $user_picture; ?>
        <?php //print $submitted; ?>
      </div>
    <?php endif; ?>

    <div class="meta">
      <?php if (!empty($content['field_global_pub_date'])): ?>
        <?php print render($content['field_global_pub_date']); ?>
      <?php endif; ?>
    </div>
  </header>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>
    <?php
      // Hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <?php if (!empty($content['field_article_image'])): ?>
      <div class="field field-name-field-article-image field-type-image"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('article_image_modal_fullscreen', $node->field_article_image['und'][0]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('article_image_node', $node->field_article_image['und'][0]['uri']); ?>" alt="<?php print $node->field_article_image['und'][0]['alt']; ?>" title="<?php print $node->field_article_image['und'][0]['title']; ?>" /></a><div class="image-title"><?php print $node->field_article_image['und'][0]['title']; ?></div></div></div></div>
    <?php endif; ?>

    <?php if (!empty($content['body'])): ?>
      <?php print render($content['body']); ?>
    <?php endif; ?>
    
    <?php if (!empty($content['field_article_image_2'])): ?>
      <div class="field-group-format field-group-div group-article-image-2 clearfix">
        <div class="field-group-format-wrapper" style="display: block;">
          <?php foreach ($node->field_article_image_2['und'] as $key => $value) { ?>
            <div class="field field-name-field-article-image-2 field-type-image thumbnail"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('article_image_modal_fullscreen', $node->field_article_image_2['und'][$key]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('article_image_2_node', $node->field_article_image_2['und'][$key]['uri']); ?>" alt="<?php print $node->field_article_image_2['und'][$key]['alt']; ?>" title="<?php print $node->field_article_image_2['und'][$key]['title']; ?>" /></a></div></div></div>
          <?php } ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_article_file'])): ?>
      <?php print render($content['field_article_file']); ?>
    <?php endif; ?>
    
    <?php if (!empty($content['field_article_link'])): ?>
      <?php print render($content['field_article_link']); ?>
    <?php endif; ?>

  </div>

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

  <section>
    <?php print render($content['comments']); ?>
  </section>

</article>
