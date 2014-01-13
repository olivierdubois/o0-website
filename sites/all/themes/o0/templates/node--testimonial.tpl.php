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
      <?php print render($content['field_testimonial_author_name']); ?>
    <?php endif; ?>

    <?php if (!empty($content['field_testimonial_author_title'])): ?>
      <?php print render($content['field_testimonial_author_title']); ?>
    <?php endif; ?>

    <?php if (!empty($content['field_testimonial_author_org'])): ?>
      <?php print render($content['field_testimonial_author_org']); ?>
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