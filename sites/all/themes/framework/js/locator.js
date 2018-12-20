var map = null;
var markers = [];
var citySaved = ''
function initializeMap(zom) {
	var mapOptions = {
		zoom: zom,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById('map'), mapOptions);
	geocoder = new google.maps.Geocoder();
	//infoWindow = new google.maps.InfoWindow();
	infoWindow = new google.maps.InfoWindow({
		maxWidth: 300
	});
}

(function ($) {  // document ready starts
	if(window.location.search) {
		renderSupportFormMap();
		return false;
	} 

	
	renderDefaultMap();
	
	//console.log("Good to Go....")
  $(window).load(function() {
    if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(locationHandler,function (error) {
				console.log(error);
				if (error.code == error.PERMISSION_DENIED) {
					pageLoadStore('undef');
				} 
			});
		} else {
			alert("Your Browser does not support Geolocation.");
		}
  });
	
	$(".locationFinder").on('keydown', '#pin', function (e) {
    var key = e.which;
    if(key == 13) {
      if($(this).val() == '') {
        alert('Please enter pincode.');
        return false;
      }
			$(".locate").click();
      return false;
    }
  });
	
	$(".locationFinder").on('keydown', '#city', function (e) {
    var key = e.which;
    if(key == 13) {
      if($(this).val() == '') {
        alert('Please enter city.');
        return false;
      }
			$(".locate").click();
      return false;
    }
  });
 	$("#pin").keypress(function (e) {     
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        alert("Please enter a valid pin code");
        return false;
    }
   });
   
   
	$(".locate").click(function() {
		var url = window.location.pathname;
	  var offDealLoc = url.substring(url.lastIndexOf('/') + 1);
		var lat = '';
		var lng = '';
		var city = $.trim($('#city').val());
		var pin = $.trim($('#pin').val());
		if(city == '' && pin == '') {
      alert('Please enter a pincode or city');
			return false;
    }
		
		if(city) {
      var alpha = /^([a-zA-Z.\']+\s?)*$/;
			if(!city.match(alpha)) {
				alert("Please enter a valid city name");
				return false;
			}
    }
		
		if(pin) {
			if(!$.isNumeric(pin)) {
				alert("Please enter a valid pin code");
				return false;
			}
		}
		var addrList = '';
		//if(city.trim() == '') {
			//$('#city').css('border-color','red');
		//} else {
			$.ajax({
				type: "POST",
				dataType: "json",
				url: Drupal.settings.basePath + 'dealer-locator-ajax',
				data: {'pin' : pin, 'loc' : city, 'offDealLoc' : offDealLoc},
				success: function(data) {
					if(data) {
						initializeMap(12); 
						markers.length = 0;
						$(".scroll-pain .mCSB_container").html('');
						for(var x in data) {
							if(lat == '' && lng == '') {
								lat = data[x].latitude;
								lng = data[x].longitude;
								map.setCenter(new google.maps.LatLng(lat, lng));
							} 
							createMarker(data[x]);
						}
						console.log('true', data);
					} else {
						console.log('false', data);
						if(!city) {
							city = 'this location';
						}
						if(offDealLoc == 'our-office') {
							alert('We dont have our offices at '+city+' '+pin+'.Please try another location');
						}	else {
							alert('We dont have channel partners at '+city+' '+pin+'.Please try another location');
						}
						
					}
				}
			});
		//}
	});
	
	$(".locateCon").click(function() {
		pageLoadStore(citySaved);
		$('#city').val(citySaved);
	});
  
})(jQuery);  // end of document ready


function locationHandler(position) {
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
	var latLong = lat+'-'+lng;
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(lat, lng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
	//console.log(results);
		if(status == google.maps.GeocoderStatus.OK) {
			if(results) {
				console.log(results);
				var city = results[0]['address_components'][4]['long_name'];
				// get stores based on user's current location on page load
				pageLoadStore(city);
			}
		}
		citySaved = city;
	});
}

function pageLoadStore(city) {
	if(city != 'undef') {
    $("#city").val(city);
  } 
	var url = window.location.pathname;
	var offDealLoc = url.substring(url.lastIndexOf('/') + 1);
	var lat = '';
	var lng = '';
	if(city != 'undef') {
		if(markers.length > 0) {
			for(i=0; i<markers.length; i++){
				markers[i].setMap(null);
			}
		}
		$.ajax({
			type: "POST",
			dataType: "json",
			url: Drupal.settings.basePath + 'dealer-locator-ajax',
			data: {'loc' : city, 'offDealLoc' : offDealLoc},
			success: function(data) {
				if(data) {
					initializeMap(12); 
					markers.length = 0;
					$(".scroll-pain .mCSB_container").html('');
					for(var x in data) {
						if(lat == '' && lng == '') {
							lat = data[x].latitude;
							lng = data[x].longitude;
							map.setCenter(new google.maps.LatLng(lat, lng));
						}
						createMarker(data[x]);
					}
				} else {
					if(!city)
					city = 'this location';
					//alert('We dont have our offices at '+city+'.Please try another location');
				}
			}
		});
	} else {
		var data = [
			{
				address: "5th floor, Godrej Eternia, <br>'C' Wing, Old Pune-Mumbai Road, <br>Shivajinagar",
				city: "Pune",
				contact: "Business Office",
				email: "helpdesk.lighting@wipro.com",
				fax: null,
				latitude: "18.5298528",
				longitude: "73.8572873",
				mobile: null,
				phone: "020-66098700",
				pin: "411005",
				state: "Maharashtra",
				store_name: "Wipro Lighting",
				website: null
			},
			{
				address: "'C' Block, CCLG Division, <br>Doddakannelli, Sarjapur Road",
				city: "Bangalore",
				contact: "Registered Office",
				email: null,
				fax: null,
				latitude: "12.9087059",
				longitude: "77.68516009999999",
				mobile: null,
				phone: null,
				pin: "560035",
				state: "Karnataka",
				store_name: "Wipro Enterprises (P) Limited",
				website: null
			}
		]
		//console.log(data);
		if(map === null)	{ initializeMap(5); }
		markers.length = 0;
		$(".scroll-pain .mCSB_container").html('');
		for(var x in data) {
			//alert('Limbz');
			if(lat == '' && lng == '') {
				lat = data[x].latitude;
				lng = data[x].longitude;
				map.setCenter(new google.maps.LatLng(lat, lng));
			}
			createMarker(data[x]);
		}
	}
	
}

