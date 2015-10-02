<!DOCTYPE html>
<html>
  <head>
    <title>
      New Request
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/Blinx/bootstrap-3.3.5-dist/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Blinx/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
	
	<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="/Blinx/bootstrap-3.3.5-dist/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="/Blinx/bootstrap-3.3.5-dist/css/select.dataTables.css">
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" type="text/css">
  
<!-- DataTables -->
<script type="text/javascript" charset="utf-8" src="/Blinx/bootstrap-3.3.5-dist/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/Blinx/bootstrap-3.3.5-dist/js/dataTables.select.js"></script>
	<script>
            var latitude="";
            var longitude="";
            var table;
            var allLocations = [];
            var allCoordenates=[];
            var pointer=0;
            var bData="";
            var blocationData=[];
            function initialize()
	   {
                var input = document.getElementById('autocomplete');
                var options = {componentRestrictions: {country: 'in'}};
                var autocomplete=new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete,'place_changed', function()
            {
    /* Get place details */
                var inputA = document.getElementById('autocomplete').value;
                 var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                        'address': inputA
                        }, function(results, status) {
                            if (status === google.maps.GeocoderStatus.OK) 
                            {
                                latitude=results[0].geometry.location.lat();    
                                longitude=results[0].geometry.location.lng(); 
                                /*alert("Latitude: " + latitude + "\nLongitude: " + longitude);*/
                            }
                        });
                        		/*var dataString = {'lat':'','lng':''};
		 table = $('#searchResultTable').DataTable({
						"paging":   false,
						"ordering": false,
						"info":     false,
						"serverSide": false,
						"searching":false,
						"select": {style: 'single'},
						"ajax":{ "type": "POST",
							  "url":"/Blinx/php/blocationsearch.php",
							  "data": dataString ,
							  "dataType": "json"
							},
						"columns": [
                                                                { "data": "distance" },
                                                                { "data": "latitude" },
                                                                { "data": "longitude" },
                                                                { "data": "UserId" }
                                                            ]
                                                    });*/
    /* Do something with place information */
           });
            };
    /* Do something with place information */
  	$(document).ready(function(){
	  	$("#btnsearch").click(function () 
                {
		/*var dataString = {'lat':latitude,'lng':longitude};*/
                var dataString = {'lat':'12.9381776','lng':'77.62282519999997'};
               	$.ajax({
                                url:"/Blinx/php/blocationsearch.php",
                                type: "POST",
                                datatype: "json",
                                data:dataString,
                                success: function (msg) 
                                {
                                    var JSONObject = JSON.parse(msg);
                                    bData=JSONObject["data"];
                                    $.each(JSONObject["data"], function(i, item)
                                    {
                                        /*alert("Mine is " + i + "|" + item.latitude + "|" + item.longitude);*/
                                         tmp = {
                                                    'lat': item.latitude,
                                                    'lng': item.longitude
                                               };
                                        allCoordenates.push(tmp);
                                        /*var location=getLocationDetails(item.latitude,item.longitude);
                                        alert(location);*/
                                    });
                                    /*var jsonCoordinates=json_encode(allCoordenates);*/
                                    getLocationDetails(allCoordenates[0])
                                    /*alert("Success");
                                    alert(msg);*/
                                },
                                error: function(error)
                                {
                                   console.log('ERROR',error);
                                }
                    });
                /*var dataString = {'lat':latitude,'lng':longitude};
		table.destroy();
		table=$('#searchResultTable').DataTable({
						"paging":   false,
						"ordering": false,
						"info":     false,
						"serverSide": false,
						"searching":false,
						"select": {style: 'single'},
						"ajax":{ "type": "POST",
							  "url":"/Blinx/php/blocationsearch.php",
							  "data": dataString ,
							  "dataType": "json"
							},
						"columns": [
                                                                { "data": "distance" },
                                                                { "data": "latitude" },
                                                                { "data": "longitude" },
                                                                { "data": "UserId" }
                                                            ]
                                                    });
		});*/
		var selectedRowData="10";
		$('#searchResultTable tbody').on( 'click', 'tr', function (evt)  
                {
                    selectedRowData=table.row( this ).data();
                   console.log(selectedRowData.user_id);
				});
		//
		$("#createRequest").on("click",function(evt){
			evt.preventDefault();
			var newURL = "/Blinx/beneficiary/UserProfile.html?mphone="+selectedRowData.mobile_number+"";
			window.location = newURL;
		});
	});
        });
        function getLocationDetails(jsonObj)
{
    var url1="http://maps.googleapis.com/maps/api/geocode/json?latlng="+
        jsonObj.lat+","+jsonObj.lng+"&sensor=true";

/*var dataString = {'latlng':jsonObj.lat+","+jsonObj.lng,'sensor':true};*/
        $.ajax({
                                url:url1,
                                type: "POST",
                                datatype: "json",
                                success: function (msg) 
                                {
                                    /*console.log('Success',msg);
                                    console.log('Success',msg.results[0].formatted_address);*/
                                    tmp1 = {
                                                    'location': msg.results[0].formatted_address,
                                               };
                                    allLocations.push(tmp1);
                                    /*var obj = JSON.parse( bData[pointer] );
                                    bData[pointer]['location']=== msg.results[0].formatted_address;*/
                                    increaseIndex();
                                },
                                error: function(error)
                                {
                                   console.log('ERROR',error);
                                }
/*var url="http://maps.googleapis.com/maps/api/geocode/json?latlng="+
        $jsonObj.lat+","+$jsonObj.lng+"&sensor=true";
    var xhr = createCORSRequest('POST', url);
           if (!xhr) {
             alert('CORS not supported');
           }
         
           xhr.onload = function() {
        
            var data =JSON.parse(xhr.responseText);
            
            if(data.results.length>0)
            {
            
            var locationDetails=data.results[0].formatted_address;
            var  value=locationDetails.split(",");
            count=value.length;
            country=value[count-1];
             state=value[count-2];
             city=value[count-3];
             pin=state.split(" ");
             pinCode=pin[pin.length-1];
             state=state.replace(pinCode,' ');
             return locationDetails;
             //
            }
            else
            {
             document.getElementById("messageBox").style.visibility="visible";
             document.getElementById("message").innerHTML=
               "No location available for provided details.";
            }
            
           };

           xhr.onerror = function() {
               alert('Woops, there was an error making the request.');
               
           };
        xhr.send();*/
        
});
};
function increaseIndex()
{
	pointer++;
	if(pointer<allCoordenates.length){
		getLocationDetails(allCoordenates[pointer]);
	}else{
            /*alert("Results");*/
		                       $.each(bData, function(i, item)
                                    {
                                           /*lert("Mine is " + i + "|" + item.latitude + "|" + item.longitude);*/
                                         tmp1 = {
                                                    'location': allLocations[i].location,
                                                    'distance':item.distance,
                                                    'UserID':item.UserId,
                                                    'Id':item.Id,
                                                    'Description':item.Description,
                                                    'ServideDate':item.Requesteddate,
                                                    'Name':item.Name,
                                                    "Message":item.Message
                                                    
                                               };
                                    blocationData.push(tmp1);
                                        /*allCoordenates.push(tmp);
                                        var location=getLocationDetails(item.latitude,item.longitude);
                                        alert(location);*/
                                    });
                                    
                                    /*$('#searchResultTable').dataTable( {
                                        "aaData":blocationData,
                                            "aoColumns": [
                                                { "mData": "location" },
                                                { "mData": "distance" },
                                                { "mData": "Name" },
                                                { "mData": "Id" },
                                                { "mData": "ServideDate" },
                                                { "mData": "Description" },
                                                { "mData": "Message" }
                                            ]
                                            });*/
            var htmlText = '';
             $.each(blocationData,function(key,value)
            {
                /*
                var divText = '<div  class="results-section-wrapper"> '+
                              '<div  class="results"> <div class="result-details"> ' +
                              '<div class="result-details-line">'
                              '<div class="result-title">'+blocationData[key].UserID+'</div> '+
                              '</div><div class="result-details-line"> '+
                              '<div class="result-tags">'+blocationData[key].helpdescription+'</div>'+
                              '</div> <div class="result-text">'+blocationData[key].message+'</div>'+
                              '<div class="result-chef-dets"> <span class="order-by">Request Placed on :<span class="time">'
                              +blocationData[key].creationdatetime+' </span></span><span class="ready-by">Requed to be completed By:'+
                              '<span class="time">'+blocationData[key].requesteddatetime+'</span> '+
                              '</span></div></div><div class="result-right"'+
                              '<div class="result-btn">Accept</div></div> </div> </div>';
                      */
                     var divText="<div class='design-display' ><div style='width : 90%; float:left; color:#AAAAAA'>"+
                                 "<div> <span style='font-size: 20px;color:#000000'>"+blocationData[key].Name+"</div>"+
                                 "<div> <span style='font-size: 14px;color:#AAAAAA'> Type of service : </span> "+
                                 "<span style='margin-right: 10px ; font-size: 14px;color:#000000'>"+blocationData[key].Description+"</span>"+
                                 "<span style='font-size: 14px;color:#AAAAAA'>Service Date:</span>"+
                                 "<span style='font-size: 14px;color:#000000'>"+blocationData[key].ServideDate+"</span>"+
                                 "</div>"+
                                 "<div>"+blocationData[key].location+"</div>"+
                                 "<div>"+blocationData[key].Message+"</div>"+
                                 "</div>"+
                                "<button class='btn btn btn-success' type='button' style='float : left; margin-top:30px;'>Accept</button></div>";
			    htmlText = htmlText + divText;

            });
             var info = $('#allresults');
	      info.html(htmlText);		
              console.log(blocationData);
	};
    };
