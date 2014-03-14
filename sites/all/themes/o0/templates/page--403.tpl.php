<!-- page -->
<div id="page-wrapper">
<div id="page">

<?php /*
<div id="top-nav-container" class="row hide-for-print">
  <div class="twelve columns">
<div class="">
<?php print $main_menu_links; ?>
</div>
  </div>
</div>
*/ ?>

  <!-- header -->
  <div id="header-wrapper">
    <div id="header-container" class="row">
      <div id="header" class="large-12 columns">
        <div class="row">
          <div id="logo" class="large-4 columns">
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
          <div class="large-8 columns hide-for-small">
            <div class="row">
              <div class="large-8 columns hide-for-print">
              </div>
              <div id="navigation-global" class="large-4 columns hide-for-print">
                <?php print render($page['navigation_global']); ?>
              </div>
            </div>
            <div class="row">
              <div id="navigation" class="large-12 columns hide-for-print">
                <nav role="navigation">
                  <?php print render($page['navigation']); ?>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /header -->

  <!-- main -->
  <div id="main-wrapper">
    <div id="main-container">
      <div id="main" class="row">
        <div id="content-container" role="main" class="large-12 columns">
          <a id="main-content"></a>
          <?php if ($messages): ?>
            <div id="message"><?php print $messages; ?></div>
          <?php endif; ?>
          <?php if ($page['help']): ?>
            <div id="help"><?php print render($page['help']); ?></div>
          <?php endif; ?>
          <div id="content-content">

            <div class="row">
              <div class="large-4 columns">
                <div class="error-code">403</div>
                <div class="error-message">Access denied</div>
              </div>
              <div class="large-8 columns">
                <h3 class="title" id="page-title">Oops, something went wrong!</h3>
                <h5>The page you are looking for isn't accessible.</h5>
                <p>Let's try something else instead:</p>
                <ul>
                  <li><a href="/login">Log in</a> to the site</li>
                  <li>Visit the <a href="/">homepage</a></li>
                  <li><a href="/search">Search</a> for what you were looking for</li>
                  <li>Go back to the <a href="javascript:window.history.go(-1)">previous page</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /main -->

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
