<!-- Start Header -->
<?php global $user; ?>
<?php $curpath = explode('/', drupal_lookup_path('alias',current_path())); ?>
<?php if(empty($curpath[0])) { $curpath = explode('/', current_path()); } ?>
<div class="intermediateWrap">
  <div class="intermediateHeader">
    <div class="intermediateContainer">
      <div class="intermediateLogo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      </div>
      <div>
        <div class="callBar">
          <h3>Toll-Free No. 1800-425-1969</h3>
          <p>Mon to Fri, 9 AM TO 5 PM</p>
        </div>
      </div>
    </div>
  </div>
  <div class="contentSection">
    <div class="intermediateContainer">
      <h1 class="bighead">Fastest growing<br/>
        <span class="semiBold">LED Lighting company </span></h1>
      <p>For over two decades, we have been at the forefront of lighting solutions by providing the best in-class products and technologies for home, offices, industries, pharmaceutical and sterile facilities, education & research institutes, healthcare facilities, retail spaces, transport infrastructure, road lighting and area lighting.</p>
    </div>
  </div>
  <div class="ledSection">
    <div class="intermediateContainer">
      <div class="group">
        <div class="left_imgntext">
          <div class="textBand">
            <h2>Home <span class="semiBold">Lighting</span></h2>
          </div>
          <img src="<?php echo base_path(); ?>sites/all/themes/framework/images/intermediate-img1.jpg"/ alt="Intermediate Image1">
          <div class="imgOverlay">
            <div class="clickButton leftBtn"><a href="http://wiproconsumerlighting.com">Click here &rarr;</a></div>
          </div>
        </div>
      </div>
      <div class="group">
        <div class="left_imgntext">
          <div class="textBand2">
            <h2>Commercial & <span class="semiBold">Institutional Lighting </span></h2>
          </div>
          <img src="<?php echo base_path(); ?>sites/all/themes/framework/images/intermediate-img2.jpg"/ alt="Intermediate Image1">
          
            <div class="imgOverlayRight clickMe">
              <div class="commercialist">
                <ul>
                  <li>Offices</li>
                  <li class="seperator">Industries</li>
                  <li class="last"> Pharmaceutical plants</li>
                </ul>
              <ul>
                <li>Education </li>
                <li class="seperator">Healthcare</li>
                <li>Retail</li>
               </ul>
               <ul>
                <li class="last">Infrastructure projects</li>
                <li class="seperator"> Road lighting</li>
                <li> Area lighting</li>
               </ul>
               
              
              </div>
            
              
              <div class="clickButton"><a href="javascript:;">Click here &rarr;</a></div>
            </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="footer">
    <div class="intermediateContainer">
      <p>&copy <?php echo date('Y'); ?> Wipro Lighting All right reserved</p>
      <div class="footerList">
        <ul>
          <li><a href="http://wiproel.com">Wipro Enterprises (P) Limited </a></li>
          <li><a href="http://wiproconsumercare.com">Wipro Consumer Care and Lighting</a> </li>
          <li><a href="http://wiproconsumercare.com">(WCCLG)</a></li>
          <li><a href="http://www.yardleyoflondon.com">Yardley India</a> </li>
          <li><a href="http://www.north-west.wipro.com"> NorthWest Switches</a></li>
          <li><a href="http://wiproconsumerlighting.com"> Wipro Consumer Lighting</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<script>
  (function ($) {
    $(".clickMe").click(function() {
      $.ajax({
        dataType : "json",
        type:'POST',
        //async: false,
        url: Drupal.settings.basePath + 'url-clicked',
        data: {},
        success:function(data){
          window.location = Drupal.settings.basePath;
        }
      });
    });
  })(jQuery);
</script>







