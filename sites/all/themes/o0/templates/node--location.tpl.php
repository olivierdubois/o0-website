<?php
/**
 * @file
 * 'Location' content type.
 * 'Location' node template.
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

    <div class="row">
      <div class="large-4 medium-4 small-12 columns">
        <?php if (!empty($content['field_location_address'])): ?>
          <?php print render($content['field_location_address']); ?>
        <?php endif; ?>
        <?php if (!empty($content['field_location_phone'])): ?>
          <?php print render($content['field_location_phone']); ?>
        <?php endif; ?>
        <?php if (!empty($content['field_location_email'])): ?>
          <?php print render($content['field_location_email']); ?>
        <?php endif; ?>
      </div>
      <div class="large-4 medium-4 small-12 columns">
        <div class="field field-name-field-location-channels field-type-text-long field-label-hidden"><div class="field-items"><div class="field-item">
              <ul class="channels">
                <li class="facebook"><a href="#">/osquare</a></li>
                <li class="twitter"><a href="#">@olivierdubois</a></li>
                <li class="linkedin"><a href="#">/olivierccdubois</a></li>
              </ul>
        </div></div></div>
      </div>
      <div class="large-4 medium-4 small-12 columns">

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
