<?php
/**
 * @file
 * 'Organization' content type.
 * 'Organization' node template.
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

    <?php if (!empty($content['field_org_logo'])): ?>
      <div class="row">
        <div class="large-8 columns">
    <?php endif; ?>

          <?php if (!empty($content['body'])): ?>
            <?php print render($content['body']); ?>
          <?php endif; ?>

          <?php if (!empty($variables['field_global_t_person_exper__term'])): ?>
            <?php if ($variables['field_global_t_person_exper__term'] == 'Freelancer'): ?>
              <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
                    <p>I worked with <?php print $title; ?> during freelance work.</p>
                  </div></div></div>
            <?php endif; ?>
            <?php if ($variables['field_global_t_person_exper__term'] == 'Shervin'): ?>
              <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
                    <p>I worked with <?php print $title; ?> as part of my work as the lead front-end web developer at Shervin Communications.</p>
                  </div></div></div>
            <?php endif; ?>
            <?php if ($variables['field_global_t_person_exper__term'] == 'Wild ARC'): ?>
              <div class="field field-name-field-global-t-person-exper-descr field-type-text"><div class="field-items"><div class="field-item">
                    <p>I worked with <?php print $title; ?> as part of my volunteer work at the BC SPCA Wild ARC.</p>
                  </div></div></div>
            <?php endif; ?>
          <?php endif; ?>

          <?php
            $view = views_get_view('testimonial_reference');
            $view_preview = $view->preview('organization_node');
            $view_result_count = count($view->result);
            if (!empty($view->result)):
          ?>
            <h5>What they are saying about me</h5>
            <?php print views_embed_view('testimonial_reference', 'organization_node', $node->nid); ?>
          <?php endif; ?>

          <?php
            $view = views_get_view('project_reference');
            $view_preview = $view->preview('organization_node');
            $view_result_count = count($view->result);
            if (!empty($view->result)):
          ?>
            <?php if ($view_result_count <= 1): ?>
              <h5>Project</h5>
            <?php else: ?>
              <h5>Projects</h5>
            <?php endif; ?>
            <?php print views_embed_view('project_reference', 'organization_node', $node->nid); ?>
          <?php endif; ?>

    <?php if (!empty($content['field_org_logo'])): ?>
        </div>
        <div class="large-4 columns">
          <div class="field field-name-field-org-logo field-type-image"><div class="field-items"><div class="field-item"><img typeof="foaf:Image" src="<?php print image_style_url('organization_logo_node', $node->field_org_logo['und'][0]['uri']); ?>" alt="<?php print $title; ?> logo" /></div></div></div>
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
