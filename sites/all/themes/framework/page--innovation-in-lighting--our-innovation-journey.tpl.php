<!-- Start Header -->
<?php $curpath = explode('/', drupal_lookup_path('alias',current_path())); ?>
<?php
  if(empty($curpath[0])) {
    $curpath = explode('/', current_path());
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
          <li class="loginI logOff"><?php  print l(t('Sign Out'), 'user/logout'); ?>
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
            <?php //echo $curpath[0]; ?>
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
        <div id="main" role="main">
           <a id="main-content"></a>
            <?php if ($page['highlighted']): ?>
            <div id="highlighted"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php if (!empty($tabs['#primary'])): ?>
            <div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
            <ul class="action-links">
              <?php //print render($action_links); ?>
            </ul>
            <?php endif; ?>
            <div class="fullContentSection">
            <h1>Our <span class="semiBold">Innovation Journey</span></h1>
          </div>
          <?php //print render($page['content']); ?>
        </div>
      </div>
      <!-- /#main --> 
    </div>
    <!-- /#container --> 
    <!--timelineSection:start-->
    <div class="timelineSection horScrollPane">
      <ul>
        <li class="y1993">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y1993.png" alt=""></div>
          <div class="content">
            <h3>1993</h3>
            <p>Innovators and leaders in lighting for cleanroom applications</p>
          </div>
        </li>
        <li class="y1994">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y1994.png" alt=""></div>
          <div class="content">
            <h3>1994</h3>
            <p>First in India to launch luminaires with metal halide lamps</p>
          </div>
        </li>
        <li class="y1995">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y1995.png" alt=""></div>
          <div class="content">
            <h3>1995</h3>
            <p>Introduces luminaires with paralite louvres which triggers future trends</p>
          </div>
        </li>
        <li class="y1996">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y1996.png" alt=""></div>
          <div class="content">
            <h3>1996</h3>
            <p>Designs a range of under canopy luminaires for new age petrol pumps</p>
          </div>
        </li>
        <li class="y1999">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y1999.png" alt=""></div>
          <div class="content">
            <h3>1999</h3>
            <p>Launches wide range of products for modular ceilings</p>
          </div>
        </li>
        <li class="y2001">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2001.png" alt=""></div>
          <div class="content">
            <h3>2001</h3>
            <p>First in the country to launch international class landscape lighting</p>
          </div>
        </li>
        <li class="y2002">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2002.png" alt=""></div>
          <div class="content">
            <h3>2002</h3>
            <p>Introduces Energy Management Systems for Cost, Convenience and Comfort</p>
          </div>
        </li>
        <li class="y2003">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2003.png" alt=""></div>
          <div class="content">
            <h3>2003</h3>
            <p>Introduces 'Brightness Management' philosophy</p>
          </div>
        </li>
        <li class="y2004">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2004.png" alt=""></div>
          <div class="content">
            <h3>2004</h3>
            <p>Beautify exteriors with architectural streetlights</p>
          </div>
        </li>
        <li class="y2006">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2006.png" alt=""></div>
          <div class="content">
            <h3>2006</h3>
            <p>First lighting company in India to be associated with green movement</p>
          </div>
        </li>
        <li class="y2007">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2007.png" alt=""></div>
          <div class="content">
            <h3>2007</h3>
            <p>Customises mass transportation lighting</p>
          </div>
        </li>
        <li class="y2008">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2008.png" alt=""></div>
          <div class="content">
            <h3>2008</h3>
            <p>Launches FORCE GREEN initiative</p>
          </div>
        </li>
        <li class="y2009">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2009.png" alt=""></div>
          <div class="content">
            <h3>2009</h3>
            <p>Pioneers in functional lighting with LED product range</p>
          </div>
        </li>
        <li class="y2010">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2010.png" alt=""></div>
          <div class="content">
            <h3>2010</h3>
            <p>First Indian Lighting company to win an international "Design for Asia" Award</p>
          </div>
        </li>
        <li class="y2011">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2011.png" alt=""></div>
          <div class="content">
            <h3>2011</h3>
            <p>Acquisition of Cleanray - a LED company</p>
            <p>Signature designs in collaboration with international designers</p>            
          </div>
        </li>
        <li class="y2012">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2012.png" alt=""></div>
          <div class="content">
            <h3>2012</h3>
            <p>Receives recognition with the acclaimed India Design Mark</p>
          </div>
        </li>
        <li class="y2013">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2013.png" alt=""></div>
          <div class="content">
            <h3>2013</h3>
            <p>Wins prestigious European Design award: Observeur du Design</p>
          </div>
        </li>
        <li class="y2015">
          <div class="iconBox"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-y2015.png" alt=""></div>
          <div class="content">
            <h3>2015</h3>
            <p>Receives recognition with the acclaimed India Design Mark</p>
          </div>
        </li>
      </ul>
    </div>
    <!--timelineSection::start--> 
  </div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?> 
<script>
/*(function ($) {
$.each($('.fullContentSection'), function(index, value) {
	$(value).css('display','none');
	return false
})
})(jQuery);;*/
</script>