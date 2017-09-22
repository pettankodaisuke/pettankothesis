@extends('ver2.dashboard.layout.layout')
@section('content')
<div class="container text-center">
  <div class="headerpage text-left">
  	<p><i class="fa fa-bar-chart" aria-hidden="true"></i>{{$page}}</p>
  </div>
  <div class="headerpages text-left clearfix">
  	<form method="GET" action="/report/export">
      	  {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
	      <div class="pull-left filt" style="margin-left: 40px;"><span  style="color: black;"><h4>From :</h3></span><input type="text" class="datepicker start" name="start" style="color: black;"></div>
	      <div class="pull-right filt" style="margin-right: 50px;"><span  style="color: black;"><h4>To :</h3></span><input type="text" class="datepicker end" name="end" style="color: black;"></div>
	      {{-- <div class="clearfix" style="margin-bottom: 25px;">
	      	
	   	  </div>  --}}
	   	  <div class="pull-right view" ><button class="btn btn-default" type="submit" style="border-radius: 0px; background: #474E5D; color: #ffffff; margin-right: 10px; padding: 10px 17px; font-size: 10px; width: 100px;" > Create Report</button></div>
          <div class="pull-left export"><button type="button" class="btn btn-info popup_comp" type="submit" style="border-radius: 0px; color: #ffffff; margin-right: 10px; padding: 10px 17px; font-size: 10px; width: 100px;" >view</button></div>
   	</form>
  </div>
  <div class="tabs-contents">
  	<ul class="tabs-menu">
        <li class="current"><a href="#tab-1">Computer Data</a></li>
        <li><a href="#tab-2">Eventlogs</a></li>
   </ul>
   	 <div id="tab-1" class="tab-content">
	  <div class="Listofdetails">
	  </div>
 </div> 
 <div id="tab-2" class="tab-content">
	  <div class="Listofdetails1">
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
	$(".Listofdetails").load("/report/view?start="+$(".start").val()+"&end="+$(".end").val());
	$(".Listofdetails1").load("/report/view2?start="+$(".start").val()+"&end="+$(".end").val());
});

$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>



@endsection