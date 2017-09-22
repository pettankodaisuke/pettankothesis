@extends('ver2.dashboard.layout.layout')
@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-md-3 text-center" id="included">
    	<div class="card">
		 	<img src="./Assets/img/node.jpg" alt="Avatar" style="width:100%">
		 	<div class="cardcontainer clearfix">
		    	<h4 class="text-center"><i class="fa fa-list-ul"></i><b>Computer List</b></h4> 
		    	<a href="/computerlist"><p class="text-center"><button class="listtriggerbtn">View</button></p> </a>
		  	</div>
		</div>
    </div>
    <div class="col-md-3 text-center" id="included">
    	<div class="card">
		 	<img src="./Assets/img/node.jpg" alt="Avatar" style="width:100%">
		 	<div class="cardcontainer clearfix">
		    	<h4 class="text-center"><i class="fa fa-calendar"></i><b>Event Log</b></h4> 
		    	<a href="/eventlog"><p class="text-center"><button class="listtriggerbtn">View</button></p></a> 
		  	</div>
		</div>
    </div>
     <div class="col-md-3 text-center">
    	<div class="card">
		 	<img src="./Assets/img/node.jpg" alt="Avatar" style="width:100%">
		 	<div class="cardcontainer clearfix">
		    	<h4 class="text-center"><i class="fa fa-history" aria-hidden="true"></i><b>Entry Data History</b></h4> 
		    	<a href="/history"><p class="text-center"><button class="listtriggerbtn">View</button></p></a>
		  	</div>
		</div>
    </div>
    <div class="col-md-3 text-center" id="included">
    	<div class="card">
		 	<img src="./Assets/img/node.jpg" alt="Avatar" style="width:100%">
		 	<div class="cardcontainer clearfix">
		    	<h4 class="text-center"><i class="fa fa-bar-chart"></i><b>Report</b></h4> 
		    	<a href="/report"><p class="text-center"><button class="listtriggerbtn">View</button></p></a>
		  	</div>
		</div>
    </div>
  </div>
</div>
@endsection