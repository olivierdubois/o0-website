<?php
/**
 * @file
 * 'Testimonial' content type.
 * 'Testimonial' node template.
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <header>
  </header>

  <div class="node-content clearfix"<?php print $content_attributes; ?>>
    <?php
    // Hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    ?>

    <?php if (!empty($content['body'])): ?>
      <?php print render($content['body']); ?>
    <?php endif; ?>

    <?php if (!empty($content['field_testimonial_author_name'])): ?>
      <div class="field field-name-field-testimonial-author-name field-type-text field-label-hidden"><div class="field-items"><div class="field-item"><?php print $node->field_testimonial_author_name['und'][0]['safe_value']; ?><?php if (!empty($content['field_testimonial_author_title']) || !empty($content['field_testimonial_author_org'])): ?> <span class="separator">-</span> <?php endif; ?></div></div></div>
    <?php endif; ?>

    <?php if (!empty($content['field_testimonial_author_title'])): ?>
      <div class="field field-name-field-testimonial-author-title field-type-text field-label-hidden"><div class="field-items"><div class="field-item"><?php print $node->field_testimonial_author_title['und'][0]['safe_value']; ?><?php if (!empty($content['field_testimonial_author_org'])): ?><span class="separator">,</span> <?php endif; ?></div></div></div>
    <?php endif; ?>

    <?php if (!empty($content['field_testimonial_author_org'])): ?>
      <div class="field field-name-field-testimonial-author-org field-type-text field-label-hidden"><div class="field-items"><div class="field-item"><?php print $node->field_testimonial_author_org['und'][0]['safe_value']; ?></div></div></div>
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
