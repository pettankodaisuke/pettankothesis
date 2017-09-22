@extends('Master.Layout')
@section('title')
Home
@endsection
@section('Custom_css')

@endsection
@section('header')

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-desktop icon-nav fa-4" aria-hidden="true">Monitoring</i></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="/admin" data-toggle="modal" {{-- data-target="#signmodal" --}}>Dashboard</a></li>
      </ul>
    </div>
  </div>
</nav>

@endsection
@section('content')
<div class="container-fluid bg-1 text-center">
    <h3 class="img1-text">Web-based Computer and Network Analysis</h3>
    <h3 class="img2-text">for ACLC College of Sta Maria Bayan</h3>
</div>
<div class="container bg-2 text-center">
  <h3>What Am I?</h3>
  <p>Web-based Computer and Network Analysis is system that will help us to troubleshoot our computer and network to lessen the time to find what the problem is either our computer or our network connection. We decided to develop this system to help our lab facilitator to monitor what’s happening in our computer units or in our internet connection. It has an ability to generate a report weekly & monthly using GMAIL, and it also use graph to see the status of the unit.</p>
</div>
<div class="container bg-3 text-center">
  <h3 class="margin">Where To Find Me?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Joshua Garcia</p>
      <img src="Assets/img/analyze.jpg" class="img-responsive margin img-square "  alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Winston Jude Guevarra</p>
      <img src="Assets/img/analyze.jpg" class="img-responsive margin img-square"  alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Jellieca Nalayog</p>
      <img src="Assets/img/analyze.jpg" class="img-responsive margin img-square"  alt="Image">
    </div>
  </div>
</div>

{{-- <!-- Modal -->
  <div class="modal fade" id="signmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
        </div>
      </div>
      
    </div>
  </div> --}}
@endsection
@section('footer')
<footer class="container-fluid bg-5 text-center">
  <p>copy right 2017</a></p> 
</footer>
@endsection