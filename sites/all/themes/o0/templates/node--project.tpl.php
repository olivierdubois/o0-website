<?php
/**
 * @file
 * 'Project' content type.
 * 'Project' node template.
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
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>
    <?php
      // Hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <div class="row">
      <div class="large-4 columns">
      
    <?php if (!empty($content['body'])): ?>
      <?php print render($content['body']); ?>
    <?php endif; ?>
      
    <?php if (!empty($content['field_project_link'])): ?>
      <?php print render($content['field_project_link']); ?>
    <?php endif; ?>
      
    <?php if (!empty($content['field_project_file'])): ?>
      <?php print render($content['field_project_file']); ?>
    <?php endif; ?>
    
      </div>

      <div class="large-8 columns">

    <?php if (!empty($content['field_project_image'])): ?>
      <?php //print render($content['field_project_image']); ?>
      <div class="field field-name-field-project-image field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('project_image_node', $node->field_project_image['und'][0]['uri']); ?>" alt="" /></div></div></div>
    <?php else: ?>
      <div class="field field-name-field-project-image field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('project_image_node', $content_placeholder_image); ?>" alt="" class="<?php print $content_placeholder_image_classes; ?>" /></div></div></div>
    <?php endif; ?>
    
    <?php if (!empty($content['field_project_image_2'])): ?>
      <div class="field-group-format field-group-div group-project-image-2 clearfix">
        <div class="field-group-format-wrapper" style="display: block;">
          <?php print render($content['field_project_image_2']); ?>
          <?php /* <?php foreach ($node->field_project_image_2[$node->language] as $key => $value) { ?>
            <div class="field field-name-field-project-image-2 field-type-image thumbnail"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('project_image_modal_fullscreen', $node->field_project_image_2[$node->language][$key]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('project_image_2_node', $node->field_project_image_2[$node->language][$key]['uri']); ?>" alt="" /></a></div></div></div>
          <?php } ?> */ ?>
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
