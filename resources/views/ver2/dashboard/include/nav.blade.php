<div class="cons">
	<nav class="navbar">
      <div class="navhead">
        <a href="/dashboard" class="headicon"><i class="fa fa-desktop" aria-hidden="true">  Monitoring</i></a>
      	<span class="name_email">
      	<i class="fa fa-circle" aria-hidden="true"></i>
      	{{$user_info->gmail}}
      	<div class="dropdown">
    		<button class="dropbtn" onclick="myFunction()"><i class="fa fa-arrow-down"></i></button>
    			<div class="dropdown-content" id="myDropdown">
      				<a href="/profile"><i class="fa fa-user"></i>Profile</a>
      				<a href="/logout"><i class="fa fa-gear"></i>Logout</a>
       			</div>
  		</div> 
  		</span>
      </div>
	</nav>
</div>