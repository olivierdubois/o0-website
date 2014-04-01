<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' view ('Software' block).
 *
 */
?>
<article class="<?php print $classes; ?> node-<?php print $node->nid; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>

    <h3>Software</h3>
    <div class="row">
      <div class="large-4 medium-5 columns">

        <?php if (!empty($content['field_person_software'])): ?>
          <?php print render($content['field_person_software']); ?>
        <?php endif; ?>

      </div>
      <div class="large-8 medium-7 columns">

        <?php if (!empty($content['field_person_software_2'])): ?>
          <?php print render($content['field_person_software_2']); ?>
        <?php endif; ?>

      </div>
    </div>

  </div>

</article>
