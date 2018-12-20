<!-- Start Header -->
<?php $curpath = explode('/', current_path()); ?>
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
          <li class="noBcLink">Resources</li>
          <li class="noBcLink">Tools</li>
          <li class="sel">Payback Calculator</li>
        </ul>
        <!--fullContentSection:start-->
        <div class="fullContentSection">
          <div id="main" role="main" class="clearfix"> <?php print $messages; ?> <a id="main-content"></a>
            <?php if ($page['highlighted']): ?>
            <div id="highlighted"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php print render($title_prefix); ?>
            <h1>Payback <span class="semiBold">Calculator</span></h1>
            <?php print render($title_suffix); ?>
            <?php if (!empty($tabs['#primary'])): ?>
            <div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
            <?php print render($page['content']); ?>
            <form id="pcForm">
							<input id="lamp_replacement_cost_assoc" type="hidden">
							<input id="gear_replacement_cost_asso" type="hidden">
              <div class="tablePayBacKCalc">                
                <div class="enterSection">
                	<div class="topSelectSection">
										<div class="group">
                    <div class="groupInner">
                      <label>Existing Lighting:</label>
                      <div class="fieldGroup">
                        <div class="field">
                          <div class="selBox">
                            <div class="selVal">Select Product</div>
                            <select id="pcProdSelect">
                              <option value="Select Product">Select Product</option>
                              <?php echo get_payback_dropdown_list(); ?>
                            </select>
                          </div>
                        </div>
                        <div class="field">
                          <input id="luminaireQuantityBase" placeholder="Quantity" type="number" autocomplete="false" min="1">
                        </div>
                      </div>
                    </div>
                  </div>
										<div class="group">
                    <div class="groupInner">
                      <label>Proposed LED Lighting:</label>
                      <div class="fieldGroup">
                        <div class="field">
                          <div class="selBox">
                            <div class="selVal">Select Associated Product</div>
                            <select id="pcAsProdSelect">
                              <option value="Select Associated Product">Select Associated Product</option>
                            </select>
                          </div>
                        </div>
                        <div class="field">
                          <input id="luminaireQuantityAssoc" placeholder="Quantity" type="number" autocomplete="false" min="1">
                        </div>
                      </div>
                    </div>
                  </div>
								 </div>
									<div class="pLoader dnone">Getting Associate Product.</div>
                  <table>
                    <!-- Calculator Heading Start -->
                    <tr>
                      <th>PayBack Column</th>
											<th>Base Product</th>
											<th>Associated Product</th>
                    </tr>
                    <!-- Calculator Heading End --> 
                    
                    <!-- Calculator Body Start -->                    
                    <tr>
                      <td>General Information</td>
											<td><span id="generalInformation">-</span></td>
                      <td><span id="generalInformation0">-</span></td>                      
                    </tr>
                    <tr class="dnone">
                      <td>Total No of lamps in T8 channel/LED's per luminaire</td>
											<td><span id="total_no_of_lamps_assoc">-</span></td>
                      <td>1</td>                      
                    </tr>
                    <tr class="dnone">
                      <td>Total no of lamps in T8 Industrial channel/LED's in the System</td>
											<td><span id="ledsInTheSystemAssoc">-</span></td>
                      <td><span id="ledsInTheSystemBase">-</span></td>                     
                    </tr>
                    <tr>
                      <td>Total power comsumption per luminaire in W</td>
											<td><span id="total_power_comsumption_assoc">-</span></td>
                      <td><span id="total_power_consumption_base">-</span></td>                      
                    </tr>
                    <tr>
                      <td>Total power comsumption in system in KW</td>
											<td><span id="total_power_comsumption_assoc_kw">-</span></td>
                      <td class="dnone"><span id="total_power_consumption_base_kw">-</span></td>
											<td><span id="total_power_comsumption_base_kw_">-</span></td>
                    </tr>
                    <tr class="dnone">
                      <td>Average Life of Lamp </td>
											<td><span id="average_life_of_lamp_assoc">-</span></td>
                      <td><span id="average_life_of_lamp_base">-</span></td>                      
                    </tr>
                    <tr>
                      <td colspan="3" class="sectionTitle">Capital Cost</td>
                    </tr>
                    <tr class="dnone">
                      <td>Cost of luminaires with lamps in Rs</td>
											<td><span> - </span></td>
                      <td><span id="cost_of_luminaires_base">-</span></td>                      
                    </tr>
                    <tr class="dnone">
                      <td>Total supply cost of system in Rs</td>
											<td><span>-</span></td>
                      <td><span id="totalSupplyCost">-</span></td>
                    </tr>
                    <tr>
                      <td>Installation cost per luminaire in Rs</td>
											<td><span> - </span></td>
                      <td><input id="installationCostPerLuminaire" type="number" min="0"></td>
                    </tr>
                    <tr class="dnone">
                      <td>Total installation cost of system in Rs</td>
											<td><span> - </span></td>
                      <td><span id="TotalInstallationCost">-</span></td>
                    </tr>
                    <tr class="dnone">
                      <td>Total supply + Installation cost in Rs</td>
											<td><span> - </span></td>
                      <td><span id="TotalSupplyInstallationCost">-</span></td>
                    </tr>
                    <!-- Calculator Body End -->
                  </table>
                  <div class="usageSection">
                  <div class="row">
                    <div class="clm">
                    <label>Total working days/annum</label>
                    <div class="field">
                    <div class="selBox">
                            <div class="selVal">300</div>
                    	<select id="totalWorkingDays">
							<option value= "">Select</option>
                          <?php for($i=1; $i<=365; $i++) { ?>
                          <option value= "<?php echo $i; ?>" <?php if($i==300) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                        </div>
                    </div>
                    </div>
                    <div class="clm">
                    	<label>Electricity charges in Rs</label>
                        <div class="field">
                        	<input id="electricityChargesInRs" name="electricityChargesInRs" type="number" value="9" min="0" max="25">
                        </div>
                    </div>
                    <div class="clm">
                    	<label>Usage of system per day in hours</label>
                        <div class="field">
                        <div class="selBox">
                            <div class="selVal">14</div>
                        <select id="perDayInHours">
							<option value= "">Select</option>
                          <?php for($i=1; $i<=24; $i++) { ?>
                          <option value= "<?php echo $i; ?>" <?php if($i==14) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
                          <?php } ?>
                        </select></div>
                        </div>
                    </div>
                  </div>                  
                </div>
                  <table class="dnone">
                    <tr>
                      <td colspan="3" class="sectionTitle">Operating Energy Cost</td>
                    </tr>
                    <tr>
                      <td>Total usage of system per annum in hours</td>
											<td><span id="usagePerAnnumInHours2">-</span></td>
                      <td><span id="usagePerAnnumInHours">-</span></td>                      
                    </tr>
                    <tr>
                      <td>Total energy consumption per annum in KWH</td>
											<td><span id="consumptionInKWH">-</span></td>
                      <td><span id="consumptionInKWH0">-</span></td>  
                    </tr>                    
                    <tr>
                      <td>Total electricity charges per annum for system in Rs</td>
											<td><span id="electricityChargesPerAnnum">-</span></td>
                      <td><span id="electricityChargesPerAnnum0">-</span></td>
                    </tr>
                    <tr>
                      <td>Total operating cost in Rs per annum</td>
											<td><span id="totalOperatingCost">-</span></td>
                      <td><span id="totalOperatingCost0">-</span></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="sectionTitle">Lamps and Gear Replacement Cost</td>
                    </tr>
                    <tr>
                      <td>Number of lamps to be replaced </td>
											<td><span id="numberOfLampsReplaced">-</span></td>
                      <td>0</td>
                      
                    </tr>
                    <tr>
                      <td>Cost of lamp replacement</td>
											<td><span id="costOfLampReplacement">-</span></td>
                      <td>0</td>
                      
                    </tr>
                    <tr>
                      <td>Number of gears to be replaced per annum</td>
											<td><span id="numberOfGearsReplaced">-</span></td>
                      <td>0</td>
                      
                    </tr>
                    <tr>
                      <td>Cost of Gear replacement</td>
											<td><span id="costOfGearReplacement">-</span></td>
                      <td>0</td>
                      
                    </tr>                    
                  </table>
                  <div class="centerBtnGrp calBtnDiv">
										<a id="resetBtn" class="arrowLink resetBtn" href="javascript:;">Reset<span class="arrowIco"></span></a>
										<a id="calculateBtn" class="arrowLink formBtn" href="javascript:;">Calculate <span class="arrowIco"></span></a>
									</div>
                </div>
                <div class="resultSection">
                  <table>
                    
                    <!-- Calculator Body Start -->
                    <tr>
                      <td colspan="3" class="sectionTitle">System Analysis</td>
                    </tr>
                    <tr>
                      <td>Total replacement &amp; operating cost in Rs.</td>
											<td><span id="replacementOperatingCost">-</span></td>
                      <td><span id="replacementOperatingCost0">-</span></td>
                      
                    </tr>
                    <tr>
                      <td>Total additional initial investment for LED in Rs (Total Cash Out-flow)</td>
											<td colspan="2" style="text-align:center"><span id="totalAdditionalInitialInvestment">-</span></td>
                      
                      
                    </tr>
                    <tr>
                      <td>Total savings in replacement & operating cost using LED in Rs (Cash In-Flow)</td>
											<td colspan="2" style="text-align:center"><span id="replacementOperatingCost2">-</span></td>
                      
                      
                    </tr>
                    <tr>
                      <td>Pay back in Months</td>
											<td colspan="2" style="text-align:center"><span id="payBackInMonths">-</span></td>
                      <!--<td><span>-</span></td>-->
                      
                    </tr>
                    <!-- Calculator Body End -->
                  </table>
                  <div class="centerBtnGrp reCalBtnDiv">
										<a class="arrowLink formBtn" href="javascript:;">Re-Calculate <span class="arrowIco"></span></a>
									</div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--fullContentSection:end--> 
        <!-- /#main --> 
      </div>
    </div>
    <!-- /#container --> 
  </div>
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?>
<script type="text/javascript">
	//$( "#luminaireQuantityBase" ).prop( "disabled", true );
	
	//$( "#x" ).prop( "disabled", false );
	//
	//
	
	function floorFigure(figure, decimals){
		 if (!decimals) decimals = 2;
		 var d = Math.pow(10,decimals);
		 return ((figure*d)/d).toFixed(decimals);
	}
	(function ($) {  // document ready starts
		// populate associate products
		$("#luminaireQuantityBase").prop('disabled', true);
		$("#luminaireQuantityAssoc").prop('disabled', true);
		
		$("#pc_lum_assoc_prod_qty").blur(function() {

			var lumAssocProdQty = $(this).val();
			var lumProdQty = $("#pc_lum_prod_qty").val();
			$("#pcProdSelect").change(function() {
				prod = $('option:selected',this).text();
				if(prod == 'Select Product') {
					alert("please select a product");
					return false;
				}
			});
			$("#pcAssocProdSelect").change(function() {
				assocProd = $('option:selected',this).text();
			});
			// totalNoOfLamps to be fetched from database
			var prodTotalNoOfLamps = 4;
			var assocProdTotalNoOfLamps = 8;
			$(".totalNoLamps").text(lumProdQty * prodTotalNoOfLamps);
			
		});
		
		var genInfo_0 = '';
		var genInfo = '';
		var totalPowerConsumptionAss = 0;
		var totalPowerConsumptionBase = 0;
		var totalPowerComsumptionAssocKw = 0;
		var changeTriggered = false;
		
		$("#pcProdSelect").change(function() {
			$(".pLoader").text('Getting Associate Product... Please wait').removeClass("dnone");
			changeTriggered = false;
			var assocProd = '';
			//setTimeout(function () {
        genInfo_0 = '';
				genInfo = '';
				totalPowerConsumptionAss = 0;
				totalPowerConsumptionBase = 0;
				totalPowerComsumptionAssocKw = 0;
     // },1000);
			//console.log(genInfo_0, genInfo, totalPowerConsumptionAss, totalPowerConsumptionBase);
			$('#luminaireQuantityBase').val('');
			$('#luminaireQuantityAssoc').val('');
			$("#luminaireQuantityBase").prop('disabled', true);
			$("#luminaireQuantityAssoc").prop('disabled', true);
			$("#pcAsProdSelect").parents('.group').find('.selVal').text('Select Associated Product');
			$('#pcAsProdSelect option[value!="Select Associated Product"]').remove();
			$('#installationCostPerLuminaire').val('');
			$('tr td span').text('-');
			//$('input').val('');
			var prod = $(this).val();
			var nid = $(this).find('option:selected').attr('id');
			//var assocProd = '<option value="Select Associated Product">Select Associated Product</option>';
			$.ajax({
				type: "POST",
				//async: false,
				dataType : "json",
				url: Drupal.settings.basePath + 'payback-calculator/associate-products',
				data: {'nid' : nid, 'prod' : prod },
				success: function(data) {
					for(var i in data) {
						genInfo_0 = data[i].general_info;
						assocProd += '<option value="'+ data[i].assoc_prod +'">'+ data[i].assoc_prod +'</option>';
					}
					//$("#pcAsProdSelect").html("");
					$("#pcAsProdSelect").append(assocProd);
					$(".pLoader").text('').addClass("dnone");
				}
			});
		});

		$("#pcAsProdSelect").change(function() {
			console.log('sel2');
			$("#luminaireQuantityBase").prop('disabled', false);
			$("#luminaireQuantityAssoc").prop('disabled', false);
			// get content related to product.
			var assProd = $(this).val();
			$.ajax({
				type: "POST",
				//async: false,
				dataType : "json",
				url: Drupal.settings.basePath + 'payback-calculator/get-matrix-data-ajax',
				data: {'prod' : assProd, 'tok': 'assoc' },
				success: function(data) {
					//console.log(data);
					var defaultVal = 0.00;
					//var generalInformation0 = $("#generalInformation0").text();
					//$('tr td span').text('-');
					
					//var tempVal = $('#luminaireQuantityBase').val();
					//$('input').val('');
					//$('#luminaireQuantityBase').val(tempVal);
					//$('#luminaireQuantityBase').trigger( "change" );
					
					genInfo = data[0].general_info;
					$('#average_life_of_lamp_assoc').text(data[0].average_life_of_lamp_assoc);
					$('#average_life_of_lamp_base').text(data[0].average_life_of_lamp_base);
					$('#cost_of_luminaires_base').text(data[0].cost_of_luminaires_base);
					$('#total_no_of_lamps_assoc').text(data[0].total_no_of_lamps_assoc);
					
					
					totalPowerConsumptionAss = data[0].total_power_comsumption_assoc;
					//$('#total_power_comsumption_assoc').text(data[0].total_power_comsumption_assoc);
					totalPowerConsumptionBase = data[0].total_power_consumption_base;
					//total_power_comsumption_assoc
					//$('#total_power_consumption_base').text(data[0].total_power_consumption_base);
					//totalPowerConsumptionBase
					
					
					
					$('#lamp_replacement_cost_assoc').val(data[0].lamp_replacement_cost_assoc);
					$('#gear_replacement_cost_asso').val(data[0].gear_replacement_cost_asso);
					
					$("#total_power_consumption_base_kw").text("-");
					$("#totalSupplyCost").text("-");
					$("#consumptionInKWH0").text("-");
					$("#electricityChargesPerAnnum0").text("-");
					$("#totalOperatingCost0").text("-");
					$("#consumptionInKWH").text("-");
					$("#electricityChargesPerAnnum").text("-");
					$("#totalOperatingCost").text("-");
					$("#numberOfLampsReplaced").text("-");
					$("#costOfLampReplacement").text("-");
					$("#TotalSupplyInstallationCost").text("-");
					//$("#luminaireQuantityBase").prop("disabled", false);
					//$("#luminaireQuantityAssoc").prop("disabled", false);
					/*--- ooolala---*/
					//if($("#luminaireQuantityAssoc").val() != '') {
						//$('#luminaireQuantityAssoc').trigger( "change" );
					//}
				}
				
			});
		});
		
		$("#luminaireQuantityBase").keyup(function() {
			$("#luminaireQuantityAssoc").val($(this).val());
		});
		
		$("#luminaireQuantityAssoc").keyup(function() {
			$("#luminaireQuantityBase").val($(this).val());
		});
	
		$(document).on('change', '#luminaireQuantityBase', function () {
			console.log('input1');
			$("#luminaireQuantityAssoc").val($(this).val());
			
			var totalPowerConsumptionBaseKw = floorFigure($(this).val() * totalPowerConsumptionBase * 0.001);
			//alert('1 '+ totalPowerConsumptionBaseKw);
			var totalSupplyCost = floorFigure($(this).val() * $('#cost_of_luminaires_base').text());
			//alert('2 ' + totalSupplyCost);
			$('#ledsInTheSystemBase').text(floorFigure($(this).val()));
			//alert('3 ' + $('#ledsInTheSystemBase').text());
			//if(totalPowerConsumptionBaseKw == "NaN") {
       // $('#total_power_consumption_base_kw').text('-');
      //} else {
				//alert('Imp - ' + totalPowerConsumptionBase);
				$('#total_power_consumption_base_kw').text($(this).val() * totalPowerConsumptionBase * 0.001);
				//alert('4 ' + $('#total_power_consumption_base_kw').text());
				//alert($('#total_power_consumption_base_kw').text());
			//}
			if(totalSupplyCost == "NaN") {
        $('#totalSupplyCost').text('-');
      } else {
				$('#totalSupplyCost').text(totalSupplyCost);
			}
			//alert('5 ' + $('#totalSupplyCost').text());
			$( "#installationCostPerLuminaire" ).trigger( "change" );
			//$( "#perDayInHours" ).trigger( "change" );
			//$( "#totalWorkingDays" ).trigger( "change" );
			//$( "#electricityChargesInRs" ).trigger( "change" );
			//$("#TotalSupplyInstallationCost").text('-');
			//$("#consumptionInKWH0").text('-');
			//$("#electricityChargesPerAnnum0").text('-');
			//$("#totalOperatingCost0").text('-');
			//$("#consumptionInKWH").text('-');
			//$("#electricityChargesPerAnnum").text('-');
			//$("#totalOperatingCost").text('-');
			//$("#numberOfLampsReplaced").text('-');
			//$("#costOfLampReplacement").text('-');
			setTimeout(function(){ 
				$("#luminaireQuantityAssoc").trigger("change");
				changeTriggered = true;
			}, 1000);
			
			//$("body").click();

			
		});

		
		$(document).on('change', '#luminaireQuantityAssoc', function () {
			
			$("#luminaireQuantityBase").val($(this).val());
			var ledsInTheSystemAssoc = floorFigure($(this).val() * $('#total_no_of_lamps_assoc').text());
			totalPowerComsumptionAssocKw = $(this).val() * totalPowerConsumptionAss * 0.001;
			console.log('LSA', ledsInTheSystemAssoc);
			console.log('TPCA', totalPowerComsumptionAssocKw);
			
			if(ledsInTheSystemAssoc == "NaN") {
        $('#ledsInTheSystemAssoc').text('-');
      } else {
				$('#ledsInTheSystemAssoc').text(floorFigure($(this).val() * $('#total_no_of_lamps_assoc').text()));
			}
			//if(totalPowerComsumptionAssocKw == "NaN") {
        //$('#total_power_comsumption_assoc_kw').text('-');
      //} else {
				//totalPowerComsumptionAssocKw = $(this).val() * totalPowerConsumptionAss * 0.001;
				$('#total_power_comsumption_assoc_kw').text(floorFigure(totalPowerComsumptionAssocKw));
			//}
			if(!changeTriggered) {
        $('#luminaireQuantityBase').trigger("change");
				changeTriggered = true;
      }
			
			//$( "#installationCostPerLuminaire" ).trigger( "change" );
			//$( "#perDayInHours" ).trigger( "change" );
			//$( "#totalWorkingDays" ).trigger( "change" );
			//$( "#electricityChargesInRs" ).trigger( "change" );
			//
			//$( "#consumptionInKWH" ).text( "-" );
			//$( "#electricityChargesPerAnnum" ).text( "-" );
			//$( "#totalOperatingCost" ).text( "-" );
			//$( "#numberOfLampsReplaced" ).text( "-" );
			//$( "#costOfLampReplacement" ).text( "-" );
			//$( "#consumptionInKWH0" ).text( "-" );
			//$( "#electricityChargesPerAnnum0" ).text( "-" );
			//$( "#totalOperatingCost0" ).text( "-" );
			//$( "#TotalSupplyInstallationCost" ).text( "-" );
			//if(!$("#luminaireQuantityBase").is(':disabled')){
				$("#generalInformation").text(genInfo);
				$("#generalInformation0").text(genInfo_0);
				$('#total_power_comsumption_assoc').text(totalPowerConsumptionAss);
				$('#total_power_consumption_base').text(totalPowerConsumptionBase);
				console.log(genInfo_0 + ' --- ' + genInfo + ' --- ' + totalPowerConsumptionAss + '--- ' + totalPowerConsumptionBase);
				//alert($('#total_power_consumption_base_kw').text());
				$('#total_power_comsumption_base_kw_').text($('#total_power_consumption_base_kw').text());
			//}
				
			//$("#luminaireQuantityAssoc").trigger("change");
			
		});
	
		$(document).on('change', '#installationCostPerLuminaire', function () {
			$('#TotalInstallationCost').text(floorFigure($(this).val() * $('#luminaireQuantityBase').val()));
			$('#TotalSupplyInstallationCost').text(floorFigure(Number($('#totalSupplyCost').text()) + Number($('#TotalInstallationCost').text())));
			$( "#perDayInHours" ).trigger( "change" );
			$( "#totalWorkingDays" ).trigger( "change" );
			$( "#electricityChargesInRs" ).trigger( "change" ); 
		});
		
		$(document).on('change', '#perDayInHours', function () {
			$('#perDayInHours2').text($(this).val());
			$('#usagePerAnnumInHours').text(floorFigure($(this).val() * $('#totalWorkingDays').val()));
			$('#usagePerAnnumInHours2').text(floorFigure($(this).val() * $('#totalWorkingDays').val()));
			$('#consumptionInKWH').text(floorFigure(totalPowerComsumptionAssocKw * $('#usagePerAnnumInHours').text()));
			$('#consumptionInKWH0').text($('#total_power_consumption_base_kw').text() * $('#usagePerAnnumInHours').text());
			$( "#totalWorkingDays" ).trigger( "change" );
			$( "#electricityChargesInRs" ).trigger( "change" ); 
		});
		$(document).on('change', '#totalWorkingDays', function () {
			$('#totalWorkingDays2').text(floorFigure($(this).val()));
			$('#usagePerAnnumInHours').text(floorFigure($(this).val() * $('#perDayInHours').val()));
			$('#usagePerAnnumInHours2').text(floorFigure($(this).val() * $('#perDayInHours').val()));
			$('#consumptionInKWH').text(floorFigure(totalPowerComsumptionAssocKw * $('#usagePerAnnumInHours').text()));
			$('#consumptionInKWH0').text($('#total_power_consumption_base_kw').text() * $('#usagePerAnnumInHours').text());
			$( "#electricityChargesInRs" ).trigger( "change" ); 
		});

		$(document).on('change', '#electricityChargesInRs', function () {
			if($(this).val() > 25 ) {
				alert('Max input cannot exceed 25');
				$(this).addClass('calError');
				
			} else {
				$('#electricityChargesInRs2').text(floorFigure($(this).val()));
				$('#electricityChargesPerAnnum').text(floorFigure($(this).val() * $('#consumptionInKWH').text()));
				$('#electricityChargesPerAnnum0').text(floorFigure($(this).val() * $('#consumptionInKWH0').text()));
				$('#totalOperatingCost').text(floorFigure($(this).val() * $('#consumptionInKWH').text()));
				$('#totalOperatingCost0').text(floorFigure($(this).val() * $('#consumptionInKWH0').text()));
				//alert($('#usagePerAnnumInHours').text() / $('#average_life_of_lamp_assoc').text() * $('#ledsInTheSystemAssoc').text());
				var numberOfLampsReplaced = $('#usagePerAnnumInHours').text() / $('#average_life_of_lamp_assoc').text() * $('#ledsInTheSystemAssoc').text();
				$('#numberOfLampsReplaced').text(floorFigure($('#usagePerAnnumInHours').text() / $('#average_life_of_lamp_assoc').text() * $('#ledsInTheSystemAssoc').text()));
				$('#costOfLampReplacement').text(floorFigure($('#lamp_replacement_cost_assoc').val() * Number(numberOfLampsReplaced)));
				$('#numberOfGearsReplaced').text(floorFigure(0.05 * $('#luminaireQuantityAssoc').val()));
				$('#costOfGearReplacement').text(floorFigure($('#gear_replacement_cost_asso').val() * Number($('#numberOfGearsReplaced').text())));
				var replacementOperatingCost = floorFigure(Number($('#costOfLampReplacement').text()) + Number($('#costOfGearReplacement').text()) + Number($('#totalOperatingCost').text()));
				$('#replacementOperatingCost').text(Math.round(Number($('#costOfLampReplacement').text()) + Number($('#costOfGearReplacement').text()) + Number($('#totalOperatingCost').text())));
				var replacementOperatingCost0 = floorFigure($('#totalOperatingCost0').text());
				$('#replacementOperatingCost0').text(Math.round($('#totalOperatingCost0').text()));
				var replacementOperatingCost2 = floorFigure(Number(replacementOperatingCost) - Number(replacementOperatingCost0));
				$('#replacementOperatingCost2').text(Math.round(Number(replacementOperatingCost) - Number(replacementOperatingCost0)));
				var totalAdditionalInitialInvestment = floorFigure($('#TotalSupplyInstallationCost').text());
				$('#totalAdditionalInitialInvestment').text(Math.round($('#TotalSupplyInstallationCost').text()));
				$('#payBackInMonths').text(Math.round(Number(floorFigure(totalAdditionalInitialInvestment) / Number(replacementOperatingCost2) * 12)));
			}
			
			
		});
		
		$(document).on('click', '#calculateBtn', function () {
			if($('#pcProdSelect').val() == 'Select Product' || $('#luminaireQuantityBase').val() == '' || $('#pcAsProdSelect').val() == 'Select Associated Product' || $('#luminaireQuantityAssoc').val() == '' || $('#installationCostPerLuminaire').val() == '' || $('#totalWorkingDays').val() == '' || $('#electricityChargesInRs').val() == '' || $('#perDayInHours').val() == '') {
				if($('#pcProdSelect').val() == 'Select Product') {
					$('#pcProdSelect').parent().addClass('calError');
				}	else {
					$('#pcProdSelect').parent().removeClass('calError');
				}
				if($('#luminaireQuantityBase').val() == '') {
					$('#luminaireQuantityBase').addClass('calError');
				} else {
					$('#luminaireQuantityBase').removeClass('calError');
				}
				if($('#pcAsProdSelect').val() == 'Select Associated Product') {
					$('#pcAsProdSelect').parent().addClass('calError');
				} else {
					$('#pcAsProdSelect').parent().removeClass('calError');
				}
				if($('#luminaireQuantityAssoc').val() == '') {
					$('#luminaireQuantityAssoc').addClass('calError');
				} else {
					$('#luminaireQuantityAssoc').removeClass('calError'); 
				}
				if($('#installationCostPerLuminaire').val() == '') {
					$('#installationCostPerLuminaire').addClass('calError'); 
				} else {
					$('#installationCostPerLuminaire').removeClass('calError');
				}
				if($('#totalWorkingDays').val() == '') {
					$('#totalWorkingDays').parent().addClass('calError');
				} else {
					$('#totalWorkingDays').parent().removeClass('calError'); 
				}
				if($('#electricityChargesInRs').val() == '') {
					$('#electricityChargesInRs').addClass('calError');
				} else {
					$('#electricityChargesInRs').removeClass('calError');
				}
				if($('#perDayInHours').val() == '') {
					$('#perDayInHours').parent().addClass('calError');
				} else {
					$('#perDayInHours').parent().removeClass('calError');
				}
				var errorFocus = $('.calError').offset().top - 50;
				$('html, body').animate({
						scrollTop:errorFocus
				},300);
			} else {
				
				$( "#luminaireQuantityAssoc" ).trigger( "change" ); 
				//$(this).parents(".tablePayBacKCalc").find(".enterSection").slideUp();
				$(this).parents(".tablePayBacKCalc").find(".resultSection").slideDown();
				$("html,body").animate({scrollTop: $('.tablePayBacKCalc').offset().top + 350}, 500);	
				$('#pcProdSelect').parent().removeClass('calError');
				$('#luminaireQuantityBase').removeClass('calError');
				$('#pcAsProdSelect').parent().removeClass('calError');
				$('#luminaireQuantityAssoc').removeClass('calError');
				$('#installationCostPerLuminaire').removeClass('calError');
				$('#totalWorkingDays').parent().removeClass('calError'); 
				$('#electricityChargesInRs').removeClass('calError');
				$('#perDayInHours').parent().removeClass('calError');
				$(".calBtnDiv").hide();
			}
			//genInfo_0 = '';
			//genInfo = '';
			//totalPowerConsumptionAss = 0;
			//totalPowerConsumptionBase = 0;
		});
		
		$(document).on('click','#resetBtn', function () {
			$('#pcProdSelect option:first').attr('selected','selected');
			$("#pcProdSelect").parent().find('.selVal').text('Select Product');
			$('#pcProdSelect').parent().removeClass('calError');
			$('#luminaireQuantityBase').val('');
			$('#luminaireQuantityBase').css('calError');
			$('#pcAsProdSelect option:first').attr('selected','selected');
			$("#pcAsProdSelect").parent().find('.selVal').text('Select Associated Product');
			$('#pcAsProdSelect').parent().removeClass('calError');	
			$('#luminaireQuantityAssoc').val('');
			$('#luminaireQuantityAssoc').removeClass('calError'); 
			$('#installationCostPerLuminaire').val('');
			$('#installationCostPerLuminaire').removeClass('calError');
			$('tr td span').text('-');
			$("#luminaireQuantityBase").prop('disabled', true);
			$("#luminaireQuantityAssoc").prop('disabled', true);
		});
		
		 $("#luminaireQuantityBase, #luminaireQuantityAssoc").on("keypress keyup blur",function (event) {    
			$(this).val($(this).val().replace(/[^\d].+/, ""));
				if ((event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
		 });

		 

		
	})(jQuery);  // end of document ready
	
</script>
