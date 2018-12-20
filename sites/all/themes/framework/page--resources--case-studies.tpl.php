<!-- Start Header -->
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
								<?php print render($page['menu_apps']); ?>
							</div>
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
								<?php print render($page['menu_product']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'resources'): ?>
								<a class="active" href="javascript:;">Resources </a>
							<?php else: ?>
								<a href="javascript:;">Resources </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_resources']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'innovation-in-lighting'): ?>
								<a class="active" href="javascript:;">Innovation in Lighting </a>
							<?php else: ?>
								<a href="javascript:;">Innovation in Lighting </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_innovate']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'about-us'): ?>
								<a class="active" href="javascript:;">About Us </a>
							<?php else: ?>
								<a href="javascript:;">About Us </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_about']); ?>
							</div>
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
    <div id="container" class="clearfix container">
			<?php print $messages; ?>
			<ul class="breadcrumbs">
				<li><a href="<?php print $front_page; ?>">Home</a></li>
				<li class="noBcLink"> Resources</li>
				<li class="sel">Case Studies</li>
			</ul>
      <div class="sectionWrapper">
          <div class="fullContentSection">
            <h1>Case <span class="semiBold">Studies</span></h1>
            <!--<div class="wpSection">
                <div class="wpClm" id="latestC">
                  <h2>Litescope <span class="semiBold">#22</span></h2>
                  <a class="actionLink" target="_blank" href="javascript:;"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>
                  <p class="subTitle">Lighting Definitions | 27 Sep 2015</p>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>-->
			 <!--filterSubAppSection:start-->
          <div class="filterSubAppSection mBottom borderNone">
            <div class="titleBox"> <span class="greyBorder"><span class="spireIcon filterIco"></span></span>
              <h3>Filter By Application</h3>
            </div>
            <div class="subApps" style="display:block">
              <div class="bestSuitedCarousel">
                  <div class="bestSuitedCarouselWrap">
                    <ul>
											<?php
												$result = db_query("SELECT DISTINCT(field_application_tid) FROM {field_data_field_application}");
												foreach($result as $row) {
													$term = taxonomy_term_load($row->field_application_tid);
													$tid = $term->tid;
													$img = file_create_url($term->field_icon_image['und'][0]['uri']);
													$children = taxonomy_get_children($tid, $vid = 5);
													foreach($children as $child) {
														$tid .= '-'. $child->tid;
													}
													$output .='<li class="appSelector" tid="'.$tid.'"><div class="iconBox"><img src="'.$img.'"></div><p>'.$term->name.'</p></li>';
												}
												echo $output;
											?>	
										</ul>
                  </div>
                  <div class="actionDiv"> <span class="slideLength"><span class="sel">4</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>
                </div>
            </div>
            <!--<div class="downArrow"></div>-->
          </div>
          <!--filterSubAppSection:end--> 
			
            <div class="chooseOptionSection">
              <div class="radioToggle">
              	<label for="latest">Latest</label>
              	<div class="inputToggle">
                	<input class="radioSort" id="latest" type="radio" name="radioSort" value="Latest">
               		<input class="radioSort" id="oldest" type="radio" name="radioSort" value="Oldest">
                    <span class="switch"></span>
                </div>
                <label for="oldest">Oldest</label>
              </div>
            </div>
            <!--<div class="wpPagenation">Showing <span id="nument">5</span> of <span id="total">35</span> Results</div>-->
            <div class="wpSection addingContents">
			<!------------------------------------------------------------->
			<?php
				$i = $j = 0;
				$query = new EntityFieldQuery();
				$query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', 'case_studies')
					->propertyCondition('status', NODE_PUBLISHED)
					->propertyOrderBy('created', 'DESC');
				$result = $query->execute();
				if(isset($result['node'])) {
					$nids = array_keys($result['node']);
					$nodes = node_load_multiple($nids);
					foreach($nodes as $nod) {
						//echo '<pre>'; print_r($nod); echo '</pre>';
						$first = true;
						$rel = '';
						foreach($nod->field_application['und'] as $app) {
							//print_r($app); 
							if($first) {
								$rel = $app['tid'];
								$first = false;
							} else {
								$rel .= '-'. $app['tid']; 
							}
						}
						//exit;
						//echo '</pre>';
						if($i == 0) {
							?>
							
							<div class="wpClm" style="display:none;" tid="<?php echo $rel; ?>">
							  <h2><a class="actionLink" target="_blank" href="<?php echo file_create_url($nod->field_pdf_download['und'][0]['uri']); ?>"><?php echo $nod->title; ?></a></h2>
							 <!-- <i class="fa fa-file-pdf-o"></i> Download-->
							  <?php echo $nod->body['und'][0]['value']; ?>
							</div>
							
							<?php							
						} else {
							if($i%6 == 0 && $i != 0)
								$j++;
							?>
							
							
								<div class="wpClm" dspl="<?php echo $j; ?>" tid="<?php echo $rel; ?>"
									<?php if($i == 1){ echo 'style ="border-top: none;"'; } else if($j >= 1){ echo 'style ="display: none;"'; }?>
									>
								  <h2><a class="actionLink" target="_blank" href="<?php echo file_create_url($nod->field_pdf_download['und'][0]['uri']); ?>"><?php echo $nod->title; ?></a></h2>
								  <!--<i class="fa fa-file-pdf-o"></i> Download-->
								  <?php echo $nod->body['und'][0]['value']; ?>
								</div>
								
							
							
							<?php
							
						}
						$i++;
					}
					?>
					<script>
					(function ($) {
						$('#total').text("<?php echo $i; ?>");
						//$('#nument').text("<?php echo $i; ?>");
						//$('.loadmoreBtn').css('display','none');
					})(jQuery);
					</script>
					<?php
				}
			?>
			<!------------------------------------------------------------->
              
            </div>
               <a class="loadmoreBtn" pagenum="1" href="javascript:;" <?php if($i <= 6){ echo 'style="display:none"'; } ?>>Load More Results</a>
          </div>
        </div>
      </div>
      <!-- /#main --> 
    </div>
    <!-- /#container --> 
  </div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?>
