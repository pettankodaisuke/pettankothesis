@extends('ver2.dashboard.layout.layout')
@section('content')
<div class="container text-center">
  <div class="headerpage text-left">
  	<p><i class="fa fa-history" aria-hidden="true"></i>{{$page}}</p>
  </div>
  <div class="Listofdetail">
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
         @foreach($_comp as $comp)
         <tr class="">
            <td class="text-center"> {{$comp->name}} </td>
            <td class="text-center"> {{$comp->cpu}} % </td>
            <td class="text-center"> {{$comp->memory}} %</td>
            <td class="text-center"> {{$comp->hdd}} Bytes</td>
            <td class="text-center"> {{$comp->hdd_free}} Bytes</td>
            <td class="text-center"> {{$comp->hdd_used}} Bytes</td>
            <td class="text-center"> {{$comp->temperature}} C </td>
            <td class="text-center"> {{date('Y-m-d g:i:s A',strtotime($comp->created_at))}} </td>
         </tr>
         @endforeach
      </table>
   </div>
  </div>
</div>
@endsection