<!-- Start Header -->
<?php $curpath = explode('/', drupal_lookup_path('alias',current_path())); ?>
<?php if(empty($curpath[0])) { $curpath = explode('/', current_path()); } ?>
<?php                  
  $query = db_select('taxonomy_term_data', 'ttd');
  $query->leftJoin('field_data_field_page_image', 'pi', 'pi.entity_id = ttd.tid');
  $query->leftJoin('file_managed', 'fm', 'fm.fid = pi.field_page_image_fid');
  $query->fields('ttd', array('name', 'description'))
        ->fields('fm', array('uri'))
        ->condition('ttd.tid', 113, '=');
  $result = $query->execute();
  foreach($result as $row) {
    $title = $row->name;
    $tmp = explode(' ', $title);
    $title1 = array_shift($tmp) . ' ';
    $title2 = implode(' ',$tmp);
    $image = file_create_url($row->uri);
    $desc = $row->description;
  }
?>
<header>
  <div class="container relative">
    <div class="logo"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a> </div>
    <!-- Start Icon Menu -->
    <nav>
      <div class="topbar">
        <ul class="globalNav">
          <?php if($user->uid): ?>
          <li class="loginI logOff">
            <?php  print l(t('Sign Out'), 'user/logout'); ?>
            <?php else: ?>
          <li class="loginI"><a href="javascript:;">Sign In</a></li>
          <?php endif;?>
          <li class="locateI"><a href="<?php echo base_path(); ?>dealer-locator/our-office">Locate Us</a></li>
          <li class="contactI"><a href="<?php echo base_path(); ?>delighted-to-assist/write-to-us">Delighted to assist</a></li>
        </ul>
        <div class="callBar">
          <h3>Toll-Free No.  1800-425-1969</h3>
          <p>Mon to Fri, 9 AM TO 5 PM</p>
        </div>
      </div>
      <div class="menuBox">
        <div class="menu">
          <ul>
            <li>
              <?php if($curpath[0] == 'applications'): ?>
              <a class="active" href="javascript:;">Applications </a>
              <?php else: ?>
              <a href="javascript:;">Applications </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_apps']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'products'): ?>
              <a class="active" href="javascript:;">Products </a>
              <?php else: ?>
              <a href="javascript:;">Products </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <div class="navTabLink">
                  <ul>
                    <li><a href="javascript:;"> LED </a></li>
                    <li><a href="javascript:;">Conventional </a></li>
                  </ul>
                </div>
                <?php print render($page['menu_product']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'resources'): ?>
              <a class="active" href="javascript:;">Resources </a>
              <?php else: ?>
              <a href="javascript:;">Resources </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_resources']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'innovation-in-lighting'): ?>
              <a class="active" href="javascript:;">Innovation in Lighting </a>
              <?php else: ?>
              <a href="javascript:;">Innovation in Lighting </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_innovate']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'about-us'): ?>
              <a class="active" href="javascript:;">About Us </a>
              <?php else: ?>
              <a href="javascript:;">About Us </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_about']); ?> </div>
            </li>
          </ul>
        </div>
        <div class="searchBox">
          <div class="placeholder">
            <input type="text" placeholder="SEARCH" class="search">
            <a class="searchIcon" href="javascript:;"> </a> </div>
          <div style="display:none;"><?php print render($page['top_navigation']); ?></div>
        </div>
        <div class="searchLink"> <a href="javascript:;">&nbsp;</a></div>
        <div class="navIcon"><a href="javascript:;">&nbsp;</a></div>
        <div class="menuOverlay"></div>
      </div>
    </nav>
    <!-- End Icon Menu --> 
  </div>
</header>
<!-- End Header -->

<section> 
  
  <!--contentMaster:start-->
  <div class="contentMaster">
    <div id="container" class="clearfix container"> <?php print $messages; ?> <?php print $breadcrumb; ?>
      <div class="sectionWrapper">
        <?php if(arg(1) == 'register' || arg(2) == 'get-a-quote'): ?>
        <div id="main" role="main" class="registerPage">
          <?php else: ?>
          <div id="main" role="main">
            <?php endif; ?>
            <div class="fullContentSection"> <a id="main-content"></a>
              <?php if ($page['highlighted']): ?>
              <div id="highlighted"><?php print render($page['highlighted']); ?></div>
              <?php endif; ?>
              <?php if (!empty($tabs['#primary'])): ?>
              <div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div>
              <?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?>
              <ul class="action-links">
                <?php print render($action_links); ?>
              </ul>
              <?php endif; ?>
            </div>
            <!--pageInfoSection:start-->
            <div class="pageInfoSection">
              <div class="lhsInfo"><img src="<?php echo $image; ?>" alt=""></div>
              <div class="rhsInfo">
                <h1><?php echo $title1; ?><br><span class="semiBold"><?php echo $title2; ?></span></h1>
                <p><?php echo $desc; ?></p>
              </div>
            </div>
            <!--pageInfoSection:end--> 


            <div class="videoListSection">
              <ul><?php print render($page['content']); ?></ul>
            </div>
          </div>
        </div>
        <!-- /#main --> 
      </div>
      <!-- /#container --> 
    </div>
  </div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<!--lightbox:start-->
<div class="lightbox lbVideo"> <a class="closeBtn"></a>
  <div class="video">
    <iframe src=""></iframe>
  </div>
</div>
<!--lightbox:end--> 
<?php print render($page['header']); ?> 
<script>
(function ($) {
$.each($('.fullContentSection'), function(index, value) {
	$(value).css('display','none');
	return false
});
})(jQuery);
</script>