<!-- Start Header -->
<?php global $user; ?>
<?php $curpath = explode('/', drupal_lookup_path('alias',current_path())); ?>
<?php if(empty($curpath[0])) { $curpath = explode('/', current_path()); } ?>

<header>
  <div class="container relative">
    <div class="logo"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a> </div>
    <!-- Start Icon Menu -->
    <nav>
      <div class="topbar">
        <ul class="globalNav">
          <?php if($user->uid): ?>
          <li class="loginI">
            <?php  print l(t('Sign Out'), 'user/logout'); ?>
            <?php else: ?>
          <li class="loginI"><a href="javascript:;">Sign In</a></li>
          <?php endif;?>
          <li class="locateI"><a href="<?php echo base_path(); ?>dealer-locator/our-office">Locate Us</a></li>
          <li class="contactI"><a href="<?php echo base_path(); ?>delighted-to-assist/support-form">Delighted to assist</a></li>
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
    <div class="clearfix container">
      <?php //print render($page['content']); ?>
      <div class="fullContentSection">
        <div class="errorPage">
          <div class="errorImg"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/404-img.png" alt="" /></div>
          <p class="title">Sorry, page not found</p>
          <p>Please, return to the <a href="javascript:;" onclick="history.back();">previous page</a> and try again.</p>
          <p>Go back to <a href="<?php print $front_page; ?>">Home</a></p>
        </div>
      </div>
    </div>
  </div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?> 