function createCORSRequest(method, url) {
  var xhr = new XMLHttpRequest();

  if ("withCredentials" in xhr) {
    // XHR for Chrome/Firefox/Opera/Safari.
    xhr.open(method, url, true);

  } else if (typeof XDomainRequest != "undefined") {
    // XDomainRequest for IE.
    xhr = new XDomainRequest();
    xhr.open(method, url);

  } else {
    // CORS not supported.
    xhr = null;
  }
  return xhr;
}
	
    </script> 
    <style>
        .design-display
        {
            width : 100%;
            height : 100px;
            border-bottom: 0.25px grey solid;
        }
    label.invalid
{
    color: Red;
    font-style: italic;
    padding: 1px;
    margin: 0px 0px 0px 5px;
}
row {
    margin-top: 10px;
}
ul li{
 height: 30px;
 border: 1px solid #ccc;
 background: white;
 font-family: verdana;
 list-style-type: none;
 list-style-position: outside;
 list-style-image: none;
}
ul li:hover{
 background: lightblue;
 cursor: pointer;
}
.top-buffer { margin-top:20px; }
.results-section-wrapper {
    display: inline-block;
    width: 100%;
    margin-top: 8px;
}

.results {
    width: 90%;
    height: 150px;
    border: 1px solid #eaedef;
    background-color: #ffffff;
    display: inline-block;
	font-weight: bold;
	font-family: 'Aller', sans-serif;
}

