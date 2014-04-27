<?php




/**
 * Implements hook_html_head_alter().
 */
function o0_html_head_alter(&$head_elements) {
  // HTML5 charset declaration.
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );

  // Optimize mobile viewport.
  $head_elements['mobile_viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width',
    ),
  );

  // Force IE to use Chrome Frame if installed.
  $head_elements['chrome_frame'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'content' => 'ie=edge, chrome=1',
      'http-equiv' => 'x-ua-compatible',
    ),
  );

  // Remove image toolbar in IE.
  $head_elements['ie_image_toolbar'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'ImageToolbar',
      'content' => 'false',
    ),
  );
}




/**
 * Override or insert variables into the html template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered. This is usually "html", but can
 *   also be "maintenance_page" since zen_preprocess_maintenance_page() calls
 *   this function to have consistent variables.
 */
function o0_preprocess_html(&$variables, $hook) {
  // Attributes for html element.
  $variables['html_attributes_array'] = array(
    'lang' => $variables['language']->language,
    'dir' => $variables['language']->dir,
  );
  // Construct page title.
  if (drupal_get_title()) {
    $head_title = array(
      'title' => strip_tags(drupal_get_title()),
      'name' => check_plain(variable_get('site_name', 'Drupal')),
      'slogan' => filter_xss_admin(variable_get('site_slogan', '')),
    );
  }
  else {
    $head_title = array('name' => check_plain(variable_get('site_name', 'Drupal')));
    if (variable_get('site_slogan', '')) {
      $head_title['slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
  }
  $variables['head_title_array'] = $head_title;
  $variables['head_title'] = implode(' | ', $head_title);
  $variables['head_title'] = preg_replace('/\|/', '-', $variables['head_title']);
  $variables['head_title'] = preg_replace('/\-/', '|', $variables['head_title'], 1);
  // Add ZURB Foundation framework CSS files.
  drupal_add_css('sites/all/libraries/foundation/css/normalize.css', array('group' => CSS_DEFAULT));
  drupal_add_css('sites/all/libraries/foundation/css/foundation.min.css', array('group' => CSS_DEFAULT));
  // Add CSS files from libraries.
  drupal_add_css('sites/all/libraries/font-awesome/css/font-awesome.min.css', array('group' => CSS_DEFAULT));
  // Add ZURB Foundation framework JavaScript files.
  drupal_add_js('sites/all/libraries/foundation/js/vendor/modernizr.js', array('group' => JS_LIBRARY));
  drupal_add_js('sites/all/libraries/foundation/js/foundation.min.js', array('group' => JS_LIBRARY));
  // Add JavaScript files from libraries.
  drupal_add_js('sites/all/themes/o0/libraries/colorbox/styles/o0/colorbox_style.js', array('group' => JS_DEFAULT));
  // Attributes for body element for custom 403/404 error pages.
  $http_header_status = drupal_get_http_header('status');
  if ($http_header_status == '403 Forbidden') {
    $variables['classes_array'][] = 'page-error page-error-403';
  }
  if ($http_header_status == '404 Not Found') {
    $variables['classes_array'][] = 'page-error page-error-404';
  }
  // Attributes for body element.
  $path_alias_1 = 'path-alias-1-' . arg(0, drupal_get_path_alias());
  $path_alias_2 = 'path-alias-2-' . arg(1, drupal_get_path_alias());
  $path_alias = $path_alias_1 . ' ' . $path_alias_2;
  $variables['classes_array'][] = $path_alias;
}




/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function o0_process_html(&$variables, $hook) {
  // Flatten out html_attributes.
  $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
}




/**
 * Implements template_preprocess_page
 *
 * Add convenience variables and template suggestions
 */
function o0_preprocess_page(&$variables) {

  // Template suggestions for custom 403/404 error pages.
  $http_header_status = drupal_get_http_header('status');
  if ($http_header_status == '403 Forbidden') {
    $variables['theme_hook_suggestions'][] = 'page__403';
  }
  if ($http_header_status == '404 Not Found') {
    $variables['theme_hook_suggestions'][] = 'page__404';
  }

  // Add Javascript files depending on node type or page path.
  if ((isset($variables['node']) && $variables['node']->type == 'person') || (arg(0, drupal_get_path_alias()) == 'about')) {
    // Add amCharts library JavaScript files.
    drupal_add_js('sites/all/libraries/amcharts/amcharts/amcharts.js', array('group' => JS_LIBRARY, 'weight' => 5000));
    drupal_add_js('sites/all/libraries/amcharts/amcharts/serial.js', array('group' => JS_LIBRARY, 'weight' => 5000));
    // Add amMap library JavaScript files.
    drupal_add_js('sites/all/libraries/ammap/ammap/ammap.js', array('group' => JS_LIBRARY, 'weight' => 5010));
    drupal_add_js('sites/all/libraries/ammap/ammap/maps/js/worldLow.js', array('group' => JS_LIBRARY, 'weight' => 5010));
  }

  // Site navigation links.
  $variables['main_menu_links'] = '';
  if (isset($variables['main_menu'])) {
    $variables['main_menu_links'] = theme('links__system_main_menu', array(
      'links' => $variables['main_menu'],
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array('link-list'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }
  
  $variables['secondary_menu_links'] = '';
  if (isset($variables['secondary_menu'])) {
    $variables['secondary_menu_links'] = theme('links__system_secondary_menu', array(
      'links' => $variables['secondary_menu'],
      'attributes' => array(
        'id'    => 'secondary-menu',
        'class' => array('secondary', 'nav-bar'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }

  // ZURB Foundation - Dynamic column for 'content', and 'sidebar' regions.
  $sidebar_first = $variables['page']['sidebar_first'];
  $sidebar_last = $variables['page']['sidebar_last'];
  if (!empty($sidebar_first) && !empty($sidebar_last)) {
    $variables['foundation_grid__content_container'] = 'large-6';
    $variables['foundation_grid__sidebar_container'] = 'large-6';
    $variables['foundation_grid__sidebar_first'] = 'large-6';
    $variables['foundation_grid__sidebar_last'] = 'large-6';
  } elseif (empty($sidebar_first) && !empty($sidebar_last)) {
    $variables['foundation_grid__content_container'] = 'large-8';
    $variables['foundation_grid__sidebar_container'] = 'large-4';
    $variables['foundation_grid__sidebar_first'] = '';
    $variables['foundation_grid__sidebar_last'] = 'large-12';
  } elseif (!empty($sidebar_first) && empty($sidebar_last)) {
    $variables['foundation_grid__content_container'] = 'large-8';
    $variables['foundation_grid__sidebar_container'] = 'large-4';
    $variables['foundation_grid__sidebar_first'] = 'large-12';
    $variables['foundation_grid__sidebar_last'] = '';
  } else {
    $variables['foundation_grid__content_container'] = 'large-12';
    $variables['foundation_grid__sidebar_container'] = '';
    $variables['foundation_grid__sidebar_first'] = '';
    $variables['foundation_grid__sidebar_last'] = '';
  }

  // ZURB Foundation - Dynamic column for 'preface' regions.
  $preface_first = $variables['page']['preface_first'];
  $preface_second = $variables['page']['preface_second'];
  $preface_third = $variables['page']['preface_third'];
  $preface_last = $variables['page']['preface_last'];
  if (!empty($preface_first) && !empty($preface_second) && !empty($preface_third) && !empty($preface_last)) {
    $variables['foundation_grid__preface_first'] = 'large-3';
    $variables['foundation_grid__preface_second'] = 'large-3';
    $variables['foundation_grid__preface_third'] = 'large-3';
    $variables['foundation_grid__preface_last'] = 'large-3';
  } elseif (!empty($preface_first) && !empty($preface_second) && empty($preface_third) && !empty($preface_last)) {
    $variables['foundation_grid__preface_first'] = 'large-4';
    $variables['foundation_grid__preface_second'] = 'large-4';
    $variables['foundation_grid__preface_third'] = '';
    $variables['foundation_grid__preface_last'] = 'large-4';
  } elseif (!empty($preface_first) && empty($preface_second) && empty($preface_third) && !empty($preface_last)) {
    $variables['foundation_grid__preface_first'] = 'large-6';
    $variables['foundation_grid__preface_second'] = '';
    $variables['foundation_grid__preface_third'] = '';
    $variables['foundation_grid__preface_last'] = 'large-6';
  } elseif (!empty($preface_first) && empty($preface_second) && empty($preface_third) && empty($preface_last)) {
    $variables['foundation_grid__preface_first'] = 'large-12';
    $variables['foundation_grid__preface_second'] = '';
    $variables['foundation_grid__preface_third'] = '';
    $variables['foundation_grid__preface_last'] = '';
  } else {
    $variables['foundation_grid__preface_first'] = '';
    $variables['foundation_grid__preface_second'] = '';
    $variables['foundation_grid__preface_third'] = '';
    $variables['foundation_grid__preface_last'] = '';
  }

  // ZURB Foundation - Dynamic column for 'postscript' regions.
  $postscript_first = $variables['page']['postscript_first'];
  $postscript_second = $variables['page']['postscript_second'];
  $postscript_third = $variables['page']['postscript_third'];
  $postscript_last = $variables['page']['postscript_last'];
  if (!empty($postscript_first) && !empty($postscript_second) && !empty($postscript_third) && !empty($postscript_last)) {
    $variables['foundation_grid__postscript_first'] = 'large-3';
    $variables['foundation_grid__postscript_second'] = 'large-3';
    $variables['foundation_grid__postscript_third'] = 'large-3';
    $variables['foundation_grid__postscript_last'] = 'large-3';
  } elseif (!empty($postscript_first) && !empty($postscript_second) && empty($postscript_third) && !empty($postscript_last)) {
    $variables['foundation_grid__postscript_first'] = 'large-4';
    $variables['foundation_grid__postscript_second'] = 'large-4';
    $variables['foundation_grid__postscript_third'] = '';
    $variables['foundation_grid__postscript_last'] = 'large-4';
  } elseif (!empty($postscript_first) && empty($postscript_second) && empty($postscript_third) && !empty($postscript_last)) {
    $variables['foundation_grid__postscript_first'] = 'large-6';
    $variables['foundation_grid__postscript_second'] = '';
    $variables['foundation_grid__postscript_third'] = '';
    $variables['foundation_grid__postscript_last'] = 'large-6';
  } elseif (!empty($postscript_first) && empty($postscript_second) && empty($postscript_third) && empty($postscript_last)) {
    $variables['foundation_grid__postscript_first'] = 'large-12';
    $variables['foundation_grid__postscript_second'] = '';
    $variables['foundation_grid__postscript_third'] = '';
    $variables['foundation_grid__postscript_last'] = '';
  } else {
    $variables['foundation_grid__postscript_first'] = '';
    $variables['foundation_grid__postscript_second'] = '';
    $variables['foundation_grid__postscript_third'] = '';
    $variables['foundation_grid__postscript_last'] = '';
  }

  // ZURB Foundation - Dynamic column for 'footer' regions.
  $footer_first = $variables['page']['footer_first'];
  $footer_second = $variables['page']['footer_second'];
  $footer_third = $variables['page']['footer_third'];
  $footer_last = $variables['page']['footer_last'];
  if (!empty($footer_first) && !empty($footer_second) && !empty($footer_third) && !empty($footer_last)) {
    $variables['foundation_grid__footer_first'] = 'large-3 medium-3 small-6';
    $variables['foundation_grid__footer_second'] = 'large-3 medium-3 small-6';
    $variables['foundation_grid__footer_third'] = 'large-3 medium-3 small-12';
    $variables['foundation_grid__footer_last'] = 'large-3 medium-3 small-12';
  } elseif (!empty($footer_first) && !empty($footer_second) && empty($footer_third) && !empty($footer_last)) {
    $variables['foundation_grid__footer_first'] = 'large-4 medium-4 small-4';
    $variables['foundation_grid__footer_second'] = 'large-4 medium-4 small-4';
    $variables['foundation_grid__footer_third'] = '';
    $variables['foundation_grid__footer_last'] = 'large-4 medium-4 small-4';
  } elseif (!empty($footer_first) && empty($footer_second) && empty($footer_third) && !empty($footer_last)) {
    $variables['foundation_grid__footer_first'] = 'large-6 medium-6 small-6';
    $variables['foundation_grid__footer_second'] = '';
    $variables['foundation_grid__footer_third'] = '';
    $variables['foundation_grid__footer_last'] = 'large-6 medium-6 small-6';
  } elseif (!empty($footer_first) && empty($footer_second) && empty($footer_third) && empty($footer_last)) {
    $variables['foundation_grid__footer_first'] = 'large-12 medium-12 small-12';
    $variables['foundation_grid__footer_second'] = '';
    $variables['foundation_grid__footer_third'] = '';
    $variables['foundation_grid__footer_last'] = '';
  } else {
    $variables['foundation_grid__footer_first'] = '';
    $variables['foundation_grid__footer_second'] = '';
    $variables['foundation_grid__footer_third'] = '';
    $variables['foundation_grid__footer_last'] = '';
  }

  // Customize title for user login page.
  if (arg(0) == 'user') {
    switch (arg(1)) {
      case '':
      case 'login':
        $variables['title'] = t('Login');
        break;
      case 'password':
        $variables['title'] = t('Request a new password');
        break;
      case 'register':
        $variables['title'] = t('Create an account');
        break;
    }
  }

}




/**
 * Implements template_preprocess_node
 *
 * Add convenience variables
 */
function o0_preprocess_node(&$variables) {

  // Set default content-related image placeholder.
  $variables['content_placeholder_image'] = 'public://article/image/content-image-placeholder.jpg';
  $variables['content_placeholder_image_classes'] = 'content-placeholder-image';

  // TODO : Clean up
  $node = $variables['node'];
  // Set theming-related variables depending on the use of certain taxonomy terms.
  // 'Project - Type' vocabulary.
  // Set default image styles.
  $variables['field_project_t_project_type__term'] = '';
  $variables['field_project_image__image_style__node'] = 'project_image_node';
  $variables['field_project_image__image_style__fullscreen'] = 'project_image_modal_fullscreen';
  $variables['field_project_image__image_style__view_page_grid'] = 'project_image_view_page_grid';
  if (!empty($node->field_project_t_project_type)) {
    $field_project_t_project_type__terms = $node->field_project_t_project_type;
    foreach ($field_project_t_project_type__terms['und'] as $key => $value) {
      // If 'Website'...
      if ($field_project_t_project_type__terms['und'][$key]['tid'] == 28) {
        $variables['field_project_t_project_type__term'] = 'website';
        $variables['field_project_image__image_style__node'] = 'project_image_laptop_node';
        $variables['field_project_image__image_style__fullscreen'] = 'project_image_modal_fullscreen';
        $variables['field_project_image__image_style__view_page_grid'] = 'project_image_website_view_page_grid';
      }
      // If 'Logo'...
      if ($field_project_t_project_type__terms['und'][$key]['tid'] == 39) {
        $variables['field_project_t_project_type__term'] = 'logo';
        $variables['field_project_image__image_style__view_page_grid'] = 'project_image_view_page_grid';
      }
      // If 'Email'...
      if ($field_project_t_project_type__terms['und'][$key]['tid'] == 38) {
        $variables['field_project_t_project_type__term'] = 'email';
        $variables['field_project_image__image_style__node'] = 'project_image_email_node';
        $variables['field_project_image__image_style__fullscreen'] = 'project_image_email_modal_fullscreen';
        $variables['field_project_image__image_style__view_page_grid'] = 'project_image_email_view_page_grid';
      }
    }
  }
  // 'Person - Experience' vocabulary.
  if (!empty($node->field_project_t_person_exper)) {
    $field_project_t_person_exper__terms = $node->field_project_t_person_exper;
    $variables['field_project_t_person_exper__term'] = '';
    foreach ($field_project_t_person_exper__terms['und'] as $key => $value) {
      // If 'Freelance front-end web developer'...
      if ($field_project_t_person_exper__terms['und'][$key]['tid'] == 50) {
        $variables['field_project_t_person_exper__term'] = 'Freelance web developer';
      }
      // If 'Chief Web Ninja at Shervin'...
      if ($field_project_t_person_exper__terms['und'][$key]['tid'] == 51) {
        $variables['field_project_t_person_exper__term'] = 'Shervin';
      }
      // If 'Volunteer at BC SPCA Wild ARC'...
      if ($field_project_t_person_exper__terms['und'][$key]['tid'] == 52) {
        $variables['field_project_t_person_exper__term'] = 'Wild ARC';
      }
      // If 'Freelance graphic designer'...
      if ($field_project_t_person_exper__terms['und'][$key]['tid'] == 53) {
        $variables['field_project_t_person_exper__term'] = 'Freelance graphic designer';
      }
    }
  }
  // 'Content state' vocabulary.
  $variables['field_global_t_content_state__term'] = '';
  $variables['field_global_t_content_state__message'] = '';
  if (!empty($node->field_global_t_content_state)) {
    $field_global_t_content_state__terms = $node->field_global_t_content_state;
    foreach ($field_global_t_content_state__terms['und'] as $key => $value) {
      // If 'Stale'...
      if ($field_global_t_content_state__terms['und'][$key]['tid'] == 61) {
        $variables['field_global_t_content_state__term'] = 'stale';
        $variables['field_global_t_content_state__message'] = '<div class="messages info"><h2 class="element-invisible">Info message</h2>Please note that this post was originally published more than a year ago and may contain outdated information. Although the concepts and principles are generally still relevant, some of the references may no longer be up-to-date.</div>';
      }
    }
  }

}




/**
 * Implements theme_links() targeting the main menu specifically
 * Outputs Foundation Nav bar http://foundation.zurb.com/docs/navigation.php
 */
function o0_links__system_main_menu($variables) {
  // Get all the main menu links
  $menu_links = menu_tree_output(menu_tree_all_data('main-menu'));
  // Initialize some variables to prevent errors
  $output = '';
  $sub_menu = '';

  foreach ($menu_links as $key => $link) {
    // Add special class needed for Foundation dropdown menu to work
    !empty($link['#below']) ? $link['#attributes']['class'][] = 'has-dropdown' : '';
    // Render top level and make sure we have an actual link
    if (!empty($link['#href'])) {
      $output .= '<li' . drupal_attributes($link['#attributes']) . '>' . l($link['#title'], $link['#href']);
      // Get sub navigation links if they exist
      foreach ($link['#below'] as $key => $sub_link) {
        if (!empty($sub_link['#href'])) {
          $sub_menu .= '<li>' . l($sub_link['#title'], $sub_link['#href']) . '</li>';
        }
      }
      $output .= !empty($link['#below']) ? '<ul class="dropdown">' . $sub_menu . '</ul>' : '';
      // Reset dropdown to prevent duplicates
      unset($sub_menu);
      $sub_menu = '';
      $output .=  '</li>';
    }
  }
  return '<nav class="top-bar" data-topbar>
            <ul class="title-area">
              <li class="name">
                <h1><a href="#"></a></h1>
              </li>
              <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
              <ul class="left">' . $output . '</ul>
            </section>
          </nav>';
}




/**
 * Override taxonomy output.
 */
function o0_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h6 class="field-label">' . $variables['label'] . ': </h6>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}
