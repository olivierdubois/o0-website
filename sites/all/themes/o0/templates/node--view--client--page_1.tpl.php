<?php
/**
 * @file
 * 'Organization' content type.
 * 'Clients' view (page).
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

      <?php if (!empty($content['field_org_logo'])): ?>
        <div class="field field-name-field-org-logo field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('organization_logo_view_page_grid', $node->field_org_logo['und'][0]['uri']); ?>" alt="<?php print $title; ?> logo" /></div></div></div>
      <?php else: ?>
        <div class="field field-name-field-org-logo field-type-image"><div class="field-items"><div class="field-item"><?php print $title; ?></div></div></div>
      <?php endif; ?>

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
