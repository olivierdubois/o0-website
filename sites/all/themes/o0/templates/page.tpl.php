<?php
/**
 * @file
 * Page template.
 *
 */
?>
<!-- page -->
<div id="page-wrapper">
<div id="page">

  <!-- top bar -->
  <div id="top-bar-container" class="row hide-for-print show-for-small">
    <div class="large-12 columns">
      <div class="">
        <?php print $variables['main_menu_links']; ?>
      </div>
    </div>
  </div>
  <!-- /top bar -->

  <!-- header -->
  <div id="header-wrapper">
    <div id="header-container" class="row">
      <div id="header" class="large-12 columns">
        <div class="row">
          <div id="logo" class="large-2 medium-2 columns">
            <?php if ($logo): ?>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
				    <?php endif; ?>
            <?php if ($site_name || $site_slogan): ?>
              <?php if ($site_name): ?>
                <div id="site-name" class="" style="<?php if ($logo): ?>display: none;<?php endif; ?>"><h1 class=""><?php print $site_name; ?></h1></div>
              <?php endif; ?>
              <?php if ($site_slogan): ?>
                <div id="site-slogan" class="" style="<?php if ($logo): ?>display: none;<?php endif; ?>"><p class=""><?php print $site_slogan; ?></p></div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <div class="large-10 medium-10 columns hide-for-small">
            <div class="row">
              <div id="header-first" class="large-9 medium-9 columns hide-for-print">
                <?php if ($page['header']): ?>
                  <?php print render($page['header']); ?>
                <?php endif; ?>
              </div>
              <div id="navigation-global" class="large-3 medium-3 columns hide-for-print">
                <?php if ($page['navigation_global']): ?>
                  <?php print render($page['navigation_global']); ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div id="navigation" class="large-12 medium-12 columns hide-for-print">
                <nav role="navigation">
                  <?php if ($page['navigation']): ?>
                    <?php print render($page['navigation']); ?>
                  <?php endif; ?>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /header -->

  <?php if ($page['hero']): ?>
  <!-- hero -->
  <div id="hero-wrapper">
    <div id="hero-container" class="row hide-for-print">
      <div id="hero" role="banner" class="large-12 columns hero">
        <?php print render($page['hero']); ?>
      </div>
    </div>
  </div>
  <div id="hero-wrapper-footer" class=""></div>
  <!-- /hero -->
  <?php endif; ?>

  <?php if ($page['preface_first'] || $page['preface_second'] || $page['preface_third'] || $page['preface_last']): ?>
  <!-- preface -->
    <div id="preface-wrapper">
      <div id="preface-container" role="complementary" class="row">
        <?php if ($page['preface_first']): ?>
          <div id="preface-first" class="<?php print $foundation_grid__preface_first; ?> columns preface">
            <?php print render($page['preface_first']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['preface_second']): ?>
          <div id="preface-second" class="<?php print $foundation_grid__preface_second; ?> columns preface">
            <?php print render($page['preface_second']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['preface_third']): ?>
          <div id="preface-third" class="<?php print $foundation_grid__preface_third; ?> columns preface">
            <?php print render($page['preface_third']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['preface_last']): ?>
          <div id="preface-last" class="<?php print $foundation_grid__preface_last; ?> columns preface">
            <?php print render($page['preface_last']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <!-- /preface -->
  <?php endif; ?>

  <!-- main -->
  <div id="main-wrapper">
    <div id="main-container">
      <div id="main" class="row">
        <div id="content-container" role="main" class="<?php print $foundation_grid__content_container; ?> columns">
          <a id="main-content"></a>
          <?php if ($page['content_top']): ?>
            <div id="content-top">
              <?php print render($page['content_top']); ?>
            </div>
          <?php endif; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <div id="content-title"><h1 class="title" id="page-title"><?php print $title; ?></h1></div>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if ($messages): ?>
            <div id="message"><?php print $messages; ?></div>
          <?php endif; ?>
          <?php if ($page['help']): ?>
            <div id="help"><?php print render($page['help']); ?></div>
          <?php endif; ?>
          <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
          <?php endif; ?>          
          <div id="content-content">
		        <?php print render($page['content']); ?>
            <?php print $feed_icons; ?>
          </div>
          <?php if ($page['content_bottom']): ?>
            <div id="content-bottom">
              <?php print render($page['content_bottom']); ?>
            </div>
		      <?php endif; ?>
        </div>
        <div id="sidebar-container" role="complementary" class="<?php print $foundation_grid__sidebar_container; ?> columns">
          <div id="sidebar-first" class="<?php print $foundation_grid__sidebar_first; ?> columns sidebar">
            <?php print render($page['sidebar_first']); ?>
          </div>
          <div id="sidebar-last" class="<?php print $foundation_grid__sidebar_last; ?> columns sidebar">
            <?php print render($page['sidebar_last']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /main -->

  <?php if ($page['postscript_first'] || $page['postscript_second'] || $page['postscript_third'] || $page['postscript_last']): ?>
  <!-- postscript -->
    <div id="postscript-wrapper" class="hide-for-print">
      <div id="postscript-container" role="complementary" class="row">
        <?php if ($page['postscript_first']): ?>
          <div id="postscript-first" class="<?php print $foundation_grid__postscript_first; ?> columns postscript">
            <?php print render($page['postscript_first']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['postscript_second']): ?>
          <div id="postscript-second" class="<?php print $foundation_grid__postscript_second; ?> columns postscript">
            <?php print render($page['postscript_second']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['postscript_third']): ?>
          <div id="postscript-third" class="<?php print $foundation_grid__postscript_third; ?> columns postscript">
            <?php print render($page['postscript_third']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['postscript_last']): ?>
          <div id="postscript-last" class="<?php print $foundation_grid__postscript_last; ?> columns postscript">
            <?php print render($page['postscript_last']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <!-- /postscript -->
  <?php endif; ?>

  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_last']): ?>
  <!-- footer -->
    <div id="footer-wrapper">
      <div id="footer-container" role="contentinfo" class="row">
        <?php if ($page['footer_first']): ?>
          <div id="footer-first" class="<?php print $foundation_grid__footer_first; ?> columns hide-for-print">
            <?php print render($page['footer_first']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['footer_second']): ?>
          <div id="footer-second" class="<?php print $foundation_grid__footer_second; ?> columns hide-for-print">
            <?php print render($page['footer_second']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['footer_third']): ?>
          <div id="footer-third" class="<?php print $foundation_grid__footer_third; ?> columns hide-for-print">
            <?php print render($page['footer_third']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['footer_last']): ?>
          <div id="footer-last" class="<?php print $foundation_grid__footer_last; ?> columns">
            <?php print render($page['footer_last']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <!-- /footer -->
  <?php endif; ?>
  
</div>
</div>
<!-- /page -->
  
  <script src="<?php print $base_path; ?>/sites/all/libraries/foundation/js/foundation/foundation.topbar.js"></script>
  
  <script>
    (function ($, Drupal, window, document, undefined) {
      $(document).foundation();
    })(jQuery, Drupal, this, this.document);
  </script>
