@extends('Master.Layout')
@section('title')
	Thesis | Log-in
@endsection
@section('content')
<div class="container">
	<div class="form-group" style="width: 200px; text-align: center; ">
		<label>Username</label>
		<input class="form-group" type="text" value="" name="username">						
		<label>Password</label>
		<input class="form-group" type="password" value="" name="password">
		<button class="btn green">Check</button>
	</div>
</div>
@endsection