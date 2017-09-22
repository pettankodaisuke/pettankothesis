<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
		<!-- style -->
		<link rel="icon" type="image/png" href="./Assets/img/favicon-16x16.png" sizes="16x16" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Assets/sass/home1.css">
</head>
<body style="background-image: url(./Assets/img/graph.jpg);">
		<div class="cons">
			<nav class="navbar">
		      <div class="navhead">
		        <a href="#"><i class="fa fa-desktop">  Monitoring</i></a>
		      	<button class="btn" id="btnlogin" data-toggle="modal" data-target="#myModal">Login</button>
		      </div>
			</nav>
		</div>
{{-- 		<div>
			<img class="graph" src="./Assets/img/graph.jpg">
		</div> --}}
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- Login Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <span class="text-center">Login</span>
		      </div>
		      <div class="modal-body text-center">
		      	<form method="post">
		      		{{ csrf_field() }}
			        <div class="form-group">
	  					<label class="">Email</label>
	  					<input type="text" class="form-control" name="username" placeholder='&#xf0e0; Email' id="email">
					</div>
					<div class="form-group">
	  					<label class="">Password</label>
	  					<input type="password" class="form-control" name="password" placeholder='&#xf023; Password' id="email">
					</div>
					<div class="form-group">
						<button class="Login">Login</button>	
					</div>
				</form>
		      </div>
		    </div>

		  </div>
		</div>
</body>
</html>

<script type="text/javascript">
     var status =  "{{ $message }}";

     if(status != "")
     {
     	alert("Wrong Password or Username");
     }

</script>
	