<?php
/**
 * @file
 * 'Project' content type.
 * 'Project entity' view (block) embedded in 'Organization' node.
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <a class="blocklevel" href="<?php print $node_url; ?>">
    <div class="node-content clearfix"<?php print $content_attributes; ?>>
      <?php
        // Hide the links now so that we can render them later.
        hide($content['links']);
      ?>

      <?php if (!empty($content['field_project_image_t']) || !empty($content['field_project_image'])): ?>
        <div class="row">
          <div class="large-4 medium-4 small-4 columns">
            <?php if (!empty($content['field_project_image_t'])): ?>
              <div class="field field-name-field-project-image field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('project_image_view_embed', $node->field_project_image_t['und'][0]['uri']); ?>" alt="" /></div></div></div>
            <?php elseif (!empty($content['field_project_image'])): ?>
              <div class="field field-name-field-project-image field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('project_image_view_embed', $node->field_project_image['und'][0]['uri']); ?>" alt="" /></div></div></div>
            <?php endif; ?>
          </div>
          <div class="large-8 medium-8 small-8 columns">
      <?php endif; ?>

            <?php print render($title_prefix); ?>
            <h2<?php print $title_attributes; ?> class="node-title title"><?php print $title; ?></h2>
            <?php print render($title_suffix); ?>

            <?php if (!empty($content['field_project_type'])): ?>
              <?php print render($content['field_project_type']); ?>
            <?php endif; ?>

            <div class="meta">
              <?php if (!empty($content['field_project_date'])): ?>
                <?php print render($content['field_project_date']); ?>
              <?php endif; ?>
            </div>

      <?php if (!empty($content['field_project_image_t']) || !empty($content['field_project_image'])): ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </a>

  <footer>
    <?php
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
