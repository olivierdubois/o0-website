<?php
$path_alias_1 = arg(0, drupal_get_path_alias());
$path_alias_2 = arg(1, drupal_get_path_alias());
?>
<meta name="google-site-verification" content="u0JZeckCnF_A41vG4XdsFn4S5ZOS8MHUXtbxvXF48to" />

<!-- Typekit -->
<script type="text/javascript" src="http://use.typekit.com/jnx4bvq.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<!-- /Typekit -->

<!-- page -->
<div id="page">

<div id="top-nav-container" class="row hide-for-print">
  <div class="twelve columns">
<div class="contain-to-grid fixed">




</div>
  </div>
</div>

  <!-- header -->
  <div id="header-wrapper">
    <div id="header-container" class="row">
  <div id="logo-wrapper" class="four columns">
    <?php if ($logo): ?><div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a></div><?php endif; ?>
    <div class="hide-for-print"><div style="display: none;"><h1 class="<?php if ($logo): ?> break<?php endif; ?>"><?php print $site_name; ?></h1></div></div>
  </div>
    <div id="header" class="eight columns hide-for-print">

    </div>
    </div>
  </div>
  <!-- /header -->

  <!-- masthead -->
  <div id="masthead-wrapper">
    <div id="masthead-top" class="clearfix">
      <div id="masthead-first" class="column">
        <?php /*<?php if ($logo): ?><a href="<?php print $base_path; ?>"><img src="<?php print $logo; ?>" alt="" id="logo" /></a><?php endif; ?>
        <h1<?php if ($logo): ?> class="break"<?php endif; ?>><?php //print $site_name; ?></h1> */ ?>
      </div>
      <?php //if ($page['masthead_second']): ?>
      <div id="masthead-second" class="column">
<!--
  <div id="navigation">
  <ul>
  <li style="float: left; margin: 0 10px; 0 10px;"><a class="content-first" href="http://olivierdubois.com/">Home</a></li>
  <li style="float: left; margin: 0 10px; 0 10px;"><a class="content-second" href="http://olivierdubois.com/">Twitter</a></li>
  <li style="float: left; margin: 0 10px; 0 10px;"><a class="content-third" href="http://olivierdubois.com/">Blog</a></li>
  <li style="float: left; margin: 0 10px; 0 10px;"><span style="font-size: 10px; text-transform: uppercase;">Beta</span></li>
  </ul>
  </div>
-->
            <?php //print render($page['masthead_second']); ?>
          </div>
          <?php //endif; ?>
          <div id="masthead-last" class="column">
            <?php /* if ($page['masthead_last']): ?><?php //print render($page['masthead_last']); ?><?php endif; */ ?>
          </div>
        </div>
      </div>
      <!-- /masthead -->

  <!-- preface -->
  <!-- /preface -->

	<?php //if ($messages /*|| $page['help']*/): ?>
	<div id="statusbar">
		<?php //print $messages; ?>
		<?php //print render($page['help']); ?>
	</div>
	<?php //endif; ?>

  <!-- main -->
  <div id="main-wrapper">
    <div id="main-group">
      <div id="main" class="row" style="background-color: ;">
        <div id="content-group" class="six columns">
        
          <a id="main-content"></a>

        <?php if ($page['content_top']): ?>
          <div id="content-top">
            <?php print render($page['content_top']); ?>
          </div>
        <?php endif; ?>

          <?php print render($title_prefix); ?>
          <?php if ($title): ?><div id="content-title"><h1 class="title path-alias-1-<?php print $path_alias_1; ?> path-alias-2-<?php print $path_alias_2; ?>" id="page-title"><?php print $title; ?></h1></div><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php print render($page['help']); ?>
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
        <div id="sidebar-group" class="hide-for-print">
          <div id="sidebar-first" class="six columns sidebar" style="background-color: ;">
            <?php print render($page['sidebar_first']); ?>
          </div>
          <div id="sidebar-last" class="six columns sidebar" style="background-color: ;">
            <?php print render($page['sidebar_last']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /main -->

  <!-- postscript -->
  <!-- /postscript -->

  <!-- footer -->
  <div id="footer-wrapper">
  <div id="footer-top-wrapper">
  <div id="footer-top-container" class="row">
    <div id="footer-top-group">
      <div class="eight columns hide-for-print">
      <?php if ($page['footer_top_first']): ?>
        <div id="footer-top-first">
          <?php print render($page['footer_top_first']); ?>
        </div>
      <?php endif; ?>
      </div>
      <div class="four columns">
      <?php if ($page['footer_top_last']): ?>
        <div id="footer-top-last">
          <?php print render($page['footer_top_last']); ?>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>
  </div>
  <div id="footer-bottom-wrapper">
  <div id="footer-bottom-container" class="row">
    <div id="footer-bottom-group" class="twelve columns">
    <?php if ($page['footer_bottom']): ?>
      <div id="footer-bottom">
        <?php print render($page['footer_bottom']); ?>
        <span class="copyright">&copy; 2002-<?php print date('Y'); ?> <a href="http://olivierdubois.com/" title="o0 Olivier Dubois">o0 Olivier Dubois</a></span><span class="credits"> / Powered by <a href="http://drupal.org/" target="_blank" title="Learn more about Drupal">Drupal</a></span>
      </div>
    <?php endif; ?>
    </div>
  </div>
  </div>
  </div>
  <!-- /footer -->

</div>
<!-- /page -->

<!-- Reinvigorate -->
<script type="text/javascript" src="http://include.reinvigorate.net/re_.js"></script>
<script type="text/javascript">
try {
reinvigorate.track("569va-3420iqci8k");
} catch(err) {}
</script>
<!-- /Reinvigorate -->
