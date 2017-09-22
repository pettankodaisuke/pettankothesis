@extends('ver2.dashboard.layout.layout')
@section('content')
<div class="container text-center">
  <div class="headerpage text-left">
  	<p><i class="fa fa-user" aria-hidden="true"></i>{{$page}}</p>
  </div>
  <div class="Listofdetail">
  	<form method="post" class="profile">
  		{{ csrf_field() }}
		First name: <input class="profs"  id="fnames" type="text" name="fname" value="{{$user_info->fname}}"><br>
		Middle name: <input class="profs mnames" type="text" name="mname" value="{{$user_info->mname}}"><br>
		Last name: <input class="profs"  id="lnames" type="text" name="lname" value="{{$user_info->lname}}"><br>
		Contact: <input class="profs"  id="contacts" type="text" name="contact" value="{{$user_info->contact}}"><br>
		E-mail: <input class="profs"  id="emails" type="text" name="email" value="{{$user_info->gmail}}"><br>
		Password: <input class="profs"  id="passwords" type="text" name="password" value="{{$user_info->password}}"><br>
		<input type="submit" value="Edit" class="subs">
	</form>
  </div>
</div>
@endsection