.result-details {
    width: 440px;
    float: left;
    margin: 18px 0 0 20px;
    display: inline-block;
    color: #333333;
}
.result-details-line{
	display:block;
	height:16px;
}
.result-title {
    color: #333333;
    font-size: 16px;
    margin: 0;
    line-height: 16px;
    float: left;
}
.all-results {
    /*display: inline-block;
    margin-bottom: 30px;*/
    width : 100%;
}
.results .title {
    color: #333333;
    font-size: 16px;
    margin: 0;
    line-height: 16px;
    float: left;
}
</style>
    </head>
 <body  onLoad="initialize()">
   <div class="container">
	  
      <div class="row">
         <div class="col-lg-12 col-lg-offset-4" ><h2>Search Benificiry</h2></div>
      </div>
      <div class="row top-buffer">
        <div>
          <div class="input-group">
            <input type="text" class="form-control" id="autocomplete" name="autocomplete" placeholder="Choose Location">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="btnsearch">Search</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div> 
      
       
       <div class="row top-buffer">
          <div class="col-md-offset-1 col-md-8">
            <div id="allresults" class="all-results">
            </div>
          </div>
       </div>
<!--      <div class="row top-buffer">
        <div class="panel panel-default">
     Default panel contents 
          <div class="panel-heading">Search Result</div>
           Table 
		  <div class="container table-responsive">
          <table class="table table-striped" id="searchResultTable">
            <thead>
				<tr>
					<th data-toggle="true">Location</th>
					<th>Distance</th>
					<th>UserId</th>
                                        <th>TxnId</th>
                                        <th>ServiceDate</th>
                                        <th>Help</th>
                                        <th>Message</th>
				</tr>
			</thead>
          </table>
		  </div>
        </div>
      </div> -->
  </div>
 </body>
</html>                 