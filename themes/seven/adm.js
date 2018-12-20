(function ($) {
  $(document).on('click','.submit_sku',function(){
  //$(".submit_sku").live("click", function() {
    if($("#filter_sku").is(":checked")) {
			var sku = $("#filter_sku_text").val();
			if(sku == '') {
				alert('Please enter Product SKU');
				return false;
			} else {
				$.ajax({
					type: "POST",
					url: Drupal.settings.basePath + 'edit-product-details',
					data:{ psku : sku },
					success: function(data) {
						console.log(data);
            $(".myOutput").html('');
            $(".myOutput").html(data);
						/*$("#node-admin-content").find(".table-select-processed").find("tbody").remove();
						$(".item-list").addClass("dnone");
						$("#node-admin-content").find(".table-select-processed").find("thead").html("");
						$("#node-admin-content").find(".table-select-processed").find("thead").after(data);*/
					}
				});
			}
		}
	});
  
  //setTimeout(function(){
    if($("body").hasClass("node-type-payback-calculator-matrix") && $("body").hasClass("page-node-edit")) {
      var temp = $("#payback-calculator-matrix-node-form").attr("action");
      var strToRemove = Drupal.settings.basePath + 'node/';
      temp = temp.replace(strToRemove, '');
      var nid = temp.replace('/edit?destination=admin/content', '');
      $.ajax({
        dataType : "json",
        type:'POST',
        url: Drupal.settings.basePath + 'payback-select-data',
        data: {nid: nid},
        success:function(data){
          console.log(data);
          $("#edit-field-base-product-name-und option").each(function() {
            if($(this).val() == data.base) {
              $(this).attr('selected', 'selected');
            }
          });
          $("#edit-field-associated-product-name-und option").each(function() {
            if($(this).val() == data.assoc) {
              $(this).attr('selected', 'selected');
            }
          });
        }
      });
    }
 // }, 3000);
  
  
  //no-sidebars page-node page-node- page-node-419 page-node-edit node-type-payback-calculator-matrix admin-menu
	
	
})(jQuery);  // end of document ready
