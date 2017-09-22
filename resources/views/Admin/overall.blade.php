@extends('Admin.Layout')
@section('title')
	{{$page}}
@endsection
@section('content')
<div class="container bg-6 text-center">
   <div class="head">
      Monitoring
   </div>
   
   <div class="bg">
   
   </div>
  
   <div class="clearfix" style="margin-bottom: 25px; margin-top: 25px; ">
      <div class="pull-right input-group" style="border-radius: 0px; width: 400px;"><span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter keywords..."></div>
   </div>
   <div class="table">
      <table class="table table-bordered table-striped table-hovered" style="width:100%" id="myTable">
         <tr>
            <th class="text-center">Device name</th>
            <th class="text-center">CPU</th>
            <th class="text-center">Memory</th>
            <th class="text-center">Temp</th>
            <th class="text-center">Date / Time</th>
            <th class="text-center"></th>
         </tr>
         @foreach($_comp as $comp)
         <tr class="">
            <td class="text-center"> {{$comp->name}} </td>
            <td class="text-center"> {{$comp->cpu}} % </td>
            <td class="text-center"> {{$comp->memory}} %</td>
            <td class="text-center"> {{$comp->temperature}} C </td>
            <td class="text-center"> {{date('Y-m-d g:i:s A',strtotime($comp->created_at))}} </td>
            <td class="text-center"> <button type="button" comp_id="{{$comp->id}}" class="btn btn-info btn-lg popup_comp" data-toggle="modal" data-target="#myModal" style=" border-radius: 0px; padding: 10px 17px; font-size: 10px">View Info</button></td>
         </tr>
         @endforeach
      </table>
   </div>
   <div class="foot" style="border-top-width: 2px ; border-top-color: black;">      
   		 <div class="clearfix" style="margin-bottom: 25px;">
      		<div class="pull-right" style="margin-right: 30px;">
      			<button type="button" comp_id="{{$comp->id}}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myReportModal" style=" border-radius: 0px; padding: 10px 17px; font-size: 10px">Make a Report</button>
      		</div>
   		</div>
   </div>
</div>	

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #000;">Full Information</h4>
      </div>
      <div class="modal-body">
      	<div class="row clearfix">
      		<div class="col-sm-4">
		    <canvas id="doughnut-chart"></canvas>
		    </div>
		    <div class="col-sm-4">
		    <canvas id="doughnut-chart1"></canvas> 
		    </div>
		    <div class="col-sm-4"> 
		    <canvas id="doughnut-chart2"></canvas>
		    </div>
      	</div>
        <table class="table table-bordered table-hovered table-striped info_container" style="width:100%; color:black; margin-top: 25px;">
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myReportModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: #000;">Choose a date range</h4>
      </div>
      <div class="modal-body clearfix">
      <form method="GET" action="/admin/export">
      	  {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
	      <div class="pull-left" style="margin-left: 40px;"><span  style="color: black;"><h4>From :</h3></span><input type="text" class="datepicker" name="start" style="color: black;"></div>
	      <div class="pull-right" style="margin-right: 50px;"><span  style="color: black;"><h4>To :</h3></span><input type="text" class="datepicker" name="end" style="color: black;"></div>
	      {{-- <div class="clearfix" style="margin-bottom: 25px;">
	      	
	   	  </div>  --}}
   	  
      </div>
      <div class="modal-footer">
        <div class="pull-right" ><button class="btn btn-default" type="submit" style="border-radius: 0px; background: #474E5D; color: #ffffff; margin-right: 10px; padding: 10px 17px; font-size: 10px;" > Create Report</button></div>
        <div class="pull-left"><button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 0px; color: #ffffff; margin-right: 10px; padding: 10px 17px; font-size: 10px;" >Close</button></div>
        </form>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">

$( function() 
{
	$( "#datepicker" ).datepicker();
});

$(".popup_comp").click(function()
{
	var id         = $(this).attr("comp_id");
	var group 	   = new Array();
	var used_name  = null;

	var tempmax  = null;
	var tempmin  = null;

	var rammin   = null;
	var rammax   = null;

	var cpumin   = null;
	var cpumax   = null;

	$(".info_container").empty();
	group.push({"DeviceName" : "name"});		
	group.push({"CPU" 		 : "cpu"});		
	group.push({"CPUmin"	 : "cpumin"});		
	group.push({"CPUmax"	 : "cpumax"});
	group.push({"Memory"	 : "memory"});		
	group.push({"Memorymin"	 : "rammin"});			
	group.push({"Memorymax"  : "rammax"});			
	group.push({"Tempmax"    : "tempmax"});		
	group.push({"Tempmin"    : "tempmin"});		
	group.push({"DateTime"	 : "created_at"});			

    $.each(group, function(key, value) 
    {
	    $.each(value, function(key2,value2) 
	    {
	    	
		  	var string =   "<tr>"
		  	  	string +=    "<td style='width: 1px; font-weight: 700'>"

			    $.ajax(
			    {
			        url: "/admin/getdetails?id="+id+"&request="+value2,
			        async: false,
			        dataType: 'json',
			        success: function(data) 
			        {
			            used_name = data;
			            if(value2 == "tempmin")
			            {
			            	tempmin = data;														
			            }			           

			            if(value2 == "tempmax")
			            {
			            	tempmax = data;													
			            }			            

			            if(value2 == "rammin")
			            {
							rammin = data;							
			            }

			            if(value2 == "rammax")
			            {
			            	rammax = data;														
			            }			            

			            if(value2 == "cpumax")
			            {
							cpumax = data;							
			            }

			            if(value2 == "cpumin")
			            {
							cpumin = data;							
			            }
			        }
			    });

		  	  	string +=		 key2+"</td><td>"+used_name


		  	  	string +=	  "</td>"
		  	  	string +=	"</tr>";

		  	  	$(".info_container").append(string);	  				
	    });
    });

  	  	new Chart(document.getElementById("doughnut-chart"), 
  	  	{
		    type: 'doughnut',
		    data: {
		      labels: ["TempMin", "TempMax"],
		      datasets: [
		        {
		          label: "Temp",
		          backgroundColor: ["#3e95cd", "#8e5ea2"],
		          data: [tempmin,tempmax]
		        }
		      ]
		    },
		});

		new Chart(document.getElementById("doughnut-chart1"), 
		{
		    type: 'doughnut',
		    data: {
		      labels: ["CPUmin", "CPUmax"],
		      datasets: [
		        {
		          label: "CPU",
		          backgroundColor: ["#3e95cd", "#8e5ea2"],
		          data: [cpumin,cpumax]
		        }
		      ]
		    },
		});


		new Chart(document.getElementById("doughnut-chart2"), 
		{
		    type: 'doughnut',
		    data: {
		      labels: ["RAMmin", "RAMmax"],
		      datasets: [
		        {
		          label: "RAM",
		          backgroundColor: ["#3e95cd", "#8e5ea2"],
		          data: [rammin,rammax]
		        }
		      ]
		    },
		});
});




</script>

<script>
function myFunction() 
{
  // Declare variables 
  var input, filter, table, tr, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    var td1 = tr[i].getElementsByTagName("td")[0];
    var td2 = tr[i].getElementsByTagName("td")[1];
    var td3 = tr[i].getElementsByTagName("td")[2];
    var td4 = tr[i].getElementsByTagName("td")[3];
    var td5 = tr[i].getElementsByTagName("td")[4];
    if (td1 || td2) 
    {
      if (td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1 || td5.innerHTML.toUpperCase().indexOf(filter) > -1) 
      {
        tr[i].style.display = "";
      } 
      else 
      {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
@endsection

