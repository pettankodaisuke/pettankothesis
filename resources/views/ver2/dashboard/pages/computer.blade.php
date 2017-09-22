@extends('ver2.dashboard.layout.layout')
@section('content')
<div class="container text-center">
  <div class="headerpage text-left">
  	<p><i class="fa fa-history" aria-hidden="true"></i>{{$page}}</p>
  </div>
  @foreach($_comp as $computer)
	  <div class="listcomps clearfix">
	  	<div class="row">
	  		<div class="col-md-6 text-left">
			  	<h3>{{$computer->pcname}}</h3>
			</div>
			<div class="col-md-6 text-right">
			  	<button class="drpinfo" type="button" data-toggle="collapse" data-target="#demo"><i class="fa fa-arrow-down"></i></button>
			</div>
		</div>
	  	<div id="demo" class="collapse clearfix">
	  	<span class="relative_container_{{$computer->id}}"></span>
	  	<div class="datefilt">
	  		Date :<i class="fa fa-filter"></i><input type="text" class="datepicker" name="start" value="TODAY" disabled style="color: black;">
	  	</div>
	    <div class="table">
	      <table class="table table-bordered table-striped table-hovered" style="width:100%" id="myTable">
	         <tr>
	            <th class="text-center">Device name</th>
	            <th class="text-center">CPU</th>
	            <th class="text-center">Memory</th>
	            <th class="text-center">HDD</th>
	            <th class="text-center">HDD Free</th>
	            <th class="text-center">HDD Used</th>
	            <th class="text-center">Temp</th>
	            <th class="text-center">Date / Time</th>
	         </tr>
	         @foreach($computer->relative as $relative)
	         <tr class="">
	            <td class="text-center"> {{$relative->name}} </td>
	            <td class="text-center"> {{$relative->cpu}} % </td>
	            <td class="text-center"> {{$relative->memory}} %</td>
	            <td class="text-center"> {{$relative->hdd}} Bytes</td>
	            <td class="text-center"> {{$relative->hdd_free}} Bytes</td>
	            <td class="text-center"> {{$relative->hdd_used}} Bytes</td>
	            <td class="text-center"> {{$relative->temperature}} eC </td>
	            <td class="text-center"> {{date('Y-m-d g:i:s A',strtotime($relative->created_at))}} </td>
	         </tr>
	         @endforeach
	      </table>
   </div>
	  	</div>
	  </div>




	  {{-- <script type="text/javascript">


	  	var obj = $(".relative_container_"+{{$computer->id}}).attr("value_container");
	  	var obj = $.parseJSON(obj);

		var hour   = [];
		var amount_hdd = [];
		var amount_cpu = [];
		var amount_memory = [];

		$.each(obj,function(key,val)
		{
			hour.push(val.converted_date);
			amount_hdd.push(val.hdd);
			amount_memory.push(val.memory);
			amount_cpu.push(val.cpu);
		});

		new Chart(document.getElementById("line-chart"), 
		{	
			  type: 'line',
			  data: {
			    labels: [hour],
			    datasets: [{ 
			        data: [amount_cpu],
			        label: "CPU",
			        borderColor: "#3e95cd",
			        fill: true
			      }, { 
			        data: [amount_memory],
			        label: "MEMORY",
			        borderColor: "#8e5ea2",
			        fill: true
			      }, { 
			        data: [amount_hdd],
			        label: "HDD",
			        borderColor: "#3cba9f",
			        fill: true
			      }
			    ]
			  },
			  options: {
			    title: {
			      display: true,
			      text: ''
			    }
			  }
		});
		</script> --}}
  @endforeach
</div>


@endsection