<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' view ('About' block).
 *
 */
?>
<article class="<?php print $classes; ?> node-<?php print $node->nid; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>

    <?php if (!empty($content['field_person_image'])): ?>
      <div class="field field-name-field-person-image field-type-image"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('person_image_modal_fullscreen', $node->field_person_image['und'][0]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('person_image_head_node', $node->field_person_image['und'][0]['uri']); ?>" alt="<?php print $node->field_person_image['und'][0]['alt']; ?>" title="<?php print $node->field_person_image['und'][0]['title']; ?>" /></a></div></div></div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_about'])): ?>
      <?php print render($content['field_person_about']); ?>
    <?php endif; ?>

  </div>

</article>
