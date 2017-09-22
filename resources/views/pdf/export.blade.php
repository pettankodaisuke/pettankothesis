<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body
	{
		font-family: "Arial", sans-serif;
	}
	table
	{
		width: 100%;
		border-collapse: collapse;
	}
	tr,td,th
	{
		border: 1px solid #ddd;
		padding: 7.5px;
	}
	</style>
</head>
<body>
<div class="text-center">
<h1 style="font-size: 30px; text-align: center; margin-left: 20px;">ACLC Sta. Maria Bayan </h1>
<h1 style="font-size: 30px; text-align: center; margin-left: 20px;">Table Reports </h1>
<span style="font-size: 20px; text-align: center; margin-left: 220px; margin-bottom: 220px;">From :  {{$starts}}    To: {{$ends}} </span>
</div>
	<table>
		<thead>
			<tr>
				<th>Device Name</th>
				<th>CPUmin</th>
				<th>CPUMax</th>
				<th>Memorymin</th>
				<th>Memorymax</th>
				<th>Tempmin</th>
				<th>Tempmax</th>
				<th>Date / Time</th>
			</tr>
		</thead>
		<tbody>
			@foreach($_comp as $comp)
				<tr>
					<td>{{$comp->name}}</td>
					<td>{{$comp->cpumin}} %</td>
					<td>{{$comp->cpumax}} %</td>
					<td>{{$comp->rammin}} %</td>
					<td>{{$comp->rammax}} %</td>
					<td>{{$comp->tempmin}} C</td>
					<td>{{$comp->tempmax}} C</td>
					<td>{{date('Y-m-d g:i:s A',strtotime($comp->created_at))}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>