function createMarker(store) {
	//console.log(store);
	var addrHTML = '';
	addrHTML += '<div class="addList"><p>';
	if(store.store_name) {
		addrHTML += '<span class="name"><strong>' + store.store_name + '</strong></span>';
	}
	if(store.contact) {
		addrHTML += '<br/><span class="contactPerson" style="width:100%">' + store.contact + '</span>';
	}
	addrHTML += '<span class="ads">' + store.address;
	addrHTML += '<br>' + store.city + '-' + store.pin + '<br>' + store.state  + '</span>';
	if(store.mobile) {
		addrHTML += '<span class="contact" style="width:100%">Mobile: '+ store.mobile +'</span>';
	}
	if(store.phone) {
		addrHTML += '<br/><span class="contact">Tel: '+ store.phone +'</span>';
	}
	if(store.email) {
		addrHTML += '<br/><span class="email"> Email: <a href="mailto:'+ store.email +'">'+ store.email +'</a></span>';
	}

	addrHTML += '</p><div class="dnone">'+store.latitude+'-'+store.longitude+'</div></div>';
	var latlng = new google.maps.LatLng(
		parseFloat(store.latitude),
		parseFloat(store.longitude)
	);
	var marker = new google.maps.Marker({
		map: map,
		position: latlng
	});
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(addrHTML);
		infoWindow.open(map, marker);
	});
	markers.push(marker);
	
	if(!$("body").hasClass("front")) {
		$(".scroll-pain .mCSB_container").append(addrHTML);
	}
}

function myclick(i) {
  google.maps.event.trigger(markers[i], "click");
}

function renderDefaultMap() {
	addrHTML = '';
  var locations = [
		['5th floor, Godrej Eternia, <br>C-Wing, Old Pune-Mumbai Road, <br>Shivajinagar, Pune', 18.5298528, 73.8572873, 4],
		['C-Block, CCLG Division, <br>Doddakannelli, Sarjapur Road, <br>Bangalore', 12.9087059, 77.68516009999999, 5],
	];

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 5,
		center: new google.maps.LatLng(18.5298528, 73.8572873),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow();

	var marker, i;

	for (i = 0; i < locations.length; i++) { 
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
	addrHTML += '<div class="addList"><p><span class="name">Wipro Lighting</span><br/><span class="contactPerson" style="width:100%">Business Office</span>';
	addrHTML += '<span class="ads">5th floor, Godrej Eternia, <br>C-Wing, Old Pune-Mumbai Road, <br>Shivajinagar';
	addrHTML += 'Pune-411005, <br>Maharashtra</span><br/><span class="contact">Tel: 020-66098700</span>';
	addrHTML += '<br/><span class="email"> Email: <a href="mailto:helpdesk.lighting@wipro.com">helpdesk.lighting@wipro.com</a></span></p></div>';
	
	addrHTML += '<div class="addList"><p><span class="name">Wipro Enterprises (P) Limited</span><br/><span class="contactPerson" style="width:100%">Registered Office</span>';
	addrHTML += '<span class="ads">C-Block, CCLG Division, <br>Doddakannelli, Sarjapur Road<br/>Bangalore-560035, Karnataka</span></p></div>';
	$(".scroll-pain").html(addrHTML);
	
}


function renderSupportFormMap() {
  addrHTML = '';
  var locations = [
		['Wipro Enterprise Ltd., 5th Floor, Godrej Eternia, <br>C-Wing, Old Pune-Mumbai Road, <br>Shivajinagar, Pune- 411005<br>', 18.5298528, 73.8572873, 4],
	];
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 12,
		center: new google.maps.LatLng(18.5298528, 73.8572873),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	var infowindow = new google.maps.InfoWindow();
	var marker, i;
	for (i = 0; i < locations.length; i++) { 
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
	addrHTML += '<div class="addList"><p><span class="name">Wipro Enterprise Ltd.</span><br/>';
	addrHTML += '<span class="ads">5th floor, Godrej Eternia, <br>C-Wing, Old Pune-Mumbai Road, <br>Shivajinagar';
	addrHTML += 'Pune-411005, <br>Maharashtra</span></div>';
	$(".scroll-pain").html(addrHTML);
}
 
