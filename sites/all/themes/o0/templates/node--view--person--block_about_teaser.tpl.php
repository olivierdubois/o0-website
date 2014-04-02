<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' view ('About' teaser block).
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>

    <?php if (!empty($content['field_person_image'])): ?>
      <?php print render($content['field_person_image']); ?>
    <?php endif; ?>

    <?php if (!empty($content['field_person_about'])): ?>
      <?php if ($node->field_person_about['und'][0]['safe_summary']): ?>
        <div class="field field-name-field-person-about field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item" property="content:encoded"><p><?php print strip_tags($node->field_person_about['und'][0]['safe_summary']); ?></p></div></div></div>
      <?php else: ?>
        <div class="field field-name-field-person-about field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item" property="content:encoded"><p><?php print strip_tags(truncate_utf8($node->field_person_about['und'][0]['safe_value'], $max_length = 300, $wordsafe = TRUE, $add_ellipsis = TRUE, $min_wordsafe_length = 1)); ?></p></div></div></div>
      <?php endif; ?>
    <?php endif; ?>

  </div>

</article>