<script>
(function ($) {
$('#latestC').html($('#wpClm').html());

$('input:radio[name="radioSort"]').change(function() {
        if ($(this).val() == 'Latest') {
			$.get(Drupal.settings.basePath +"case-studies-ajax-desc", function(data){
			  $('.addingContents').html(data);
			  $('#nument').text("6");
			  $('.loadmoreBtn').attr('pagenum','1');
			});
        } else {
            $.get(Drupal.settings.basePath +"case-studies-ajax-asc", function(data){
			  $('.addingContents').html(data);
			  $('#nument').text("6");
			  $('.loadmoreBtn').attr('pagenum','1');
			});
        }
    });

	
	
$(document).on('click', '.appSelector', function() {
	$(".loadmoreBtn").hide();
	$(this).addClass('active').siblings().removeClass('active');
	var tid = $(this).attr('tid').split('-');
	var i = 0;
	var contents = '';
	var contents2 = '';
	//console.log(tid);
	
	if(tid.length > 1) {
		$('.wpClm').each(function() {
			$(this).css('display', 'none');
		});
    for(var i=0; i< tid.length; i++) {
			alert(tid[i]);
			$('.wpClm').each(function() {
				var tempTid = $(this).attr("tid");
				if(typeof(tempTid) != 'undefined') {
					if(tempTid.indexOf('-') === -1) {
						console.log("no dash found.");
						if(tempTid == tid[i]) {
							$(this).css('display', 'block');
						} 
					} else {
						console.log('dash found');
						var termId = $(this).attr("tid").split("-");
						for(var x in termId) {
							if(termId[x] == tid[i]) {
								$(this).css('display', 'block');
							} 
						}
					}
				}
			
			});
		}
  } else {
		$('.wpClm').each(function() {
			var tempTid = $(this).attr("tid");
	
			if(typeof(tempTid) != 'undefined') {
				if(tempTid.indexOf('-') === -1) {
					console.log("no dash found.");
					if(tempTid == tid) {
						$(this).css('display', 'block');
						return true;
					} else {
						$(this).css('display', 'none');
					}
				} else {
					console.log('dash found');
					var termId = $(this).attr("tid").split("-");
					for(var x in termId) {
						if(termId[x] == tid) {
							$(this).css('display', 'block');
							return true;
						} else {
							$(this).css('display', 'none');
						}
					}
				}
			}
		
		});
	}
	
	

	/*$.each($('.wpClm'), function(index, value) {
		var tempTid = $(value).attr("tid");
		if(typeof(tempTid) != 'undefined') {
			//console.log("1");
			var termId = $(value).attr("tid").split("-");
			for(var x in termId) {
				console.log('termid', termId[x]);
				console.log('tid', tid);
				if(termId[x] == tid) {
					console.log('bingo');
					i++;
					$(value).css('display','block');
					contents += $(value).wrap('<div>').parent().html();
					$(value).unwrap();
				} else {
					$(value).css('display','none');
					contents2 += $(value).wrap('<div>').parent().html();
					$(value).unwrap();
				}
			}	
		}
	});*/
	//$('#latestC').css('display','block');
	//contents += contents2;
	//$('.addingContents').html(contents);
	//$('#nument').text(i);
});
$(document).on('click', '.loadmoreBtn', function() {
	var i= 0;
	var lastDivId = $('.wpSection div:last').attr('dspl');
	var cntr = $('.loadmoreBtn').attr('pagenum');
	
	$.each($('.wpClm'), function(index, value) {
		if($(value).attr('dspl') == cntr){
			//$(value).removeAttr('dspl');
			$(value).css('display','block');
			i++;
		}
	});
	cntr++;
	if (cntr > lastDivId) {
   $('.loadmoreBtn').remove();
  } else {
		if(i >= 1)
			$('.loadmoreBtn').attr('pagenum',cntr);
		$('#nument').text(i + parseInt($('#nument').text()));
	}
	
	
	
});	

})(jQuery);

</script>