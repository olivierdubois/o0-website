<?php
/**
 * @file
 * 'Project' content type.
 * 'Project' node template.
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>
    <?php
      // Hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <div class="row">
      <div class="large-4 medium-5 columns">

        <header>
          <?php print render($title_prefix); ?>
          <?php if (!$page): ?>
            <h2<?php print $title_attributes; ?> class="node-title title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
          <?php else: ?>
            <h1<?php print $title_attributes; ?> class="title" id="page-title"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>

          <?php if (!empty($content['field_project_type'])): ?>
            <?php print render($content['field_project_type']); ?>
          <?php endif; ?>

          <?php if ($display_submitted): ?>
            <div class="meta submitted">
              <?php //print $user_picture; ?>
              <?php //print $submitted; ?>
            </div>
          <?php endif; ?>

          <div class="meta">
            <?php if (!empty($content['field_project_date'])): ?>
              <?php print render($content['field_project_date']); ?>
            <?php endif; ?>
          </div>
        </header>

        <?php if (!empty($content['field_project_image'])): ?>
          <?php if (empty($content['field_project_image_mobile'])): ?>
            <div class="field field-name-field-project-image field-type-image show-for-small"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url($variables['field_project_image__image_style__fullscreen'], $node->field_project_image['und'][0]['uri']); ?>" class="colorbox-inline" rel="node-field-project-image"><img typeof="foaf:Image" src="<?php print image_style_url($variables['field_project_image__image_style__node'], $node->field_project_image['und'][0]['uri']); ?>" alt="<?php print $node->field_project_image['und'][0]['alt']; ?>" title="<?php print $node->field_project_image['und'][0]['title']; ?>" /></a></div></div></div>
          <?php else: ?>
            <div class="field field-name-field-project-image field-type-image show-for-small"><div class="field-items"><div class="field-item">
              <a href="<?php print image_style_url($variables['field_project_image__image_style__fullscreen'], $node->field_project_image['und'][0]['uri']); ?>" class="colorbox-inline" rel="node-field-project-image">
                <img typeof="foaf:Image" src="<?php print image_style_url($variables['field_project_image__image_style__node'], $node->field_project_image['und'][0]['uri']); ?>" alt="" />
                <img class="field-name-field-project-image-mobile-laptop-overlay" typeof="foaf:Image" src="<?php print image_style_url('project_image_mobile_laptop_overlay', $node->field_project_image_mobile['und'][0]['uri']); ?>" alt="<?php print $node->field_project_image_mobile['und'][0]['alt']; ?>" title="<?php print $node->field_project_image_mobile['und'][0]['title']; ?>" />
              </a>
              <a href="<?php print image_style_url('project_image_mobile_modal_fullscreen', $node->field_project_image_mobile['und'][0]['uri']); ?>" class="colorbox-inline" rel="node-field-project-image"></a>
            </div></div></div>
          <?php endif; ?>
        <?php else: ?>
          <div class="field field-name-field-project-image field-type-image show-for-small"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url($variables['field_project_image__image_style__node'], $variables['content_placeholder_image']); ?>" alt="Placeholder image" class="<?php print $variables['content_placeholder_image_classes']; ?>" /></div></div></div>
        <?php endif; ?>

        <?php if (!empty($content['field_global_r_organization'])): ?>
          <?php print views_embed_view('organization_reference', 'project_node_body', $node->nid); ?>
        <?php endif; ?>

        <?php if (!empty($content['body'])): ?>
          <?php print render($content['body']); ?>
        <?php endif; ?>

        <?php if (!empty($content['field_global_t_service'])): ?>
          <h4>My work on this project</h4>
          <?php print render($content['field_global_t_service']); ?>
        <?php endif; ?>

        <?php if (!empty($variables['field_global_t_person_exper__term'])): ?>
          <?php if ($variables['field_global_t_person_exper__term'] == 'Freelance web developer'): ?>
            <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
              <p>This project was completed as part of my freelance web development work.</p>
            </div></div></div>
          <?php endif; ?>
          <?php if ($variables['field_global_t_person_exper__term'] == 'Shervin'): ?>
            <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
              <p>This project was completed as part of my work as Lead Web Developer at Shervin Communications.</p>
            </div></div></div>
          <?php endif; ?>
          <?php if ($variables['field_global_t_person_exper__term'] == 'Wild ARC'): ?>
            <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
              <p>This project was completed as part of my volunteer work at the BC SPCA Wild ARC.</p>
            </div></div></div>
          <?php endif; ?>
          <?php if ($variables['field_global_t_person_exper__term'] == 'Freelance graphic designer'): ?>
            <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
                  <p>This project was completed as part of my freelance graphic design work.</p>
                </div></div></div>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (!empty($content['field_project_link'])): ?>
          <?php print render($content['field_project_link']); ?>
        <?php endif; ?>

      </div>

      <div class="large-8 medium-7 columns">

        <?php if (!empty($content['field_project_image'])): ?>
          <?php if (empty($content['field_project_image_mobile'])): ?>
            <div class="field field-name-field-project-image field-type-image project-type-<?php print $variables['field_project_t_project_type__term']; ?> hide-for-small"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url($variables['field_project_image__image_style__fullscreen'], $node->field_project_image['und'][0]['uri']); ?>" class="colorbox-inline" rel="node-field-project-image"><img typeof="foaf:Image" src="<?php print image_style_url($variables['field_project_image__image_style__node'], $node->field_project_image['und'][0]['uri']); ?>" alt="<?php print $node->field_project_image['und'][0]['alt']; ?>" title="<?php print $node->field_project_image['und'][0]['title']; ?>" /></a></div></div></div>
          <?php else: ?>
            <div class="field field-name-field-project-image field-type-image hide-for-small"><div class="field-items"><div class="field-item">
              <a href="<?php print image_style_url($variables['field_project_image__image_style__fullscreen'], $node->field_project_image['und'][0]['uri']); ?>" class="colorbox-inline" rel="node-field-project-image">
                <img typeof="foaf:Image" src="<?php print image_style_url($variables['field_project_image__image_style__node'], $node->field_project_image['und'][0]['uri']); ?>" alt="" />
                <img class="field-name-field-project-image-mobile-laptop-overlay" typeof="foaf:Image" src="<?php print image_style_url('project_image_mobile_laptop_overlay', $node->field_project_image_mobile['und'][0]['uri']); ?>" alt="<?php print $node->field_project_image_mobile['und'][0]['alt']; ?>" title="<?php print $node->field_project_image_mobile['und'][0]['title']; ?>" />
              </a>
              <a href="<?php print image_style_url('project_image_mobile_modal_fullscreen', $node->field_project_image_mobile['und'][0]['uri']); ?>" class="colorbox-inline" rel="node-field-project-image"></a>
            </div></div></div>
          <?php endif; ?>
        <?php else: ?>
          <div class="field field-name-field-project-image field-type-image hide-for-small"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url($variables['field_project_image__image_style__node'], $variables['content_placeholder_image']); ?>" alt="Placeholder image" class="<?php print $variables['content_placeholder_image_classes']; ?>" /></div></div></div>
        <?php endif; ?>

        <?php
        /**
         * Merge '$node->field_project_image_mobile' into '$node->field_project_image_2'
         * array in order to display all secondary images in 1 grid display.
         */
        // Get the number of columns for the display.
        $view_column_number = 3;
        // Calculate the width of the columns based on a 12-column Foundation grid.
        $foundation_grid_columns = 12;
        $foundation_grid_column_width = ($foundation_grid_columns / $view_column_number);
        // Translate results into Foundation classes.
        $foundation_grid_column_classes = 'large-' . $foundation_grid_column_width . ' medium-6 small-12 columns';
        // Merge the 2 arrays.
        $node_field_project_image_2 = '';
        if (!empty($content['field_project_image_2'])) {
          foreach ($node->field_project_image_2['und'] as $key => $value) {
            $node_field_project_image_2[] = '<div class="field field-name-field-project-image-2 field-type-image thumbnail ' . $foundation_grid_column_classes . '"><div class="field-items"><div class="field-item"><a href="' . image_style_url('project_image_modal_fullscreen', $node->field_project_image_2['und'][$key]['uri']) . '" class="colorbox-inline" rel="node-field-project-image"><img typeof="foaf:Image" src="' . image_style_url('project_image_2_node', $node->field_project_image_2['und'][$key]['uri']) . '" alt="' . $node->field_project_image_2['und'][$key]['alt'] . '" title="' . $node->field_project_image_2['und'][$key]['title'] . '" /></a></div></div></div>';
          }
        }
        if (!empty($content['field_project_image_mobile'])) {
          foreach ($node->field_project_image_mobile['und'] as $key => $value) {
            $node_field_project_image_2[] = '<div class="field field-name-field-project-image-mobile field-type-image thumbnail ' . $foundation_grid_column_classes . '"><div class="field-items"><div class="field-item"><a href="' . image_style_url('project_image_mobile_modal_fullscreen', $node->field_project_image_mobile['und'][$key]['uri']) . '" class="colorbox-inline" rel="node-field-project-image"><img typeof="foaf:Image" src="' . image_style_url('project_image_mobile_2_node', $node->field_project_image_mobile['und'][$key]['uri']) . '" alt="' . $node->field_project_image_mobile['und'][$key]['alt'] . '" title="' . $node->field_project_image_mobile['und'][$key]['title'] . '" /></a></div></div></div>';
          }
        }
        // Count the number of items in the new array.
        $node_field_project_image_2_count = count($node_field_project_image_2);
        $i = 0;
        ?>

        <?php if (!empty($node_field_project_image_2)): ?>
          <div class="field-group-format field-group-div group-project-image-2 clearfix">
            <div class="field-group-format-wrapper" style="display: block;">
              <?php foreach ($node_field_project_image_2 as $key => $value): $i++; ?>
                <?php if (is_int(($i - 1) / $view_column_number)): ?>
                  <div class="row">
                <?php endif; ?>
                    <?php print $node_field_project_image_2[$key]; ?>
                <?php if (is_int($i/$view_column_number) || $i == $node_field_project_image_2_count): ?>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>

    </div>

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

<script>
  (function($, Drupal, window, document, undefined) {
    $(window).ready(function() {
      mqColorboxGroup();
    });
    $(window).resize(function() {
      mqColorboxGroup();
    });
  })(jQuery, Drupal, this, this.document);
</script>
