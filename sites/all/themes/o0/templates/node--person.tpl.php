<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' node template.
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
    </div>
  </header>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>
    <?php
      // Hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <?php if (!empty($content['field_person_image'])): ?>
      <?php print render($content['field_person_image']); ?>
      <?php /* <div class="field field-name-field-person-image field-type-image"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('person_image_modal_fullscreen', $node->field_person_image[$node->language][0]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('person_image_node', $node->field_person_image[$node->language][0]['uri']); ?>" alt="" /></a></div></div></div> */ ?>
    <?php endif; ?>

    <?php if (!empty($content['body'])): ?>
      <?php print render($content['body']); ?>
    <?php endif; ?>

    <?php if (!empty($content['field_person_educ'])): ?>
      <h3>Education</h3>
      <div class="field field-name-field-person-educ field-type-field-collection">
        <div class="field-items">
          <?php foreach($content['field_person_educ']['#items'] as $entity_uri) :
            $field_collection_item = entity_load('field_collection_item', $entity_uri);
            foreach($field_collection_item as $field_collection_object) : ?>
              <div class="field-item row">
                <div class="large-9 columns">
                  <?php if ($field_collection_object->field_person_educ_educ): ?>
                    <div class="field field-name-field-person-educ-educ field-type-text"><?php print $field_collection_object->field_person_educ_educ['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_educ_inst): ?>
                    <div class="field field-name-field-person-educ-inst field-type-text"><?php print $field_collection_object->field_person_educ_inst['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_educ_loc): ?>
                    <div class="field field-name-field-person-educ-loc field-type-text"><?php print $field_collection_object->field_person_educ_loc['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_educ_descr): ?>
                    <div class="field field-name-field-person-educ-descr field-type-text"><?php print $field_collection_object->field_person_educ_descr['und'][0]['value']; ?></div>
                  <?php endif; ?>
                </div>
                <div class="large-3 columns">
                  <?php if ($field_collection_object->field_person_educ_date): ?>
                    <div class="field field-name-field-person-educ-date field-type-text"><?php print $field_collection_object->field_person_educ_date['und'][0]['value']; ?></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_educ_2'])): ?>
      <h3>Professional development</h3>
      <div class="field field-name-field-person-educ-2 field-type-field-collection">
        <div class="field-items">
          <?php foreach($content['field_person_educ_2']['#items'] as $entity_uri) :
            $field_collection_item = entity_load('field_collection_item', $entity_uri);
            foreach($field_collection_item as $field_collection_object) : ?>
              <div class="field-item row">
                <div class="large-9 columns">
                  <?php if ($field_collection_object->field_person_educ_educ): ?>
                    <div class="field field-name-field-person-educ-educ field-type-text"><?php print $field_collection_object->field_person_educ_educ['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_educ_inst): ?>
                    <div class="field field-name-field-person-educ-inst field-type-text"><?php print $field_collection_object->field_person_educ_inst['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_educ_loc): ?>
                    <div class="field field-name-field-person-educ-loc field-type-text"><?php print $field_collection_object->field_person_educ_loc['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_educ_descr): ?>
                    <div class="field field-name-field-person-educ-descr field-type-text"><?php print $field_collection_object->field_person_educ_descr['und'][0]['value']; ?></div>
                  <?php endif; ?>
                </div>
                <div class="large-3 columns">
                  <?php if ($field_collection_object->field_person_educ_date): ?>
                    <div class="field field-name-field-person-educ-date field-type-text"><?php print $field_collection_object->field_person_educ_date['und'][0]['value']; ?></div>
                  <?php endif; ?>
                </div>
              </div>
          <?php endforeach; endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <h3>Skills</h3>
    <?php if (!empty($content['field_person_skill'])): ?>
      <h4>Web technologies</h4>
      <div class="field field-name-field-person-skill field-type-field-collection clearfix">
        <div class="field-items">
          <?php foreach($content['field_person_skill']['#items'] as $entity_uri) :
            $field_collection_item = entity_load('field_collection_item', $entity_uri);
            foreach($field_collection_item as $field_collection_object) : ?>
              <div class="field-item">
                  <?php if ($field_collection_object->field_person_skill_skill && $field_collection_object->field_person_skill_level): ?>
                    <div class="field field-name-field-person-skill-level field-type-text"><input class="chart-doughnut" value="<?php print $field_collection_object->field_person_skill_level['und'][0]['value']; ?>" data-width="120" data-height="120" data-angleOffset=-125 data-angleArc=250 data-readOnly=true /></div>
                    <div class="field field-name-field-person-skill-skill field-type-text"><?php print $field_collection_object->field_person_skill_skill['und'][0]['value']; ?></div>
                  <?php endif; ?>
              </div>
            <?php endforeach; endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_skill_2'])): ?>
      <h4>Content management systems, etc.</h4>
      <div class="field field-name-field-person-skill-2 field-type-field-collection clearfix">
        <div class="field-items">
          <?php foreach($content['field_person_skill_2']['#items'] as $entity_uri) :
            $field_collection_item = entity_load('field_collection_item', $entity_uri);
            foreach($field_collection_item as $field_collection_object) : ?>
              <div class="field-item">
                <?php if ($field_collection_object->field_person_skill_skill && $field_collection_object->field_person_skill_level): ?>
                  <div class="field field-name-field-person-skill-level field-type-text"><input class="chart-doughnut" value="<?php print $field_collection_object->field_person_skill_level['und'][0]['value']; ?>" data-width="120" data-height="120" data-angleOffset=-125 data-angleArc=250 data-readOnly=true /></div>
                  <div class="field field-name-field-person-skill-skill field-type-text"><?php print $field_collection_object->field_person_skill_skill['und'][0]['value']; ?></div>
                <?php endif; ?>
              </div>
            <?php endforeach; endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_exper'])): ?>
      <h3>Experience</h3>
      <div class="field field-name-field-person-exper field-type-field-collection">
        <div class="field-items">
          <?php foreach($content['field_person_exper']['#items'] as $entity_uri) :
            $field_collection_item = entity_load('field_collection_item', $entity_uri);
            foreach($field_collection_item as $field_collection_object) : ?>
              <div class="field-item row">
                <div class="large-9 columns">
                  <?php if ($field_collection_object->field_person_exper_exper): ?>
                    <div class="field field-name-field-person-exper-exper field-type-text"><?php print $field_collection_object->field_person_exper_exper['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_exper_org): ?>
                    <div class="field field-name-field-person-exper-org field-type-text"><?php print $field_collection_object->field_person_exper_org['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_exper_loc): ?>
                    <div class="field field-name-field-person-exper-loc field-type-text"><?php print $field_collection_object->field_person_exper_loc['und'][0]['value']; ?></div>
                  <?php endif; ?>
                  <?php if ($field_collection_object->field_person_exper_descr): ?>
                    <div class="field field-name-field-person-exper-descr field-type-text"><?php print $field_collection_object->field_person_exper_descr['und'][0]['value']; ?></div>
                  <?php endif; ?>
                </div>
                <div class="large-3 columns">
                  <?php if ($field_collection_object->field_person_exper_date): ?>
                    <div class="field field-name-field-person-exper-date field-type-text"><?php print $field_collection_object->field_person_exper_date['und'][0]['value']; ?></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; endforeach; ?>
        </div>
      </div>
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
